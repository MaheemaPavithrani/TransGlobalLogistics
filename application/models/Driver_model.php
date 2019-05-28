<?php 
    class Driver_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function register_driver($user_id){
            $data = array(
                'name' => $this->input->post('name'),
                'license_no' => $this->input->post('license_no'),
                'dob' => $this->input->post('dob'),
                'nic' => $this->input->post('nic'),
                'avail' => 1,
                'user_id' => $user_id
            );

            return $this->db->insert('drivers',$data);
        }

        public function get_drivers($driver_id = false){
            if($driver_id === false){
                $query = $this->db->get_where('drivers',array('avail' => 1));
                return $query->result_array();
            }
            $query = $this->db->get_where('drivers',array(
                'avail' => 1,
                'id' => $driver_id
            ));
            return $query->result_array();

            
        }

        public function remove_driver($driver_id){

            $data = array('avail' => 0);

            $this->db->where('id',$driver_id);
            return $this->db->update('drivers',$data);
        }

        public function update_driver($driver_id){
            $data = array(
                'name' => $this->input->post('name'),
                'license_no' => $this->input->post('license_no'),
                'dob' => $this->input->post('dob'),
                'nic' => $this->input->post('nic'),
            );

            $this->db->where('id',$driver_id);
            return $this->db->update('drivers',$data);
        }
    }
?>