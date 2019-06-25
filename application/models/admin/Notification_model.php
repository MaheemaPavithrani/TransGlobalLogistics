<?php 
    class Notification_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }

        public function decline_hire(){

            $data = array(
                'sender_id' => 1,
                'receiver_id' => $this->input->post('customer'),
                'message' => $this->input->post('message')
            );

            return $this->db->insert('notifications',$data);
        }

    }
?>