<?php 
    class Hire_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }

        public function get_imports($import_id = false){

            if($import_id == false){
                $this->db->select('imports.*, c.name as c_name, d.name as d_name, v.lorry_no as v_no');
                $this->db->from('imports');
                $this->db->order_by('container_pickup_datetime','desc');
                $this->db->join('customers as c','imports.customer_id = c.id');
                $this->db->join('drivers as d','imports.driver_id = d.id');
                $this->db->join('vehicles as v','d.id = v.driver_id');
                $this->db->where('imports.completed',1);
                $query = $this->db->get();

                return $query->result_array();
            }

            $this->db->select('imports.*, c.name as c_name, c.id as c_id');
            $this->db->from('imports');
            $this->db->order_by('container_pickup_datetime','desc');
            $this->db->join('customers as c','imports.customer_id = c.id');
            // $this->db->join('drivers as d','imports.driver_id = d.id');
            // $this->db->where('imports.completed',1);
            $this->db->where('imports.declined',0);
            $this->db->where('imports.id',$import_id);
            $query = $this->db->get();

            return $query->row_array();

        }

        public function get_exports($export_id = false){

            if($export_id == false){
                $this->db->select('exports.*, c.name as c_name, d.name as d_name, v.lorry_no as v_no');
                $this->db->from('exports');
                $this->db->order_by('pickup_datetime','desc');
                $this->db->join('customers as c','exports.customer_id = c.id');
                $this->db->join('drivers as d','exports.driver_id = d.id');
                $this->db->join('vehicles as v','d.id = v.driver_id');
                $this->db->where('exports.completed',1);
                $query = $this->db->get();

                return $query->result_array();
            }
            $this->db->select('exports.*, c.name as c_name, c.id as c_id');
            $this->db->from('exports');
            $this->db->order_by('pickup_datetime','desc');
            $this->db->join('customers as c','exports.customer_id = c.id');
            // $this->db->join('drivers as d','exports.driver_id = d.id');
            // $this->db->where('exports.completed',1);
            $this->db->where('exports.declined',0);
            $this->db->where('exports.id',$export_id);
            $query = $this->db->get();                                    
           

            return $query->row_array();

        }

        public function get_ongoing_exports($export_id = false){

            if($export_id == false){

                $this->db->select('exports.*, c.name as c_name, d.name as d_name, v.lorry_no as v_no');
                $this->db->from('exports');
                $this->db->order_by('pickup_datetime','desc');
                $this->db->join('customers as c','exports.customer_id = c.id');
                $this->db->join('drivers as d','exports.driver_id = d.id');
                $this->db->join('vehicles as v','d.id = v.driver_id');
                $this->db->where('exports.completed',0);
                $this->db->where('exports.driver_id !=', null);
                $query = $this->db->get();                                    
            
                return $query->result_array();
            }

            $this->db->select('exports.*, c.name as c_name, d.name as d_name, v.lorry_no as v_no');
            $this->db->from('exports');
            $this->db->order_by('pickup_datetime','desc');
            $this->db->join('customers as c','exports.customer_id = c.id');
            $this->db->join('drivers as d','exports.driver_id = d.id');
            $this->db->join('vehicles as v','d.id = v.driver_id');
            $this->db->where('exports.completed',0);
            $this->db->where('exports.id',$export_id);
            $query = $this->db->get();                                    
           

            return $query->result_array();

        }

        public function get_ongoing_imports($import_id = false){

            if($import_id == false){

                $this->db->select('imports.*, c.name as c_name, d.name as d_name, v.lorry_no as v_no');
                $this->db->from('imports');
                $this->db->order_by('container_pickup_datetime','desc');
                $this->db->join('customers as c','imports.customer_id = c.id');
                $this->db->join('drivers as d','imports.driver_id = d.id');
                $this->db->join('vehicles as v','d.id = v.driver_id');
                $this->db->where('imports.completed',0);
                $this->db->where('imports.driver_id !=', null);
                $query = $this->db->get();

                return $query->result_array();
            }

            $this->db->select('imports.*, c.name as c_name, d.name as d_name, v.lorry_no as v_no');
            $this->db->from('imports');
            $this->db->order_by('container_pickup_datetime','desc');
            $this->db->join('customers as c','imports.customer_id = c.id');
            $this->db->join('drivers as d','imports.driver_id = d.id');
            $this->db->join('vehicles as v','d.id = v.driver_id');
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
            $this->db->where('imports.declined',0);
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
            $this->db->where('exports.declined',0);
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
            $this->db->where('declined',0);
            $query = $this->db->get();
            $imports = $query->num_rows();

            $this->db->from('exports');
            $this->db->where('completed',0);
            $this->db->where('driver_id', null);
            $this->db->where('declined',0);
            $query = $this->db->get();
            $exports = $query->num_rows();

            return $imports+$exports;
        }

        public function get_hires_this_month(){
            $this->db->from('imports');
            $this->db->where('completed',1);
            $this->db->where('MONTH(container_pickup_datetime)',date("m"));
            $this->db->where('YEAR(container_pickup_datetime)',date("Y"));
            $query = $this->db->get();
            $imports = $query->num_rows();

            $this->db->from('exports');
            $this->db->where('completed',1);
            $this->db->where('MONTH(pickup_datetime)',date("m"));
            $this->db->where('YEAR(pickup_datetime)',date("Y"));
            $query = $this->db->get();
            $exports = $query->num_rows();

            return $imports+$exports;
        }

        public function ongoing_hires(){
            $this->db->from('imports');
            $this->db->where('completed',0);
            $this->db->where('driver_id !=',null);
            $this->db->where('MONTH(container_pickup_datetime)',date("m"));
            $this->db->where('YEAR(container_pickup_datetime)',date("Y"));
            $query = $this->db->get();
            $imports = $query->num_rows();

            $this->db->from('exports');
            $this->db->where('completed',0);
            $this->db->where('driver_id !=',null);
            $this->db->where('MONTH(pickup_datetime)',date("m"));
            $this->db->where('YEAR(pickup_datetime)',date("Y"));
            $query = $this->db->get();
            $exports = $query->num_rows();

            return $imports+$exports;
        }

        public function view_past_hires($table,$driver_id){

            $this->db->select($table.'.*, c.name as c_name, d.name as d_name, v.lorry_no as v_no');
            $this->db->from($table);
            $this->db->order_by('date','desc');
            $this->db->join('customers as c',$table.'.customer_id = c.id');
            $this->db->join('drivers as d',$table.'.driver_id = d.id');
            $this->db->join('vehicles as v','v.driver_id = d.id');
            $this->db->where($table.'.completed',1);
            $this->db->where($table.'.driver_id', $driver_id);
            $query = $this->db->get(); 
            
            return $query->result_array();
            
        }

        public function assign_driver($hire_type,$hire_id,$driver_id){

            $data = array(
                'driver_id' => $driver_id
            );

            $this->db->where('id',$hire_id);
            return $this->db->update($hire_type,$data);
        }

        public function decline_hire($hire_type,$hire_id){

            $data = array(
                'declined' => 1
            );

            $this->db->where('id',$hire_id);
            $this->db->update($hire_type,$data);
        }

        public function graph_data_imports(){
            $this->db->select('YEAR(i.container_pickup_datetime) as im,count(DISTINCT i.id) as import_count');
            
            $this->db->from('imports as i');

            $this->db->group_by('YEAR(i.container_pickup_datetime)');
 
            $graph = $this->db->get();

            return $graph;
        }

        public function graph_data_exports(){
            $this->db->select('YEAR(e.pickup_datetime) as ex,count(DISTINCT e.id) as export_count');
            
            $this->db->from('exports as e');

            $this->db->group_by('YEAR(e.pickup_datetime)');
 
            $graph = $this->db->get();

            return $graph;
        }
    }
?>