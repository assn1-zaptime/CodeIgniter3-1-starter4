<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends Application
{
    public function index()
    {
        $cat = ""; $acc = "";
        $role = $this->session->userdata('userrole');
        $this->load->model('Categories');
        $this->load->model('Accessories');
        $cat = $this->Categories->all();
        $acc = $this->Accessories->all();
        $this->data['pagetitle'] = 'Catalogue';
        $content = "";            
        
        foreach($cat as $c) {
                $content .= "<h1>".strtoupper($c->catName)."</h1>";
                foreach($acc as $a) {
                    if (strcmp($a->catCode,$c->catCode)==0) {
                $content .= "<div class='w3-container col-sm-5' style=' display: inline-block;'>
                    <div class='w3-card-3' style='width:350px'>
                        <div class='w3-container'>
                            <img src='img/$a->accName.png' alt='Avatar' class='w3-left w3-margin-right' style='width:200px'>
            <p><br><br>Code: $a->accCode
                <br>Name: $a->accName
                <br>Pretty: $a->att1
                <br>Cool: $a->att2
                <br>Wacky: $a->att3";
                
            if ($role == ROLE_ADMIN)
                $content.="<br><br><a href='/catalogue/edit/$a->accCode'><input type='button' value='Edit'/></a>";
            $content .= "</div></div></div>"; }}
        }
        $this->data['content'] = $content;
        $this->data['pagetitle'] = 'CHECK OUT OUR ACCESSORIES';
        $this->data['pagebody'] = 'catalogue';
        $this->render(); 
    
    }

    private function showit()
    {
        $this->load->helper('form');
        $a = $this->session->userdata('task');
        $this->data['accCode'] = $a->accCode;

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'fcatcode' => form_label('Category Code ') . form_input('catCode', $a->catCode),
            'fname'  => form_label('Accessory name ') . form_input('accName', $a->accName),
            'fatt1'  => form_label('Pretty ') . form_input('att1', $a->att1),
            'fatt2'    => form_label('Cool ') . form_input('att2',  $a->att2),
            'fatt3'  => form_label('Wacky ') . form_input('att3', $a->att3),
            'zsubmit' => form_submit('submit', 'Update accessory')
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'editAcc';
        $this->render();
    }

    // initiate editing of a task
    public function edit($accCode = null)
    {
        if ($accCode == null)
            redirect('/catalogue');
        $this->load->model('Categories');
        $task = $this->Categories->get($accCode);
        $this->session->set_userdata('task', $task);
        $this->showit();
    }
    
    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');

        // retrieve & update data transfer buffer
        // retrieve & update data transfer buffer
        $a = (array) $this->session->userdata('task');
        $a = array_merge($a, $this->input->post());
        $a = (object) $a;  // convert back to object
        $this->session->set_userdata('task', (object) $a);

        // validate away
        if ($this->form_validation->run())
        {
            if (empty($a->accCode))
            {
                $this->tasks->update($a);
                $this->alert('Task ' . $a->accCode . ' updated', 'success');
            }
        } else
        {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }
    
    // build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');        
        $this->data['error'] = heading($message,3);
    }
    
    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('task');
        redirect('/catalogue');
    }
    
    // Delete this item altogether
    function delete()
    {
        $dto = $this->session->userdata('task');
        $a = $this->tasks->get($dto->accCode);
        $this->load->model('Categories');
        $this->Categories->delete($a->accCode);
        $this->session->unset_userdata('task');
        redirect('/catalogue');
    }
}