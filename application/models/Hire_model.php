<?php 
    class Hire_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }

        public function get_imports($import_id = false){

            if($import_id == false){
                $this->db->select('imports.*, c.name as c_name, d.name as d_name');
                $this->db->from('imports');
                $this->db->order_by('container_pickup_datetime','desc');
                $this->db->join('customers as c','imports.customer_id = c.id');
                $this->db->join('drivers as d','imports.driver_id = d.id');
                $this->db->where('imports.completed',1);
                $query = $this->db->get();

                return $query->result_array();
            }

            $this->db->select('imports.*, c.name as c_name');
            $this->db->from('imports');
            $this->db->order_by('container_pickup_datetime','desc');
            $this->db->join('customers as c','imports.customer_id = c.id');
            // $this->db->join('drivers as d','imports.driver_id = d.id');
            // $this->db->where('imports.completed',1);
            $this->db->where('imports.id',$import_id);
            $query = $this->db->get();

            return $query->result_array();

        }

        public function get_exports($export_id = false){

            if($export_id == false){
                $this->db->select('exports.*, c.name as c_name, d.name as d_name');
                $this->db->from('exports');
                $this->db->order_by('pickup_datetime','desc');
                $this->db->join('customers as c','exports.customer_id = c.id');
                $this->db->join('drivers as d','exports.driver_id = d.id');
                $this->db->where('exports.completed',1);
                $query = $this->db->get();

                return $query->result_array();
            }
            $this->db->select('exports.*, c.name as c_name');
            $this->db->from('exports');
            $this->db->order_by('pickup_datetime','desc');
            $this->db->join('customers as c','exports.customer_id = c.id');
            // $this->db->join('drivers as d','exports.driver_id = d.id');
            // $this->db->where('exports.completed',1);
            $this->db->where('exports.id',$export_id);
            $query = $this->db->get();                                    
           

            return $query->result_array();

        }

        public function get_ongoing_exports($export_id = false){

            if($export_id == false){

                $this->db->select('exports.*, c.name as c_name, d.name as d_name');
                $this->db->from('exports');
                $this->db->order_by('pickup_datetime','desc');
                $this->db->join('customers as c','exports.customer_id = c.id');
                $this->db->join('drivers as d','exports.driver_id = d.id');
                $this->db->where('exports.completed',0);
                $this->db->where('exports.driver_id !=', null);
                $query = $this->db->get();                                    
            
                return $query->result_array();
            }

            $this->db->select('exports.*, c.name as c_name, d.name as d_name');
            $this->db->from('exports');
            $this->db->order_by('pickup_datetime','desc');
            $this->db->join('customers as c','exports.customer_id = c.id');
            $this->db->join('drivers as d','exports.driver_id = d.id');
            $this->db->where('exports.completed',0);
            $this->db->where('exports.id',$export_id);
            $query = $this->db->get();                                    
           

            return $query->result_array();

        }

        public function get_ongoing_imports($import_id = false){

            if($import_id == false){

                $this->db->select('imports.*, c.name as c_name, d.name as d_name');
                $this->db->from('imports');
                $this->db->order_by('container_pickup_datetime','desc');
                $this->db->join('customers as c','imports.customer_id = c.id');
                $this->db->join('drivers as d','imports.driver_id = d.id');
                $this->db->where('imports.completed',0);
                $this->db->where('imports.driver_id !=', null);
                $query = $this->db->get();

                return $query->result_array();
            }

            $this->db->select('imports.*, c.name as c_name, d.name as d_name');
            $this->db->from('imports');
            $this->db->order_by('container_pickup_datetime','desc');
            $this->db->join('customers as c','imports.customer_id = c.id');
            $this->db->join('drivers as d','imports.driver_id = d.id');
            $this->db->where('imports.completed',0);
            $this->db->where('imports.id',$import_id);
            $query = $this->db->get();

            return $query->result_array();

        }

        public function get_import_requests(){
            $this->db->select('imports.*, c.name as c_name');
            $this->db->from('imports');
            $this->db->order_by('container_pickup_datetime','desc');
            $this->db->join('customers as c','imports.customer_id = c.id');
            $this->db->where('imports.completed',0);
            $this->db->where('imports.driver_id', null);
            $query = $this->db->get();

            return $query->result_array();
        }

        public function get_export_requests(){
            $this->db->select('exports.*, c.name as c_name');
            $this->db->from('exports');
            $this->db->order_by('pickup_datetime','desc');
            $this->db->join('customers as c','exports.customer_id = c.id');
            $this->db->where('exports.completed',0);
            $this->db->where('exports.driver_id', null);
            $query = $this->db->get();                                    
        
            return $query->result_array();
        }

        public function mark_completed($table,$hire_id){

            $data = array(
                'completed' => 1,
            );

            $this->db->where('id',$hire_id);
            return $this->db->update($table,$data);
        }

        public function hire_requests(){
            $this->db->from('imports');
            $this->db->where('completed',0);
            $this->db->where('driver_id', null);
            $query = $this->db->get();
            $imports = $query->num_rows();

            $this->db->from('exports');
            $this->db->where('completed',0);
            $this->db->where('driver_id', null);
            $query = $this->db->get();
            $exports = $query->num_rows();

            return $imports+$exports;
        }
    }
?>