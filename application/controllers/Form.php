<?php

class Form extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->output->enable_profiler();
        }

        public function index()
        {
                $this->load->helper(array('form', 'url'));
                $this->form_validation->set_rules(
                        'name', 'Name', 
                        'required|min_length[15]',
                        array(
                                'required' => 'Must enter course name.'
                        )
                );
                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('courses.php');
                        echo 'Oh no! We could not enter submit the course.';
                        echo 'Please fix the errors below and try again.';
                }
                else
                {
                        $this->load->model('Course');
                        $this->Course->validate(post());
                        $this->load->view('courses.php');
                        echo 'Perfect! Course has been added.';
                }

        /*
                if($this->input->post())
                {
                        $post = post();
                        $this->load->model('Course');
                        $this->Course->validate(post());
                } else{
                        echo 'nothing in post';
                }
        */
        }
}

