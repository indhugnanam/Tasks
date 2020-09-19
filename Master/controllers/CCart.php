<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CCart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MCart');
		$this->load->library('cart');
	}
	
	public function index()
	{      
		$data['script']="loginScript";
		$data['vw']="login";
		$this->load->view('details',$data);
	}

	public function login()
    {

        $this->form_validation->set_rules('Mobile', 'Mobile Number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
      
        if ($this->form_validation->run() ==true) 
        {
            $input=$this->input->post(null, true);

            $filter=array('Mobile'=>$input['Mobile']);
            $res=$this->MCart->do_login('User',$filter,$input['password']);
            if ($this->input->is_ajax_request()) 
            {
                echo json_encode(['status'=>$res]);
            }
        } 
        else 
        {
            echo json_encode(['status'=>'dberror']);
        }
    }

    public function Dashboard()
	{      
		$role=$this->session->userdata('User_Role');
		
		$table="Category";
		$selection ="Category_Id,Category_Name";
		$criteria =array("Status"=>"A");
		$data['category_list']=$this->MCart->getAllRecords($table,$selection,$criteria);

		$data['sub_cat'] =$this->MCart->get_category_list();
		$data['prod_category'] =$this->MCart->get_all_products();

		if($role=='U'){
			
		   	$data['script']="";
			$data['vw']="index";
			$this->load->view('details',$data);
		}
		else if($role=='A'){
			$data['script']="";
			$data['vw']="dashboard";
			$this->load->view('vDetails',$data);
		}
		else{
			$data['script']="loginScript";
			$data['vw']="login";
			$this->load->view('details',$data);
		}
	}

	// logout
    public function Logout(){

        $this->session->sess_destroy();
		redirect('/');
    }
}
?>
