<?php
    class Admin extends CI_Controller{
        public function index(){
            $data['title'] = 'Administrator';

            $this->load->model('admin/Driver_model');
            $this->load->model('admin/Hire_model');
            $this->load->model('admin/Customer_model');

            $data['drivers'] = $this->Driver_model->get_available_drivers();
            $data['customers_thismonth'] = $this->Customer_model->get_customers_this_month();
            $data['hires_thismonth'] = $this->Hire_model->get_hires_this_month();
            $data['ongoing_hires'] = $this->Hire_model->ongoing_hires();

            $this->load->model('Hire_model');
            $graph1 = $this->Hire_model->graph_data_imports()->result();
            $data['graph1'] = json_encode($graph1);

            $this->load->model('Hire_model');
            $graph2 = $this->Hire_model->graph_data_exports()->result();
            $data['graph2'] = json_encode($graph2);

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

            $this->load->model('admin/Driver_model');

            $data['drivers'] = $this->Driver_model->get_drivers();

            $this->load->view('admin/header');
            $this->load->view('admin/drivers/index',$data);
            $this->load->view('admin/footer');

        }

        public function get_customers(){
            $data['title'] = 'Customers';

            $this->load->model('admin/Customer_model');

            $data['customers'] = $this->Customer_model->get_customers();

            $this->load->view('admin/header');
            $this->load->view('admin/customers/index',$data);
            $this->load->view('admin/footer');

        }

        public function get_vehicles(){
            $data['title'] = 'Vehicles';

            $this->load->model('admin/Vehicle_model');

            $data['vehicles'] = $this->Vehicle_model->get_vehicles();

            $this->load->view('admin/header');
            $this->load->view('admin/vehicles/index',$data);
            $this->load->view('admin/footer');

        }

        public function add_vehicle(){
            $data['title'] = 'Add Vehicle';

            $this->form_validation->set_rules('vehicle_no','Vehicle No','required');
            $this->form_validation->set_rules('trailer_no','Trailer No','required');
            $this->form_validation->set_rules('model','Model','required');

            if($this->form_validation->run()===FALSE){
                $this->load->view('admin/header');
                $this->load->view('admin/vehicles/register',$data);
                $this->load->view('admin/footer');
            }else{

                $this->load->model('admin/Vehicle_model');
                $this->Vehicle_model->add_vehicle();

                redirect('admin/get_vehicles');
            }
        }

        public function remove_vehicle($vehicle_id){
            
            $this->load->model('admin/Vehicle_model');

            $this->Vehicle_model->remove_vehicle($vehicle_id);

            redirect('admin/get_vehicles');
        }

        public function register_driver(){
            $data['title'] = 'Add Driver';

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('license_no','License No','required');
            $this->form_validation->set_rules('dob','Date of Birth','required');
            $this->form_validation->set_rules('nic','NIC no','required');
            $this->form_validation->set_rules('mobile','Mobile no','required');
            $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
            $this->form_validation->set_rules('password','Password','required');


            if($this->form_validation->run()===FALSE){
                $this->load->view('admin/header');
                $this->load->view('admin/drivers/register',$data);
                $this->load->view('admin/footer');
            }else{

                $enc_password = md5($this->input->post('password'));

                $this->load->model('admin/user_model');
                $user_id = $this->user_model->register($enc_password);

                $this->load->model('admin/driver_model');
                $this->driver_model->register_driver($user_id);

                redirect('admin/get_drivers');
            }
        }

        public function remove_driver($driver_id){

            $this->load->model('admin/Driver_model');

            $this->Driver_model->remove_driver($driver_id);

            redirect('admin/get_drivers');


        }

        public function update_driver($driver_id){
            
            $this->load->model('admin/Driver_model');

            $this->Driver_model->update_driver($driver_id);

            redirect('admin/get_drivers');
        }

        public function remove_customer($customer_id){

            $this->load->model('admin/Customer_model');

            $this->Customer_model->remove_customer($customer_id);

            redirect('admin/get_customers');


        }

        public function update_customer($customer_id){
            
            $this->load->model('admin/Customer_model');

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

                $this->load->model('admin/user_model');
                $user_id = $this->user_model->register($enc_password);

                $this->load->model('admin/customer_model');
                $this->customer_model->register_customer($user_id);

                redirect('admin/get_customers');
            }
        }

        public function get_imports(){
            $data['title'] = 'Imports';

            $this->load->model('admin/Hire_model');

            $data['imports'] = $this->Hire_model->get_imports();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/imports',$data);
            $this->load->view('admin/footer');

        }

        public function get_exports(){
            $data['title'] = 'Exports';

            $this->load->model('admin/Hire_model');

            $data['exports'] = $this->Hire_model->get_exports();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/exports',$data);
            $this->load->view('admin/footer');

        }

        public function get_ongoing_hires(){
            $data['title'] = 'Ongoing Hires';

            $this->load->model('admin/Hire_model');

            $data['imports'] = $this->Hire_model->get_ongoing_imports();
            $data['exports'] = $this->Hire_model->get_ongoing_exports();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/ongoing_hires',$data);
            $this->load->view('admin/footer');

        }

        public function get_hire_requests(){
            $data['title'] = 'New Hire Requests';

            $this->load->model('admin/Hire_model');

            $data['imports'] = $this->Hire_model->get_import_requests();
            $data['exports'] = $this->Hire_model->get_export_requests();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/hire_requests',$data);
            $this->load->view('admin/footer');
        }

        public function view_import_request($hire_id,$date){
            $data['title'] = 'Import Request';

            $this->load->model('admin/Driver_model');
            $data['drivers'] = $this->Driver_model->get_available_drivers($date);

            $this->load->model('admin/Hire_model');
            $data['hire'] = $this->Hire_model->get_imports($hire_id);

            $this->load->view('admin/header');
            $this->load->view('admin/hires/manage_request',$data);
            $this->load->view('admin/footer');
        }

        public function view_export_request($hire_id,$date){
            $data['title'] = 'Export Request';

            $this->load->model('admin/Driver_model');
            $data['drivers'] = $this->Driver_model->get_available_drivers($date);

            $this->load->model('admin/Hire_model');
            $data['hire'] = $this->Hire_model->get_exports($hire_id);

            $this->load->view('admin/header');
            $this->load->view('admin/hires/manage_request',$data);
            $this->load->view('admin/footer');
        }

        public function mark_completed($type,$hire_id,$driver_id){
            
            $this->load->model('admin/Hire_model');
            $this->Hire_model->mark_completed($type,$hire_id);

            $this->load->model('admin/Driver_model');
            $this->Driver_model->mark_completed($driver_id);

            redirect('admin/get_ongoing_hires');

        }

        public function view_past_hires($driver_id){

            $this->load->model('admin/Hire_model');
            $data['title'] = 'Past Hires';
            $data['imports'] = $this->Hire_model->view_past_hires('imports',$driver_id);
            $data['exports'] = $this->Hire_model->view_past_hires('exports',$driver_id);

            $this->load->view('admin/header');
            $this->load->view('admin/drivers/past_hires',$data);
            $this->load->view('admin/footer');
        }

        public function assign_driver($hire_type,$hire_id,$driver_id){

            $this->load->model('admin/Driver_model');
            $this->load->model('admin/Hire_model');

            $this->Driver_model->assign_driver($driver_id);
            $this->Hire_model->assign_driver($hire_type,$hire_id,$driver_id);

            redirect('admin/get_ongoing_hires');
        }

        public function decline_hire($hire_type,$hire_id){

            $this->load->model('admin/Hire_model');
            $this->Hire_model->decline_hire($hire_type,$hire_id);

            $this->load->model('Customers_model');
            $customer_user_id = $this->Customers_model->get_user_id($this->input->post('customer'));

            $this->load->model('admin/Notification_model');
            $this->Notification_model->decline_hire($hire_type,$hire_id,$customer_user_id['user_id']);

            redirect('admin/get_hire_requests');
        }

        public function show_notifications(){

            $data['title'] = 'Notifications';

            $this->load->model('admin/Notification_model');
            $data['notifications'] = $this->Notification_model->show_notifications();

            $this->load->view('admin/header');
            $this->load->view('admin/notifications/index',$data);
            $this->load->view('admin/footer');
        }

        public function read_notification($notification,$id){

            $this->load->model('admin/Notification_model');
            $this->Notification_model->read_notification($id);

            if($notification == 'hire_request'){

                redirect('admin/get_hire_requests');

            }elseif($notification == 'hire_complete'){

                redirect('admin/get_ongoing_hires');
            }

            
        }

        // public function graph_data(){

        //     $this->load->model('Hire_model');
        //     $data = $this->Hire_model->graph_data()->result();
        //     $x['data'] = json_encode($data);
        //     print_r($data);
        // }

        
       
    }

?>