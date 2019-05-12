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

            // $this->load->model('Customer_model');

            // $data['drivers'] = $this->Customer_model->get_customers();

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

            if($this->form_validation->run()===FALSE){
                $this->load->view('admin/header');
                $this->load->view('admin/drivers/register',$data);
                $this->load->view('admin/footer');
            }else{

                $this->load->model('driver_model');

                $this->driver_model->register_driver();

                redirect('admin/index');
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
    }

?>