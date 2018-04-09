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
                $content.="<br><a href='/catalogue/edit/$a->accCode'><input type='button' value='$a->accCode'/></a>";
            $content .= "</div></div></div>"; }}
        }
        $this->data['content'] = $content;
        $this->data['pagetitle'] = 'CHECK OUT OUR ACCESSORIES';
        $this->data['pagebody'] = 'catalogue';
        $this->render(); 
    
    }
    
    // Initiate adding a new task
    public function add()
    {
        $task = $this->tasks->create();
        $this->session->set_userdata('task', $task);
        $this->showit();
    }
    
    // initiate editing of a task
    public function edit($id = null)
    {
        if ($id == null)
            redirect('/mtce');
        $task = $this->tasks->get($id);
        $this->session->set_userdata('task', $task);
        $this->showit();
    }
    
    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->tasks->rules());

        // retrieve & update data transfer buffer
        // retrieve & update data transfer buffer
        $task = (array) $this->session->userdata('task');
        $task = array_merge($task, $this->input->post());
        $task = (object) $task;  // convert back to object
        $this->session->set_userdata('task', (object) $task);

        // validate away
        if ($this->form_validation->run())
        {
            if (empty($task->id))
            {
                                $task->id = $this->tasks->highest() + 1;
                $this->tasks->add($task);
                $this->alert('Task ' . $task->id . ' added', 'success');
            } else
            {
                $this->tasks->update($task);
                $this->alert('Task ' . $task->id . ' updated', 'success');
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
        $task = $this->tasks->get($dto->id);
        $this->tasks->delete($task->id);
        $this->session->unset_userdata('task');
        redirect('/catalogue');
    }
}