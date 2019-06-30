<?php 
    class Customers_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function register_customer($user_id){
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'dob' => $this->input->post('dob'),
                'avail' => 1,
                'user_id' => $user_id
            );

            return $this->db->insert('customers',$data);
        }

        public function get_customer_data($user_id){

            $this->db->from('customers');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();

            return $query->row_array();
        }

        public function get_user_id($customer_id){

            $this->db->select('user_id');
            $query = $this->db->get_where('customers',array('id' => $customer_id));

            return $query->row_array();
        }
    }
?>