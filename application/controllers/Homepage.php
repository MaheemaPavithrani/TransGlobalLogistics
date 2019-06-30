<?php

    class Homepage extends CI_Controller{
     
        public function index(){
		
            $this->load->view('interface/header');
            $this->load->view('interface/index');
            $this->load->view('interface/footer');
 		
        }

        public function contact(){

            $this->load->view('interface/header');
            $this->load->view('interface/contact');
            $this->load->view('interface/footer');
        }

        public function services(){

            $this->load->view('interface/header');
            $this->load->view('interface/services');
            $this->load->view('interface/footer');

        }

        
    }
?>