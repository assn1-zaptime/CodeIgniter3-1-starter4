<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->showSet(1);
    }

    public function set($key)
    {
        $this->showSet($key);
    }

    public function addSet()
    {
        $this->showit();
    }

    private function showit()
    {
        $this->load->model('Categories');
        $this->load->model('Accessories');
        $this->load->model('Sets');

        $cat = $this->Categories->all();
        $acc = $this->Accessories->all();
        $sets = $this->Sets->all();

        $eyesRaw = $this->getAccessoriesRaw($acc, $this->Categories->get('cat-1')->catCode);
        $nosesRaw = $this->getAccessoriesRaw($acc, $this->Categories->get('cat-2')->catCode);
        $mouthsRaw = $this->getAccessoriesRaw($acc, $this->Categories->get('cat-3')->catCode);
        $hairRaw = $this->getAccessoriesRaw($acc, $this->Categories->get('cat-4')->catCode);

        $this->session->set_userdata('categories', $cat);
        $this->session->set_userdata('accessories', $acc);
        $this->session->set_userdata('sets', $sets);
        $this->session->set_userdata('eyes', $eyesRaw);
        $this->session->set_userdata('noses', $nosesRaw);
        $this->session->set_userdata('mouths', $mouthsRaw);
        $this->session->set_userdata('hair', $hairRaw);

        $eyes = $this->getAccessoriesFormatted($eyesRaw, $this->Categories->get('cat-1')->catCode);
        $noses = $this->getAccessoriesFormatted($nosesRaw, $this->Categories->get('cat-2')->catCode);
        $mouths = $this->getAccessoriesFormatted($mouthsRaw, $this->Categories->get('cat-3')->catCode);
        $hair = $this->getAccessoriesFormatted($hairRaw, $this->Categories->get('cat-4')->catCode);

        $this->load->helper('form');

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'fhair'  => form_label('Hair') . form_dropdown('hair', $hair, $hair[0]),
            'feyes'  => form_label('Eyes') . form_dropdown('eyes', $eyes, $eyes[0]),
            'fnose'  => form_label('Nose') . form_dropdown('nose', $noses, $noses[0]),
            'fmouth'    => form_label('Mouth') . form_dropdown('mouth', $mouths, $mouths[0]),
            'zsubmit'    => form_submit('submit', 'add set')
        );

        $this->data = array_merge($this->data, $fields);
        $this->data['pagebody'] = 'create_set';
        $this->render();
    }

    public function submit()
    {
        $eyes = $this->session->userdata('eyes');
        $noses = $this->session->userdata('noses');
        $mouths = $this->session->userdata('mouths');
        $hair = $this->session->userdata('hair');

        $myCustomSet = $this->constructSetObj((object) $this->input->post(), $eyes, $noses, $mouths, $hair);

        $this->load->model('Sets');
        $memoryModelObj = $this->Sets->create();

        foreach ($memoryModelObj as $key => $value)
            $memoryModelObj->$key = $myCustomSet->$key;

        $this->Sets->add($memoryModelObj);
        $this->data['error'] = "<h3>Set $memoryModelObj->setID successfully added</h3>";
        $this->showit();
    }

    public function cancel()
    {
        $this->session->unset_userdata('categories');
        $this->session->unset_userdata('accessories');
        $this->session->unset_userdata('sets');
        $this->session->unset_userdata('eyes');
        $this->session->unset_userdata('noses');
        $this->session->unset_userdata('mouths');
        $this->session->unset_userdata('hair');
        redirect('welcome');
    }

    private function constructSetObj($input, $eyes, $noses, $mouths, $hair)
    {
        $setObj = array();
        $setObj['setID'] = sizeof($this->session->userdata('sets')) + 1;
        $setObj['cat1AccCode'] = $eyes[$input->eyes + 0]->accCode;
        $setObj['cat2AccCode'] = $noses[$input->nose + 0]->accCode;
        $setObj['cat3AccCode'] = $mouths[$input->mouth + 0]->accCode;
        $setObj['cat4AccCode'] = $hair[$input->hair + 0]->accCode;
        return (object) $setObj;
    }

    private function getAccessoriesFormatted($accessories, $catCode)
    {
        $myAccessories = array();
        foreach($accessories as $acc)
        {
            if ($acc->catCode == $catCode)
            {
                $stringifyAcc = '';
                foreach ($acc as $key => $value)
                    $stringifyAcc .= "$value ";
                $myAccessories[] = $stringifyAcc;
            }
        }
        return $myAccessories;
    }

    private function getAccessoriesRaw($accessories, $catCode)
    {
        $myAccessories = array();
        foreach($accessories as $acc)
            if ($acc->catCode == $catCode)
                $myAccessories[] = $acc;
        return $myAccessories;
    }

    function showSet($key)
    {
        $role = $this->session->userdata('userrole');

        $this->load->model('Sets');
        $this->load->model('Accessories');

        $this->selectedSet = $this->Sets->get($key);
        $this->allAcc = $this->Accessories->all();
        $this->myDisplayedSet = $this->getDisplayedSetAcc();
        $addSetBtn = '';

        if ($role != ROLE_GUEST)
            $addSetBtn = $this->parser->parse('addset_btn', $this->data, true);

        $this->data['addSet'] = $addSetBtn;
        $this->data['set'] = $this->myDisplayedSet;
        $this->data['sets'] = $this->getSets();
        $this->data['pagebody'] = 'homepage';
        $this->data['pagetitle'] = 'Zapteam';
        $this->render();
    }

    private function getDisplayedSetAcc()
    {
        $displayedSet = array();
        foreach ($this->allAcc as $acc)
        {
            if ($acc->accCode == $this->selectedSet->cat1AccCode ||
                $acc->accCode == $this->selectedSet->cat2AccCode ||
                $acc->accCode == $this->selectedSet->cat3AccCode ||
                $acc->accCode == $this->selectedSet->cat4AccCode)
            {
                $displayedSet[] = $acc;
            }
        }
        $this->data['setScore'] = $this->calcSetScore($displayedSet);
        return $displayedSet;
    }

    private function getSets()
    {
        $sets = array();
        foreach ($this->Sets->all() as $set)
            $sets[] = array('setID' => $set->setID);
        return $sets;
    }

    private function calcSetScore($set)
    {
        $prettySum = 0;
        $coolSum = 0;
        $wackySum = 0;
        $prettyTot = 0;
        $coolTot = 0;
        $wackyTot = 0;
        $size = sizeof($set);

        foreach ($set as $entry)
        {
            $prettySum += $entry->att1;
            $coolSum += $entry->att2;
            $wackySum += $entry->att3;
        }

        if ($size > 0)
        {
            $prettyTot = $prettySum / $size;
            $coolTot = $coolSum / $size;
            $wackyTot = $wackySum / $size;
        }

        return array(array(
            'pretty' => $prettyTot,
            'cool' => $coolTot,
            'wacky' => $wackyTot,
            'total' => ($prettyTot + $coolTot + $wackyTot)));
    }
}