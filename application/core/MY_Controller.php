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
        $this->data = array();
        $this->data['pagetitle'] = 'Zapteam';
        $this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '';
        $this->data['role'] = $this->session->userdata('userrole');
    }

    /**
     * Render this page
     */
    function render($template = 'template')
    {
        // Build the menubar
        $this->data['menubar'] = $this->parser->parse('menubar', array_merge($this->config->item('menu_choices'), $this->data), true);

        // Establish the meat of the current page, as the "content" parameter.
        // Parse the requested content template (passed as the "pagebody" parameter) to do so.
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        // And then parse the page template, which will pull in and position the
        // "meat" in its middle.
        $this->parser->parse('template', $this->data);
    }



}