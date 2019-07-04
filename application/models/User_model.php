<?php 
    class User_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function login($data){
            $this->db->where('username', $data['username']);
            $this->db->where('password', $data['password']);

            $query = $this->db->get('users');

            if($query->num_rows()==0){
                return false;
            }
            else{
                return $query->row_array();
            }
        }

        public function register_user($password){
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $password,
                'user_type' => $this->input->post('user_type')
            );

            $query = $this->db->insert('users',$data);
            return $this->db->insert_id();
        }

        public function get_profile_details($table,$id){

            $this->db->select('*');
            $this->db->from($table);
            $this->db->where('user_id',$id);
            $query = $this->db->get();

            return $query->row_array();
        }

        public function update_profile($table,$user_id){
            
            $data = array(
                'name' => $this->input->post('name'),
                'dob' => $this->input->post('dob'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
            );

            $this->db->where('user_id',$user_id);
            return $this->db->update($table,$data);

        }
    }

?>