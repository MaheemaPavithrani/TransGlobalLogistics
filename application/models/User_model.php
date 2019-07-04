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

        public function update_password($id){

            $old_pass = md5($this->input->post('old_password'));

            if($this->input->post('new_password') == $this->input->post('verify_password') ){
                
                $new_pass = md5($this->input->post('new_password'));

                $this->db->where('id',$id);
                $this->db->where('password',$old_pass);
                $this->db->update('users',array(
                    'password' => $new_pass
                ));

                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('pass','Password changed Successfully');

                }else{
                    $this->session->set_flashdata('pass','Invalid Password');
                }
            }else{
                $this->session->set_flashdata('pass','Passwords did not match');
            }
        }
    }

?>