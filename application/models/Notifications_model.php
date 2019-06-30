<?php 
    class Notifications_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }

        public function hire_completed($hire_type,$hire_id){

            $data = array(
                'sender_id' => $this->session->userdata('user_id'),
                'receiver_id' => 1,
                'title' => 'Hire Completed',
                'message' => $hire_type." ID: ".$hire_id." has been completed successfully",
                'hire_type' => $hire_type,
                'hire_id' => $hire_id
            );

            return $this->db->insert('notifications',$data);
        }

        public function get_customer_notifications($customer_id){

            $this->db->select('*');
            $this->db->from('notifications');
            $this->db->where('visible',1);
            $this->db->where('receiver_id',$customer_id);
            $query = $this->db->get();

            return $query->result_array();
        }

        public function mark_read($notification_id){

            $data['visible'] = 0;

            $this->db->where('id',$notification_id);
            return $this->db->update('notifications',$data);

        }

        public function accepted_hire($hire_type,$hire_id,$receiver_id){

            $data = array(
                'sender_id' => $this->session->userdata('user_id'),
                'receiver_id' => $receiver_id,
                'title' => 'Hire Request Accepted',
                'message' => "Your Request has been accepted",
                'hire_type' => $hire_type,
                'hire_id' => $hire_id
            );

            return $this->db->insert('notifications',$data);

        }
        

    }
?>