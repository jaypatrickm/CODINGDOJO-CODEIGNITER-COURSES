<?php

class Courses extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->output->enable_profiler(TRUE);
        }
        public function index()
        {
                $this->load->model('Course');
                $get_result = $this->Course->get_courses();
                $this->load->view('courses', array('get_result' => $get_result));
        }
        public function add()
        {
                $this->session->unset_userdata('name_flag');
                $this->session->unset_userdata('name_error');
                $this->session->unset_userdata('error');
                $this->session->unset_userdata('name');
                $this->session->unset_userdata('description');
                $this->session->set_userdata('name', $this->input->post('name'));
                $this->session->set_userdata('description', $this->input->post('description'));
                $this->load->model('Course');
                if (strlen($this->input->post('name')) < 15)
                {
                        $this->session->set_userdata('name_flag', 'error');
                        $this->session->set_userdata('name_error', 'Course name must be at least 15 characters.');
                        $this->session->set_userdata('error', 'Sorry, could not enter course.');
                        $get_result = $this->Course->get_courses();
                        $this->load->view('courses', array('get_result' => $get_result));
                }
                else 
                {
                        $add_result = $this->Course->add_course($this->input->post());
                        if($add_result)
                        {
                                $this->session->unset_userdata('name');
                                $this->session->unset_userdata('description');
                                $this->session->set_flashdata('OK', 'Course successfully entered!');
                                $get_result = $this->Course->get_courses();
                                $this->load->view('courses', array('get_result' => $get_result));
                        }
                        else 
                        {
                                $this->session->set_userdata('error', 'Sorry, could not enter course.');
                                $get_result = $this->Course->get_courses();
                                $this->load->view('courses', array('get_result' => $get_result));
                        }
                }
                        
        }

        public function delete($id)
        {
                //var_deump($id);
                //die();
                $this->load->model('Course');
                $one_course = $this->Course->one_course($id);
                $this->load->view('delete', array('course' => $one_course));
        }

        public function remove()
        {
                $this->load->model('Course');
                $this->Course->delete_course($this->input->post('course_id'));
                redirect('/Courses/index');
        }
 
}

