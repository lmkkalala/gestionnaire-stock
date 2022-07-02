<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataHandle extends CI_Model {

    public function loadData($table){
		$this->db->order_by('id','desc');
		return $this->db->get($table)->result_array();
	}

	public function event($data){
		return $this->db->insert('journal',$data);
	}

    public function loadDataInnerJoin($table,$join_table,$join_description){
        $this->db->join($join_table,$join_description); 
		return $this->db->get($table)->result_array();
	}

	public function loadDataInnerJoinWhere($table,$join_table,$join_description,$where = array()){
        $this->db->join($join_table,$join_description); 
		return $this->db->get_where($table, $where)->result_array();
	}

	public function loadDataInnerJoinLike($table,$join_table,$join_description,$where = array()){
        $this->db->join($join_table,$join_description); 
		$this->db->like($where);
		$this->db->order_by('journal.id','desc');
		return $this->db->get($table)->result_array();
	}

	public function loadDataWhere($table,$conditon=array()){
		return $this->db->get_where($table,$conditon)->result_array();
	}

	public function loadDataLike($table,$conditon=array()){
		$this->db->like($conditon);
		return $this->db->get_where($table)->result_array();
	}

    public function insertData($table,$data=array()){
		return $this->db->insert($table,$data);
	}

    public function deleteData($table,$conditon=array()){
		return $this->db->delete($table,$conditon);
	}

    public function updateData($table,$data=array(),$conditon=array()){
		return $this->db->update($table,$data,$conditon);
	}


}