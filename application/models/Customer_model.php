<?php 
    class Customer_model extends CI_Model{
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

        public function get_customers($customer_id = false){
            if($customer_id === false){
                
                $this->db->select('customers.*,users.username');
                $this->db->from('customers');
                $this->db->join('users','users.id = customers.user_id');
                $this->db->where('customers.avail',1);
                $query = $this->db->get();

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
                'mobile' => $this->input->post('mobile'),
            );

            $this->db->where('id',$customer_id);
            return $this->db->update('customers',$data);
        }

        public function get_customers_this_month(){
            $this->db->from('customers');
            $this->db->where('MONTH(register_date)',date("m"));
            $this->db->where('YEAR(register_date)',date("Y"));
            $query = $this->db->get();

            return $query->num_rows();
        }
    }
?>