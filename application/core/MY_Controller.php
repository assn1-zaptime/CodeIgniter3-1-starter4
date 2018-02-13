<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'Zapteam';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
        // Build the menubar
        $this->data['menubar'] = $this->parser->parse('menubar', $this->config->item('menu_choices'), true);

        // Establish the meat of the current page, as the "content" parameter.
        // Parse the requested content template (passed as the "pagebody" parameter) to do so.
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        // And then parse the page template, which will pull in and position the
        // "meat" in its middle.
		$this->parser->parse('template', $this->data);
	}

	function showSet($key)
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'homepage';
        $this->data['pagetitle'] = 'Zapteam';

        $this->set = array();
        $this->all_acc = array();
        $this->my_set_content = array();

        $this->load->model('Sets');
        $this->load->model('Accessories');

        $this->set = $this->Sets->get($key);
        $this->all_acc = $this->Accessories->all();

        foreach ($this->all_acc as $accEntry)
        {
            // eyes
            if ($accEntry->accCode == $this->set->cat1AccCode)
            {
                array_push($this->my_set_content, $accEntry);
            }

            // nose
            else if ($accEntry->accCode == $this->set->cat2AccCode)
            {
                array_push($this->my_set_content, $accEntry);
            }

            // mouth
            else if ($accEntry->accCode == $this->set->cat3AccCode)
            {
                array_push($this->my_set_content, $accEntry);
            }

            // hair
            else if ($accEntry->accCode == $this->set->cat4AccCode)
            {
                array_push($this->my_set_content, $accEntry);
            }

            $this->data['setScore'] = $this->calcSetScore($this->my_set_content);
        }
        $this->data['set'] = $this->my_set_content;
        $this->render();
    }

    function calcSetScore($set)
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
