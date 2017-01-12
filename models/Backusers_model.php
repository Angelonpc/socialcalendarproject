<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backusers_model extends CI_Model {

 function  __constract(){
  parent::__constract;
 }

 function getGroup($search){
  $this->db->select('id,username,email,gid,is_confirmed,is_admin');
  $this->db->like('username',$search,'after');
  $this->db->from('users');
  $query = $this->db->get();
  return $query->result();
 }
}
?>