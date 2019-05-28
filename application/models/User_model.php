<?php
    class User_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }
        
        public function register($enc_password){

            $data = array(
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'user_type' => $this->input->post('user_type')
            );

            $query = $this->db->insert('users',$data);
            return $this->db->insert_id();
        }

        public function get_user($user_id){

        }
    }
?>