<?php 
    class Drivers_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_driver_data($user_id){

            $this->db->from('drivers');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();

            return $query->row_array();
        }

        
    }
?>