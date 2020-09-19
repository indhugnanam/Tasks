<?php

class MAdmin extends CI_model
{
  
	function __construct()
	{

	}
	public function insert_data($table,$post_data)
	{
		return $this->generic->post_data($table,$post_data);
	}
	public function getsubCategory()
	{
		$this->db->select('Sub_Category.*,Category.Category_Name');
		$this->db->from('Sub_Category');
		$this->db->join('Category','Category.Category_Id= Sub_Category.Category_Id');
		$res =$this->db->get()->result();
		return $res;
	}
	
	public function get_record_by_id($table,$selection,$critria)
	{
		return $this->generic->get_row_array($table,$selection,$critria);
	}
	public function update_data($tbl_name, $filters, $data)
	{
		return $this->generic->update_data($tbl_name, $filters, $data);
	}
	public function getAllRecords($table,$selection,$critria)
	{
		return $this->generic->get_all_records($table,$selection,$critria);
	}
	public function get_product_list($id='')
	{
		$this->db->select('Products.*,Category.Category_Id,Category.Category_Name,Sub_Category.Sub_Name,Sub_Category.Sub_Id');
		$this->db->from('Products');
		$this->db->join('Sub_Category','Sub_Category.Sub_Id= Products.Sub_Id');
		$this->db->join('Category','Category.Category_Id= Sub_Category.Category_Id');
		if(!empty($id)){
			
			$this->db->where('Products.Product_Id',$id);
			$res =$this->db->get()->row();
		}else{
			$res =$this->db->get()->result();
		}
		return $res;
	}
	public function delete_data($table,$filter)
    {
  		return  $this->generic->delete_data($table,$filter);
    }

}

?>