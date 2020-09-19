<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
/******************************
 ** Author:manali,indhu
 ** Desc  : Generic model
 *******************************/
/*
//post_data ->insert data
get_row_array =>get one row  record
update_data =>update data
delete_data => delete data
getIdOrderBy =>get last id

*/

class MGeneric extends CI_Model {
	function __construct() {
		//parent::__construct();
		// $this->load->database();
	}
    
    //insert data
    public function post_data($table,$postdata) 
    {

		$data=$this->db->insert($table,$postdata);
		if ($data) {
			return true;
		} else {
			return false;

		}
	}
	public function get_row_array($table,$selection,$criteria)
	{
		$this->onSelection($selection);
		$this->onWhere($criteria);
		$this->onTable($table);

		 $query = $this->db->get();

		return $this->checkQueryReturnRowArray($query);
	}

	public function onTable($table)
	{
		if (!empty($table)) {
			$this->db->from($table);
		} else {
			var_dump($table);
			exit;
		}
	}
	public function onWhere($array_fields) 
	{
		if (!empty($array_fields)) {
			if (is_array($array_fields)) {
				foreach ($array_fields as $key => $field) {
					$this->db->where($key, $field);
				}
			}
		}
	}

	public function onSelection($selection) 
	{
		if ($selection == 'A' || $selection == 'a' || $selection == '*' || $selection == 'all' || $selection == 'ALL') {
			//no statement means select all
		} else {
			if ($this->onArray($selection)) {
			} else {
				$this->onNotArray($selection);
			}
		}
	}
	public function onArray($selection) 
	{
		if (is_array($selection)) {
			$result = true;
			if (!empty($selection)) {
				foreach ($selection as $selectStatement) {
					$this->db->select($selectStatement);
				}
			} else {
				//no statement means select all
			}
		} else {
			$result = false;
		}
		return $result;
	}
	public function onNotArray($selection) {
		if (empty($selection)) {
			//no statement means select all
		} else {
			$this->db->select($selection);
		}
	}
	public function checkQueryReturnRowArray($query)
	{

		if ($query->num_rows() > 0) {
			$result = $query->row();
		} else {
			$result = null;
		}
		return $result;
	}
	public function update_data($tbl_name, $filters, $data) {
		$this->db->where($filters);
		$this->db->update($tbl_name, $data);
		//echo $this->db->last_query();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function get_all_records($table, $selection, $criteria) {
		$this->onSelection($selection);
		$this->onWhere($criteria);
		$this->onTable($table);

		$query = $this->db->get();

		return $this->checkQueryReturnArray($query);
	}
	public function checkQueryReturnArray($query) {
		// echo $query->num_rows();
		if ($query->num_rows() > 0) {
			$result = $query->result();
		} else {
			$result = null;
		}
		return $result;
	}

   	public function getIdOrderBy($table,$selection){
		$this->db->order_by($selection,"desc");
		$this->db->from($table);
		$query=$this->db->get();
		return$query->row($selection);
	}
	 public function getNum_Rows($tbl_name,$filters)
    {
    	
		$this->db->where($filters);
		$this->db->from($tbl_name);
		$query=$this->db->get();
		return $query->num_rows();
    }

    public function delete_data($tbl_name, $filters) {
		$this->db->where($filters);
		$this->db->delete($tbl_name);
	    // echo $this->db->last_query();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getRowArray($tbl_name,$filters)
	{
		$this->db->where($filters);
		$this->db->from($tbl_name);
		$query=$this->db->get();
		return $query->row_array();
	}

	function getRecordsByIDOneRow($table, $selection, $criteria, $row_field) {
		$this->onSelection($selection);
		$this->onWhere($criteria);
		$this->onTable($table);

		$query = $this->db->get();

		return $this->checkQueryReturnRow($query, $row_field);
	}


	function checkQueryReturnRow($query) {

		if ($query->num_rows()>0) {

            $result =$query->result();
            
		} else {
			$result = null;
		}
		return $result;
    }

    function getRecordsByID($table, $selection, $criteria) {
		$this->onSelection($selection);
		$this->onWhere($criteria);
		$this->onTable($table);

		$query = $this->db->get();

		return $this->checkQueryReturnRow($query);
	}

	public function getResultArray($tbl_name,$filters)
	{
		$this->db->where($filters);
		$this->db->from($tbl_name);
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>
