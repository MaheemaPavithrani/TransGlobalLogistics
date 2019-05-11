<?php 
    class Driver_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function register_driver(){
            $data = array(
                'name' => $this->input->post('name'),
                'license_no' => $this->input->post('license_no'),
                'dob' => $this->input->post('dob'),
                'nic' => $this->input->post('nic'),
                'avail' => 1
            );

            return $this->db->insert('drivers',$data);
        }

        public function get_drivers(){
            $query = $this->db->get_where('drivers',array('avail' => 1));
            return $query->result_array();
        }
    }
?>