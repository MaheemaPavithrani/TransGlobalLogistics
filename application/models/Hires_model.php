<?php 
    class Hires_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_past_hires($table,$customer_id){

            $this->db->select($table.'.*, d.name as d_name, d.mobile as d_mob, v.lorry_no as v_no');
            $this->db->from($table);
            $this->db->order_by('date','desc');
            $this->db->join('drivers as d',$table.'.driver_id = d.id');
            $this->db->join('vehicles as v','v.driver_id = d.id');
            $this->db->where($table.'.completed',1);
            $this->db->where($table.'.customer_id', $customer_id);
            $query = $this->db->get(); 
            
            return $query->result_array();
            
        }

        public function place_import_request(){

            $data = array(
                'container_type' => $this->input->post('container_type'),
                'container_pickup_datetime' => $this->input->post('container_pickup_datetime'),
                'container_pickup_location' => $this->input->post('container_pickup_location'),
                'loading_port' => $this->input->post('loading_port'),
                'vessel_arrival_datetime' => $this->input->post('vessel_arrival_datetime'),
                'destination' => $this->input->post('destination'),
                'cargo_type' => $this->input->post('cargo_type'),
                'weight' => $this->input->post('weight'),
                'notes' => $this->input->post('notes'),
                'customer_id' => $this->input->post('customer_id'),
            );

            return $this->db->insert('imports',$data);
        }

        public function place_export_request(){

            $data = array(
                'container_type' => $this->input->post('container_type'),
                'pickup_datetime' => $this->input->post('pickup_datetime'),
                'pickup_location' => $this->input->post('pickup_location'),
                'loading_port' => $this->input->post('loading_port'),
                'cargo_type' => $this->input->post('cargo_type'),
                'weight' => $this->input->post('weight'),
                'notes' => $this->input->post('notes'),
                'customer_id' => $this->input->post('customer_id'),
            );

            return $this->db->insert('exports',$data);
        }

        public function get_import_requests($customer_id){
            $this->db->select('*');
            $this->db->from('imports');
            $this->db->order_by('container_pickup_datetime','desc');
            $this->db->where('completed',0);
            $this->db->where('driver_id', null);
            $this->db->where('declined',0);
            $this->db->where('customer_id',$customer_id);
            $query = $this->db->get();

            return $query->result_array();
        }

        public function get_export_requests($customer_id){
            $this->db->select('*');
            $this->db->from('exports');
            $this->db->order_by('pickup_datetime','desc');
            $this->db->where('completed',0);
            $this->db->where('driver_id', null);
            $this->db->where('declined',0);
            $this->db->where('customer_id',$customer_id);
            $query = $this->db->get();                                    
        
            return $query->result_array();
        }

        public function get_ongoing_exports($customer_id){

            $this->db->select('exports.*, d.name as d_name, d.mobile as d_mob, v.lorry_no as v_no');
            $this->db->from('exports');
            $this->db->order_by('pickup_datetime','desc');
            $this->db->join('drivers as d','exports.driver_id = d.id');
            $this->db->join('vehicles as v','d.id = v.driver_id');
            $this->db->where('exports.completed',0);
            $this->db->where('exports.driver_id !=',null);
            $this->db->where('exports.customer_id',$customer_id);
            $query = $this->db->get();                                    
           

            return $query->result_array();
        }

        public function get_ongoing_imports($customer_id){

            $this->db->select('imports.*, d.name as d_name, d.mobile as d_mob, v.lorry_no as v_no');
            $this->db->from('imports');
            $this->db->order_by('container_pickup_datetime','desc');
            $this->db->join('drivers as d','imports.driver_id = d.id');
            $this->db->join('vehicles as v','d.id = v.driver_id');
            $this->db->where('imports.completed',0);
            $this->db->where('imports.driver_id !=',null);
            $this->db->where('imports.customer_id',$customer_id);
            $query = $this->db->get();

            return $query->result_array();

        }

        public function get_rejected_imports($customer_id){
            $this->db->select('imports.*,notifications.message');
            $this->db->from('imports');
            $this->db->join('notifications','notifications.hire_id = imports.id');
            $this->db->order_by('imports.container_pickup_datetime','desc');
            $this->db->where('imports.completed',0);
            $this->db->where('imports.driver_id', null);
            $this->db->where('imports.declined',1);
            $this->db->where('imports.customer_id',$customer_id);
            $this->db->where('notifications.hire_type','imports');
            $query = $this->db->get();

            return $query->result_array();
        }

        public function get_rejected_exports($customer_id){
            $this->db->select('exports.*,notifications.message');
            $this->db->from('exports');
            $this->db->join('notifications','notifications.hire_id = exports.id');
            $this->db->order_by('exports.pickup_datetime','desc');
            $this->db->where('exports.completed',0);
            $this->db->where('exports.driver_id', null);
            $this->db->where('exports.declined',1);
            $this->db->where('customer_id',$customer_id);
            $this->db->where('notifications.hire_type','exports');
            $query = $this->db->get();                                    
        
            return $query->result_array();
        }
        

        public function get_driver_hires($table,$driver_id){

            $this->db->select($table.'.*, c.name as c_name, v.lorry_no as v_no');
            $this->db->from($table);
            $this->db->order_by('date','desc');
            $this->db->join('customers as c',$table.'.customer_id = c.id');
            $this->db->join('vehicles as v','v.driver_id = '.$driver_id);
            $this->db->where($table.'.completed',1);
            $this->db->where($table.'.driver_id', $driver_id);
            $query = $this->db->get(); 
            
            return $query->result_array();
            
        }

        public function get_current_export($driver_id){

            $this->db->select('exports.*, c.name as c_name, c.mobile as c_mob, v.lorry_no as v_no');
            $this->db->from('exports');
            $this->db->join('customers as c','exports.customer_id = c.id');
            $this->db->join('vehicles as v',$driver_id.' = v.driver_id');
            $this->db->where('exports.completed',0);
            $this->db->where('exports.driver_accepted',1);
            $this->db->where('exports.driver_id',$driver_id);
            $this->db->where('DATE(pickup_datetime) <=',date('Y-m-d'));
            $query = $this->db->get();                                    
           

            return $query->row_array();
        }

        public function get_current_import($driver_id){

            $this->db->select('imports.*, c.name as c_name, c.mobile as c_mob, v.lorry_no as v_no');
            $this->db->from('imports');
            $this->db->join('customers as c','imports.customer_id = c.id');
            $this->db->join('vehicles as v',$driver_id.' = v.driver_id');
            $this->db->where('imports.completed',0);
            $this->db->where('imports.driver_accepted',1);
            $this->db->where('imports.driver_id',$driver_id);
            $this->db->where('DATE(container_pickup_datetime) <=',date('Y-m-d'));
            $query = $this->db->get();                                    
           

            return $query->row_array();

        }

        public function get_upcoming_exports($driver_id){

            $this->db->select('exports.*, c.name as c_name, c.mobile as c_mob, v.lorry_no as v_no');
            $this->db->from('exports');
            $this->db->join('customers as c','exports.customer_id = c.id');
            $this->db->join('vehicles as v',$driver_id.' = v.driver_id');
            $this->db->where('exports.completed',0);
            $this->db->where('exports.driver_accepted',1);
            $this->db->where('exports.driver_id',$driver_id);
            $this->db->where('DATE(pickup_datetime) >',date('Y-m-d'));
            $query = $this->db->get();                                    
           

            return $query->result_array();
        }

        public function get_upcoming_imports($driver_id){

            $this->db->select('imports.*, c.name as c_name, c.mobile as c_mob, v.lorry_no as v_no');
            $this->db->from('imports');
            $this->db->join('customers as c','imports.customer_id = c.id');
            $this->db->join('vehicles as v',$driver_id.' = v.driver_id');
            $this->db->where('imports.completed',0);
            $this->db->where('imports.driver_id',$driver_id);
            $this->db->where('imports.driver_accepted',1);
            $this->db->where('DATE(container_pickup_datetime) >',date('Y-m-d'));
            $query = $this->db->get();                                    
           

            return $query->result_array();

        }

        public function get_assigned_hires($table,$driver_id){

            $this->db->select($table.'.*, c.name as c_name,c.mobile as c_mobile, v.lorry_no as v_no');
            $this->db->from($table);
            $this->db->order_by('date','desc');
            $this->db->join('customers as c',$table.'.customer_id = c.id');
            $this->db->join('vehicles as v','v.driver_id = '.$driver_id);
            $this->db->where($table.'.completed',0);
            $this->db->where($table.'.driver_accepted',0);
            $this->db->where($table.'.driver_id', $driver_id);

            if($table == 'imports'){
                $this->db->where('DATE(container_pickup_datetime) >',date('Y-m-d'));
            }else{
                $this->db->where('DATE(pickup_datetime) >',date('Y-m-d'));
            }
            $query = $this->db->get(); 
            
            return $query->result_array();
            
        }

        public function get_assignments_count($driver_id){

            $this->db->from('imports');
            $this->db->where('completed',0);
            $this->db->where('driver_id', $driver_id);
            $this->db->where('declined',0);
            $this->db->where('driver_accepted',0);
            $query = $this->db->get();
            $imports = $query->num_rows();

            $this->db->from('exports');
            $this->db->where('completed',0);
            $this->db->where('driver_id', $driver_id);
            $this->db->where('declined',0);
            $this->db->where('driver_accepted',0);
            $query = $this->db->get();
            $exports = $query->num_rows();

            return $imports+$exports;

        }

        public function accept_hire($table,$hire_id){

            $this->db->select('customer_id');
            $customer_id = $this->db->get_where($table,array(
                                'id' => $hire_id
                            ));

            $data = array(
                'driver_accepted' => 1
            );

            $this->db->where('id',$hire_id);
            $this->db->update($table,$data);

            return $customer_id->row_array();
        }

        public function decline_hire($table,$hire_id){

            $data = array(
                'driver_id' => NULL
            );

            $this->db->where('id',$hire_id);
            return $this->db->update($table,$data);
        }

        public function delete_hire($table,$hire_id){

            $this->db->where('id',$hire_id);

            return $this->db->delete($table);
        }

        

    }
?>