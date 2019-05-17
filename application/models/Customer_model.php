<?php 
    class Customer_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function register_customer($enc_password){
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'dob' => $this->input->post('dob'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'avail' => 1
            );

            return $this->db->insert('customers',$data);
        }

        public function check_username_exists($username){
            $query = $this->db->get_where('customers',array('username' => $username));

            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
        }

        public function check_email_exists($email){
            $query = $this->db->get_where('customers',array('email' => $email));

            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
        }

        public function get_customers($customer_id = false){
            if($customer_id === false){
                $query = $this->db->get_where('customers',array('avail' => 1));
                return $query->result_array();
            }
            $query = $this->db->get_where('customers',array(
                'avail' => 1,
                'id' => $customer_id
            ));
            return $query->result_array();   
        }

        public function remove_customer($customer_id){

            $data = array('avail' => 0);

            $this->db->where('id',$customer_id);
            return $this->db->update('customers',$data);
        }

        public function update_customer($customer_id){
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'dob' => $this->input->post('dob'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
            );

            $this->db->where('id',$customer_id);
            return $this->db->update('customers',$data);
        }
    }
?>