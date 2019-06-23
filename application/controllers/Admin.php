<?php
    class Admin extends CI_Controller{
        public function index(){
            $data['title'] = 'Administrator';

            $this->load->model('Driver_model');
            $this->load->model('Hire_model');
            $this->load->model('Customer_model');

            $data['drivers'] = $this->Driver_model->get_available_drivers();
            $data['customers_thismonth'] = $this->Customer_model->get_customers_this_month();
            $data['hires_thismonth'] = $this->Hire_model->get_hires_this_month();
            $data['ongoing_hires'] = $this->Hire_model->ongoing_hires();

            $this->load->view('admin/header');
            $this->load->view('admin/index',$data);
            $this->load->view('admin/footer');
        }

        public function view_profile(){
            $this->load->view('admin/header');
            $this->load->view('admin/profile');
            $this->load->view('admin/footer');
        }

        public function get_drivers(){
            $data['title'] = 'Drivers';

            $this->load->model('Driver_model');

            $data['drivers'] = $this->Driver_model->get_drivers();

            $this->load->view('admin/header');
            $this->load->view('admin/drivers/index',$data);
            $this->load->view('admin/footer');

        }

        public function get_customers(){
            $data['title'] = 'Customers';

            $this->load->model('Customer_model');

            $data['customers'] = $this->Customer_model->get_customers();

            $this->load->view('admin/header');
            $this->load->view('admin/customers/index',$data);
            $this->load->view('admin/footer');

        }

        public function get_vehicles(){
            $data['title'] = 'Vehicles';

            // $this->load->model('Vehicle_model');

            // $data['drivers'] = $this->Vehicle_model->get_vehicles();

            $this->load->view('admin/header');
            $this->load->view('admin/vehicles/index',$data);
            $this->load->view('admin/footer');

        }

        public function register_driver(){
            $data['title'] = 'Add Driver';

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('license_no','License No','required');
            $this->form_validation->set_rules('dob','Date of Birth','required');
            $this->form_validation->set_rules('nic','NIC no','required');
            $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
            $this->form_validation->set_rules('password','Password','required');


            if($this->form_validation->run()===FALSE){
                $this->load->view('admin/header');
                $this->load->view('admin/drivers/register',$data);
                $this->load->view('admin/footer');
            }else{

                $enc_password = md5($this->input->post('password'));

                $this->load->model('user_model');
                $user_id = $this->user_model->register($enc_password);

                $this->load->model('driver_model');
                $this->driver_model->register_driver($user_id);

                redirect('admin/get_drivers');
            }
        }

        public function remove_driver($driver_id){

            $this->load->model('Driver_model');

            $this->Driver_model->remove_driver($driver_id);

            redirect('admin/get_drivers');


        }

        public function update_driver($driver_id){
            
            $this->load->model('Driver_model');

            $this->Driver_model->update_driver($driver_id);

            redirect('admin/get_drivers');
        }

        public function remove_customer($customer_id){

            $this->load->model('Customer_model');

            $this->Customer_model->remove_customer($customer_id);

            redirect('admin/get_customers');


        }

        public function update_customer($customer_id){
            
            $this->load->model('Customer_model');

            $this->Customer_model->update_customer($customer_id);

            redirect('admin/get_customers');
        }

        public function register_customer(){
            $data['title'] = 'Add Customer';

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('dob','Date of Birth','required');
            $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[customers.email]');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');

            if($this->form_validation->run()===FALSE){
                $this->load->view('admin/header');
                $this->load->view('admin/customers/register',$data);
                $this->load->view('admin/footer');
            }else{
                $enc_password = md5($this->input->post('password'));

                $this->load->model('user_model');
                $user_id = $this->user_model->register($enc_password);

                $this->load->model('customer_model');
                $this->customer_model->register_customer($user_id);

                redirect('admin/get_customers');
            }
        }

        public function get_imports(){
            $data['title'] = 'Imports';

            $this->load->model('Hire_model');

            $data['imports'] = $this->Hire_model->get_imports();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/imports',$data);
            $this->load->view('admin/footer');

        }

        public function get_exports(){
            $data['title'] = 'Exports';

            $this->load->model('Hire_model');

            $data['exports'] = $this->Hire_model->get_exports();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/exports',$data);
            $this->load->view('admin/footer');

        }

        public function get_ongoing_hires(){
            $data['title'] = 'Ongoing Hires';

            $this->load->model('Hire_model');

            $data['imports'] = $this->Hire_model->get_ongoing_imports();
            $data['exports'] = $this->Hire_model->get_ongoing_exports();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/ongoing_hires',$data);
            $this->load->view('admin/footer');

        }

        public function get_hire_requests(){
            $data['title'] = 'New Hire Requests';

            $this->load->model('Hire_model');

            $data['imports'] = $this->Hire_model->get_import_requests();
            $data['exports'] = $this->Hire_model->get_export_requests();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/hire_requests',$data);
            $this->load->view('admin/footer');
        }

        public function view_import_request($hire_id,$date){
            $data['title'] = 'Import Request';

            $this->load->model('Driver_model');
            $data['drivers'] = $this->Driver_model->get_available_drivers($date);

            $this->load->model('Hire_model');
            $data['hire'] = $this->Hire_model->get_imports($hire_id);

            $this->load->view('admin/header');
            $this->load->view('admin/hires/manage_request',$data);
            $this->load->view('admin/footer');
        }

        public function view_export_request($hire_id,$date){
            $data['title'] = 'Export Request';

            $this->load->model('Driver_model');
            $data['drivers'] = $this->Driver_model->get_available_drivers($date);

            $this->load->model('Hire_model');
            $data['hire'] = $this->Hire_model->get_exports($hire_id);

            $this->load->view('admin/header');
            $this->load->view('admin/hires/manage_request',$data);
            $this->load->view('admin/footer');
        }

        public function mark_completed($type,$hire_id,$driver_id){
            
            $this->load->model('Hire_model');
            $this->Hire_model->mark_completed($type,$hire_id);

            $this->load->model('Driver_model');
            $this->Driver_model->mark_completed($driver_id);

            redirect('admin/get_ongoing_hires');

        }

        public function view_past_hires($driver_id){

            $this->load->model('Hire_model');
            $data['title'] = 'Past Hires';
            $data['imports'] = $this->Hire_model->view_past_hires('imports',$driver_id);
            $data['exports'] = $this->Hire_model->view_past_hires('exports',$driver_id);

            $this->load->view('admin/header');
            $this->load->view('admin/drivers/past_hires',$data);
            $this->load->view('admin/footer');
        }

        public function assign_driver($hire_type,$hire_id,$driver_id){

            $this->load->model('Driver_model');
            $this->load->model('Hire_model');

            $this->Driver_model->assign_driver($driver_id);
            $this->Hire_model->assign_driver($hire_type,$hire_id,$driver_id);

            redirect('admin/get_ongoing_hires');
        }

        
       
    }

?>