<?php
    class User extends CI_Controller{

        public function index(){
            $data['username'] = $this->session->userdata('username');

            if($this->session->userdata('user_type') == 'admin'){

                redirect('Admin');

            }else if($this->session->userdata('user_type') == 'customer'){

                redirect('customer/index');

            }else if($this->session->userdata('user_type') == 'driver'){

                redirect('driver/index');
            }


        }

        public function register_customer(){
        
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('dob','Date of Birth','required');
            $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[customers.email]');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');

            if($this->form_validation->run()===FALSE){
                $this->load->view('interface/header');
                $this->load->view('customer/register');
                $this->load->view('customer/footer');
            }else{
                $enc_password = md5($this->input->post('password'));

                $this->load->model('User_model');
                $user_id = $this->User_model->register_user($enc_password);

                $this->load->model('Customers_model');
                $this->Customers_model->register_customer($user_id);

                redirect('user/login');
            }
        }

        public function login(){

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() == FALSE){

                $this->load->view('interface/login');

            }else{
                $password = md5($this->input->post('password'));

                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $password
                );

                $this->load->model('User_model');

                $result = $this->User_model->login($data);

                if($result == false){
                    $this->session->set_flashdata('login_error', 'Invalid Login Credentials');

                    $this->load->view('interface/login');
                }else{
                    $userdata = array(
                        'username' => $result['username'],
                        'user_id' => $result['id'],
                        'user_type' => $result['user_type']
                    );

                    $this->session->set_userdata($userdata);

                    redirect('User/index');
                }

            }
    
        }

        public function logout(){
            
            $userdata = array('user_id', 'user_type');
            $this->session->unset_userdata($userdata);

            redirect('Homepage/index');
        }

        public function update_password($user){

            $this->load->model('User_model');

            $this->User_model->update_password($this->session->userdata('user_id'));

            redirect($user.'/view_profile');

        }
        
    }
?>