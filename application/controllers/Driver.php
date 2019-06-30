<?php
   class Driver extends CI_Controller{
        public function index(){

            $this->load->model('Drivers_model');
            $data['driver'] = $this->Drivers_model->get_driver_data($this->session->userdata('user_id'));

            $this->load->model('Hires_model');
            $data['current_hire_import'] = $this->Hires_model->get_current_import($data['driver']['id']);
            $data['current_hire_export'] = $this->Hires_model->get_current_export($data['driver']['id']);

            $data['upcoming_imports'] = $this->Hires_model->get_upcoming_imports($data['driver']['id']);
            $data['upcoming_exports'] = $this->Hires_model->get_upcoming_exports($data['driver']['id']);

            $this->load->view('driver/header',$data);
            $this->load->view('driver/index',$data);
            $this->load->view('driver/footer');
        }

        public function get_driver_hires($driver_id){

            $this->load->model('Hires_model');

            $this->load->model('Drivers_model');
            $data['driver'] = $this->Drivers_model->get_driver_data($this->session->userdata('user_id'));

            $data['title'] = 'Past Hires';
            $data['driver_imports'] = $this->Hires_model->get_driver_hires('imports',$driver_id);
            $data['driver_exports'] = $this->Hires_model->get_driver_hires('exports',$driver_id);

            $this->load->view('driver/header',$data);
            $this->load->view('driver/past_hires',$data);
            $this->load->view('driver/footer');
        }

        public function assigned_hires($driver_id){

            $this->load->model('Hires_model');

            $this->load->model('Drivers_model');
            $data['driver'] = $this->Drivers_model->get_driver_data($this->session->userdata('user_id'));

            $data['assigned_imports'] = $this->Hires_model->get_assigned_hires('imports',$driver_id);
            $data['assigned_exports'] = $this->Hires_model->get_assigned_hires('exports',$driver_id);

            $this->load->view('driver/header',$data);
            $this->load->view('driver/assigned_hires',$data);
            $this->load->view('driver/footer');
        }

        public function accept_hire($table,$hire_id){

            $this->load->model('Hires_model');
            $customer_id = $this->Hires_model->accept_hire($table,$hire_id);

            $this->load->model('Customers_model');
            $customer_user_id = $this->Customers_model->get_user_id($customer_id['customer_id']);

            $this->load->model('Notifications_model');
            $this->Notifications_model->accepted_hire($table,$hire_id,$customer_user_id['user_id']);

            redirect('Driver/index');

        }

        public function decline_hire($table,$hire_id){

            $this->load->model('Hires_model');

            $this->Hires_model->decline_hire($table,$hire_id);

            redirect('Driver/index');
            
        }

        public function complete_hire($hire_type,$hire_id){

            $this->load->model('Notifications_model');

            $this->Notifications_model->hire_completed($hire_type,$hire_id);

            $this->session->set_flashdata('hire_complete', $hire_id);

            redirect('Driver/index');
        }
   }
?>