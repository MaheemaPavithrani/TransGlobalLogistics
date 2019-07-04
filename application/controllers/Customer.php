<?php
   class Customer extends CI_Controller{
         public function index(){

            if($this->session->userdata('user_type')=== 'customer'){
               $this->load->model('Customers_model');
               $data['customer'] = $this->Customers_model->get_customer_data($this->session->userdata('user_id'));
   
               $this->load->model('Notifications_model');
               $data['customer_notifications'] = $this->Notifications_model->get_customer_notifications($this->session->userdata('user_id'));
   
               $this->load->view('customer/header',$data);
               $this->load->view('customer/index',$data);
               $this->load->view('customer/footer');
            }else{

               redirect('User/login');     
            }
         
         }

         public function send_import_request(){

            if($this->session->userdata('user_type') != 'customer'){
               redirect('User/login');
            }

            $this->form_validation->set_rules('container_type','Container Type','required');
            $this->form_validation->set_rules('container_pickup_datetime','Container Pickup Date and Time','required');
            $this->form_validation->set_rules('container_pickup_location','Container Pickup Location','required');
            $this->form_validation->set_rules('loading_port','Loading Port','required');
            $this->form_validation->set_rules('vessel_arrival_datetime','Vessel Arrival Date and Time','required');
            $this->form_validation->set_rules('destination','Destination','required');
            $this->form_validation->set_rules('cargo_type','Cargo Type','required');
            $this->form_validation->set_rules('weight','Weight','required');

            $data['title'] = 'New Import Request';

            $this->load->model('Customers_model');
            $data['customer'] = $this->Customers_model->get_customer_data($this->session->userdata('user_id'));

            $this->load->model('Notifications_model');
            $data['customer_notifications'] = $this->Notifications_model->get_customer_notifications($this->session->userdata('user_id'));

            if($this->form_validation->run() == false){

               $this->load->view('customer/header',$data);
               $this->load->view('customer/import_request',$data);
               $this->load->view('customer/footer');
            }else{
               $this->load->model('Hires_model');

               $this->Hires_model->place_import_request();
               redirect('Customer/manage_hires');
            }
         }

         public function send_export_request(){

            if($this->session->userdata('user_type') != 'customer'){
               redirect('User/login');
            }

            $this->form_validation->set_rules('pickup_datetime','Pickup Date and Time','required');
            $this->form_validation->set_rules('pickup_location','Pickup Location','required');
            $this->form_validation->set_rules('loading_port','Loading Port','required');
            $this->form_validation->set_rules('cargo_type','Cargo Type','required');
            $this->form_validation->set_rules('weight','Weight','required');

            $data['title'] = 'New Export Request';

            $this->load->model('Customers_model');
            $data['customer'] = $this->Customers_model->get_customer_data($this->session->userdata('user_id'));

            $this->load->model('Notifications_model');
            $data['customer_notifications'] = $this->Notifications_model->get_customer_notifications($this->session->userdata('user_id'));

            if($this->form_validation->run() == false){

               $this->load->view('customer/header',$data);
               $this->load->view('customer/export_request',$data);
               $this->load->view('customer/footer');
            }else{
               $this->load->model('Hires_model');

               $this->Hires_model->place_export_request();
               redirect('Customer/manage_hires');
            }
         }

         public function manage_hires(){

            $this->load->model('Customers_model');
            $data['customer'] = $this->Customers_model->get_customer_data($this->session->userdata('user_id'));

            
            $this->load->model('Hires_model');

            $data['past_title'] = 'Past Hires';
            $data['past_imports'] = $this->Hires_model->get_past_hires('imports',$data['customer']['id']);
            $data['past_exports'] = $this->Hires_model->get_past_hires('exports',$data['customer']['id']);


            $data['hire_requests'] = 'Hire Requests';
            $data['import_requests'] = $this->Hires_model->get_import_requests($data['customer']['id']);
            $data['export_requests'] = $this->Hires_model->get_export_requests($data['customer']['id']);

            $data['ongoing_hires'] = 'Ongoing Hires';
            $data['ongoing_imports'] = $this->Hires_model->get_ongoing_imports($data['customer']['id']);
            $data['ongoing_exports'] = $this->Hires_model->get_ongoing_exports($data['customer']['id']);

            $data['rejected_hires'] = 'Rejected Hires';
            $data['rejected_imports'] = $this->Hires_model->get_rejected_imports($data['customer']['id']);
            $data['rejected_exports'] = $this->Hires_model->get_rejected_exports($data['customer']['id']);

            $this->load->model('Notifications_model');
            $data['customer_notifications'] = $this->Notifications_model->get_customer_notifications($this->session->userdata('user_id'));

            if($this->session->userdata('user_type')=== 'customer'){
               $this->load->view('customer/header',$data);
               $this->load->view('customer/manage_hires',$data);
               $this->load->view('customer/footer');
            }else{
               redirect('User/login');
            }
            
         }

         public function delete_hire($table,$hire_id){

            $this->load->model('Hires_model');

            $this->Hires_model->delete_hire($table,$hire_id);

            redirect('Customer/manage_hires');
         }

         public function view_notification($notification_id){

            $this->load->model('Notifications_model');

            $this->Notifications_model->mark_read($notification_id);

            redirect('Customer/manage_hires');
         }

         public function contact(){

            $this->load->model('Notifications_model');
            $data['customer_notifications'] = $this->Notifications_model->get_customer_notifications($this->session->userdata('user_id'));

            $this->load->view('customer/header',$data);
            $this->load->view('interface/contact');
            $this->load->view('customer/footer');

         }

         public function services(){

            $this->load->model('Notifications_model');
            $data['customer_notifications'] = $this->Notifications_model->get_customer_notifications($this->session->userdata('user_id'));

            $this->load->view('customer/header',$data);
            $this->load->view('interface/services');
            $this->load->view('customer/footer');

         }

         
   }

?>