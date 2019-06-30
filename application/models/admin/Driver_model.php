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
                'mobile' => $this->input->post('mobile'),
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
                'mobile' => $this->input->post('mobile'),
            );

            $this->db->where('id',$driver_id);
            return $this->db->update('drivers',$data);
        }

        public function get_available_drivers($date = false){

            if($date == false){
                $this->db->select('drivers.*, vehicles.lorry_no');
                $this->db->from('drivers');
                $this->db->join('vehicles','vehicles.driver_id = drivers.id');
                $this->db->where('drivers.avail',1);
                // $this->db->where('drivers.on_hire',0);
                $query = $this->db->get();

                return $query->result_array();
            }
            $this->db->select('driver_id');
            $this->db->from('exports');
            $this->db->where('CAST(pickup_datetime as DATE)=',$date);
            $this->db->where('completed',0);
            $this->db->where('driver_id !=',NULL);
            $exports = $this->db->get();

            $this->db->select('imports.driver_id');
            $this->db->from('imports');
            $this->db->where('CAST(imports.container_pickup_datetime as DATE)=',$date);
            $this->db->where('imports.completed',0);
            $this->db->where('driver_id !=',NULL);
            $imports = $this->db->get();

            $array = array(0);

            foreach($exports->result_array() as $row)
            {
                $array[] = $row['driver_id']; 
            }


            foreach($imports->result_array() as $row)
            {
                $array[] = $row['driver_id']; 
            }

            $this->db->select('drivers.*,vehicles.lorry_no');
            $this->db->from('drivers');
            $this->db->join('vehicles','vehicles.driver_id = drivers.id');
            $this->db->where_not_in('drivers.id',$array);
            $query = $this->db->get();

            return $query->result_array();
        }
        
        public function mark_completed($driver_id){
            $data = array(
                'on_hire' => 0 
            );

            $this->db->where('id',$driver_id);
            return $this->db->update('drivers',$data);
        }

        public function assign_driver($driver_id){

            $data = array(
                'on_hire' => 1
            );

            $this->db->where('id',$driver_id);
            return $this->db->update('drivers',$data);
        }
    }
?>