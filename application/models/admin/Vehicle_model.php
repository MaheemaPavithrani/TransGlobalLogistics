<?php
    class Vehicle_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }

        public function get_vehicles(){

            $this->db->select('vehicles.*,drivers.name as d_name');
            $this->db->from('vehicles');
            $this->db->join('drivers','drivers.id = vehicles.driver_id');
            $this->db->where('vehicles.visible',1);
            $query = $this->db->get();

            return $query->result_array();

        }

        public function remove_vehicle($vehicle_id){

            $data = array(
                'visible' => 0
            );

            $this->db->where('id',$vehicle_id);
            return $this->db->update('vehicles',$data);
        }

        public function add_vehicle(){

            $data = array(
                'lorry_no' => $this->input->post('vehicle_no'),
                'trailer_no' => $this->input->post('trailer_no'),
                'model' => $this->input->post('model'),
                'driver_id' => 3
            );

            return $this->db->insert('vehicles',$data);
        }
    }

?>