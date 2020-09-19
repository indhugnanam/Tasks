<?php
class MCart extends CI_model
{
  
	function __construct()
	{

	}
	
	public function do_login($table,$id,$password)
    {
    
        $res=$this->generic->getRowArray($table,$id);

        if (!empty($res) &&  !is_null($res)) 
        {
            if ($password==$res['Password']) {             

                if($res['Status']=='A'){
                    $this->session->set_userdata('User_Id',$res['User_Id']);
                    $this->session->set_userdata('User_Role',$res['Role']);
                    return 'success';
                }
                return "User Is InActive";
            } 
            else 
            {
                return 'Wrong Password';
            }
        } 
        else 
        {
            return 'UnAuthorized User';
        }
    }

    public function getAllRecords($table,$selection,$critria)
	{
		return $this->generic->get_all_records($table,$selection,$critria);
	}
	
	public function get_category_list()
	{

		$this->db->select("Sub_Category.Sub_Name,Sub_Category.Sub_Id,Category.Category_Id");
	    $this->db->from("Products");
	    $this->db->join('Sub_Category','Sub_Category.Sub_Id=Products.Sub_Id','right');
	    $this->db->join('Category','Category.Category_Id=Sub_Category.Category_Id','right');
	    $this->db->where('Products.Status','A');
	    $this->db->GROUP_BY('Sub_Category.Sub_Name');
	    $this->db->where('Category.Status','A');
	    $this->db->where('Sub_Category.Status','A');
	    return $this->db->get()->result();
	}

	public function get_all_products(){
			
		$this->db->select("Products.Product_Name,Products.Product_Id,Products.Image,Sub_Category.Sub_Id");
	    $this->db->from("Products");
	    $this->db->join('Sub_Category','Sub_Category.Sub_Id=Products.Sub_Id','left');
	    $this->db->join('Category','Category.Category_Id=Sub_Category.Category_Id','left');
	    $this->db->where('Products.Status','A');
	    $this->db->where('Category.Status','A');
	    $this->db->where('Sub_Category.Status','A');
	    // vdebug($this->db->get()->result());
	    return $this->db->get()->result();
	}
}
?>