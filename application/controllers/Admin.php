<?php
    class Admin extends CI_Controller{
        public function index(){
            $data['title'] = 'Administrator';

            $this->load->view('admin/header');
            $this->load->view('admin/index',$data);
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

        public function get_hires(){
            $data['title'] = 'Hires';

            // $this->load->model('Hire_model');

            // $data['drivers'] = $this->Hire_model->get_hires();

            $this->load->view('admin/header');
            $this->load->view('admin/hires/index',$data);
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
       
    }

?>