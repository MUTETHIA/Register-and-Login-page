<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{

public function register($params){
  $qry=$this->db->insert('tbl_users',$params);
  if($qry){
      return true;
  }
  else{
      return false;
  }
}

 public function login($params){
     $data=array('username'=>$params);
     $query=$this->db->get_where('tbl_users',$data);
     if($query->num_rows()==1){
         return $query->row('password');
     }
     else{
         return false;
     }
 }

 public function getUser($params){
     $data=array('username'=>$params);
     $query=$this->db->get_where('tbl_users',$data);
     if($query){
         return $query->result_array();
     }
     else{
         return false;
     }
 }

}

?>