<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class imagenModel extends CI_Model {
	public $table;
	public function  __construct(){
		parent::__construct();
		$this->table="imagen";
	}

	public function getAll(){
		$data=$this->db->get($this->table);
		$all=array();
		if($data->num_rows()>0){
			foreach($data->result() as $row){
				$all[]=array(
					"id"=>$row->id,
					"nombre"=>$row->nombre,
					"extension"=>$row->extension,
					"data"=>$row->data,
					"deleted"=>$row->deleted,
					"created"=>$row->created,
					"modified"=>$row->modified
				);
			}
		}
		return $all;
	}
	public function create($data){
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	public function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete($this->table);
		return true;
	}
	public function getOne($id){
		$this->db->where("id",$id);
		$data=$this->db->get($this->table);
		$all=array();
		if($data->num_rows()>0){
			foreach($data->result() as $row){
				$all=array(
					"id"=>$row->id,
					"nombre"=>$row->nombre,
					"extension"=>$row->extension,
					"data"=>$row->data,
					"deleted"=>$row->deleted,
					"created"=>$row->created,
					"modified"=>$row->modified
				);
			}
			return $all;
		}else{
			return FALSE;
		}
	}
}

/* End of file imagenmodel.php */
/* Location: ./application/models/imagenmodel.php */