<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MAdmin');
	}


	public function index()
	{

		$data['remain_order']=$this->MAdmin->get_order_details($this->session->userdata('User_Role'),$this->session->userdata('User_Id'),'all');

		$data['order_title']='All Orders';

		$data['script']="";
		$data['vw']="Order/OrdersList";
		$this->load->view('vDetails',$data);
	}

	//sub category add page
	public function AddSubCategory()
	{
		$data['cat_list']=$this->get_all_categories();
		$data['script']="SubCategory/add_subcatScript";
		$data['vw']="SubCategory/Add_SubCategory";
		$this->load->view('vDetails',$data);
	}

    //category list page
	public function SubCategoryList()
	{
		$data['sub_cat_list']=$this->MAdmin->getsubCategory();

		$data['script']="";
		$data['vw']="SubCategory/SubCatList";
		$this->load->view('vDetails',$data);
	}

	//submit sub category
	public function Submit_SubCategory()
	{
		$input =$this->input->post();//post data
		
		$table ="Sub_Category";
		$post_data =array(
			'Category_Id'=>$input['Cat_id'],
			'Sub_Name'=>$input['subcat_name'],
			"Status"=>isset($input['Status'])?'A':"I"
      	);

		$add_category =$this->MAdmin->insert_data($table,$post_data);//insert data

		if($add_category)
		{
         	echo json_encode(['msg'=>'Succusfully Added!']);
		}
		else
		{
           echo json_encode(['msg'=>'UnAble To Add']);
		}
	}
	//edit category
	public function edit_subcategory($id="")
	{
		$data['cat_list']=$this->get_all_categories();

		//get records by cat_id
		$table ="Sub_Category";
		$selection ="*";
		$criteria =array('Sub_Id'=>$id);
		$data['cat_data'] =$this->MAdmin->get_record_by_id($table,$selection,$criteria);
        
		$data['script']="SubCategory/add_subcatScript";
		$data['vw']="SubCategory/edit_subcategory";
		$this->load->view('vDetails',$data);
	}

	//delete category
	public function delete_subcategory($id="")
	{
		//get records by cat_id
		$table ="Products";
		$selection ="*";
		$filter =array('Sub_Id'=>$id);
		$getrecord =$this->MAdmin->get_record_by_id($table,$selection,$filter);
		if(empty($getrecord)){			
			$table ="Sub_Category";
			$delete =$this->MAdmin->delete_data($table,$filter);
		}
        redirect('CAdmin/SubCategoryList','refresh');

	}

	//edit category
	public function list_subcategory($id="")
	{
		if(empty($id)){
			$id =$this->input->post('Cat_id');
		}

		//get records by cat_id
		$table ="Sub_Category";
		$selection ="Sub_Id,Sub_Name";
		$criteria =array('Category_Id'=>$id,'Status'=>'A');
		$sub_cat =$this->MAdmin->getAllRecords($table,$selection,$criteria);
      
       if($sub_cat){
     		echo json_encode(['msg'=>'success','data'=>$sub_cat]);
     	}else{
     		echo json_encode(['msg'=>'Empty LIst']);
     	}
	}
	

	//update category
	public function update_SubCategory()
	{
		//post data
		$input =$this->input->post();
				
		$table ="Sub_Category";
		$update_data =array(
			'Category_Id'=>$input['Cat_id'],
			'Sub_Name'=>$input['sub_name'],
			"Status"=>isset($input['Status'])?'A':"I"
      	);

	    $filter=array('Sub_Id'=>$input['sub_id']);
		//update data to db
		$res =$this->MAdmin->update_data($table,$filter,$update_data);
		if($res)
		{
     		echo json_encode(['msg'=>'Succusfully Updated!']);
		}
		else
		{
           echo json_encode(['msg'=>'UnAble To Update']);
		}
	}


	//category add page
	public function AddCategory()
	{
		$data['script']="Category/add_categoryScript";
		$data['vw']="Category/Add_Category";
		$this->load->view('vDetails',$data);
	}

    //category list page
	public function CategoryList()
	{

		$table="Category";
		$selection ="*";
		$criteria =array("*");
	 	//get all category list
		$data['category_list']=$this->MAdmin->getAllRecords($table,$selection,$criteria);

		$data['script']="";
		$data['vw']="Category/CategoryList";
		$this->load->view('vDetails',$data);
	}

	//submit category
	public function Submit_Category()
	{
		$input =$this->input->post();//post data
		
		$table ="Category";
		$post_data =array(
			'Category_Name'=>$input['cat_name'],
			"Status"=>isset($input['Status'])?'A':"I"
      	);

		$add_category =$this->MAdmin->insert_data($table,$post_data);//insert data

		if($add_category)
		{
         	echo json_encode(['msg'=>'Succusfully Added!']);
		}
		else
		{
           echo json_encode(['msg'=>'UnAble To Add']);
		}

	}
	//edit category
	public function edit_category($id="")
	{
		//get records by cat_id
		$table ="Category";
		$selection ="*";
		$criteria =array('Category_Id'=>$id);
		$data['cat_data'] =$this->MAdmin->get_record_by_id($table,$selection,$criteria);
        
		$data['script']="Category/add_categoryScript";
		$data['vw']="Category/edit_category";
		$this->load->view('vDetails',$data);
	}

	//delete category
	public function delete_category($id="")
	{
		//get records by cat_id
		$table ="Sub_Category";
		$selection ="*";
		$filter =array('Category_Id'=>$id);
		$getrecord =$this->MAdmin->get_record_by_id($table,$selection,$filter);
		if(empty($getrecord)){			
			$table ="Category";
			$delete =$this->MAdmin->delete_data($table,$filter);
		}
        redirect('CAdmin/CategoryList','refresh');

	}

	//update category
	public function update_Category()
	{
		//post data
		$input =$this->input->post();
				
		$table ="Category";
		$update_data =array(
			'Category_Name'=>$input['cat_name'],
			"Status"=>isset($input['Status'])?'A':"I"
      	);

	    $filter=array('Category_Id'=>$input['cat_id']);
		//update data to db
		$res =$this->MAdmin->update_data($table,$filter,$update_data);
		if($res)
		{
     		echo json_encode(['msg'=>'Succusfully Updated!']);
		}
		else
		{
           echo json_encode(['msg'=>'UnAble To Update']);
		}
	}

	//add product page
	public function AddProduct()
	{

		//get all category list
		$data['cat_list']=$this->get_all_categories();

		$data['script']="Product/add_productScript";
		$data['vw']="Product/Add_Product";
		$this->load->view('vDetails',$data);
	}

	//product list
	public function ProductList()
	{
        
		//get all product list
		$data['prod_list'] =$this->MAdmin->get_product_list();

		$data['script']="";
		$data['vw']="Product/ProductList";
		$this->load->view('vDetails',$data);
	}

    //submit product dat
	public function Submit_Product()
	{  

		//post data
		$input =$this->input->post();
  		if (!empty($_FILES['userfile']['name'])) 
        {
	        //upload file config
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
			
			//upload file
			if (!$this->upload->do_upload('userfile'))
			{
			    
				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				$error = array('error' => $this->upload->display_errors());
				echo json_encode(['msg'=>'error','res_data'=>$this->upload->display_errors()]);
				die;
			}
			else
			{
	        	$upload_data = $this->upload->data();
	           $post_data['Image'] =$upload_data['file_name'];
			}
		}
		
		$post_data['Product_Name'] =$input['prod_name'];
		$post_data['Sub_Id'] =$input['sub_id'];
		$post_data['Price'] =$input['price'];
		$post_data['Status'] =isset($input['Status'])?'A':"I";
		$table ="Products";
		//insert data 
		$res =$this->MAdmin->insert_data($table,$post_data);
		// vdebug($res);
		if($res)
		{
         	echo json_encode(['msg'=>'success','res_data'=>"succusfully added!"]);
		}
		else
		{
           echo json_encode(['msg'=>'error','res_data'=>"unable to add "]);
		}
	}

	//edit product
	public function edit_product($id='')
	{
		//get all catrgory list
		$data['cat_list']=$this->get_all_categories();
		$data['product_data']=$this->MAdmin->get_product_list($id);

       //get product data by id
		$table ="Products";
		$selection ="*";
		$criteria =array('Product_Id'=>$id);
		$data['prod_data'] =$this->MAdmin->get_record_by_id($table,$selection,$criteria);        

		$data['script']="Product/add_productScript";
		$data['vw']="Product/edit_product";
		$this->load->view('vDetails',$data);
	}

	//delete category
	public function delete_product($id="")
	{
				
		$table ="Products";
		$filter =array('Product_Id'=>$id);
		$delete =$this->MAdmin->delete_data($table,$filter);

        redirect('CAdmin/ProductList','refresh');

	}


	//update product
	public function update_product()
	{

		//post data
	   $input =$this->input->post();
        
        //upload file
       if (!empty($_FILES['userfile']['name'])) 
       {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('userfile'))
			{
			    
				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				$error = array('error' => $this->upload->display_errors());
				echo json_encode(['msg'=>'error','res_data'=>$this->upload->display_errors()]);
				die;
			}
			else
			{
		        $upload_data = $this->upload->data();
		        $update_data['Image'] =$upload_data['file_name'];
		    }
		}    
       //update data
		$update_data['Product_Name'] =$input['prod_name'];
		$update_data['Sub_Id'] =$input['editsub_id'];
		$update_data['Price'] =$input['price'];
		$update_data['Status'] =isset($input['Status'])?'A':"I";

		$table ="Products";
		$filter =array('Product_Id'=>$input['prod_id']);
		$res =$this->MAdmin->update_data($table,$filter,$update_data);
		
		if($res)
		{
         	echo json_encode(['msg'=>'success','res_data'=>"succusfully added!"]);
		}
		else
		{
      	  	echo json_encode(['msg'=>'error','res_data'=>"unable to add "]);
		}
	}

    //get all caterory list
	public function get_all_categories()
	{
		$table="Category";
		$selection ="Category_Id,Category_Name";
		$criteria =array("Status"=>"A");
		$cat_data=$this->MAdmin->getAllRecords($table,$selection,$criteria);
		//create array list
		$cat_list[' '] ='Select Category';
		if(!empty($cat_data))
		{
			foreach ($cat_data as $key => $value) {
				$cat_list[$value->Category_Id] =$value->Category_Name;
			}
		}
		
		return $cat_list;
	}

}

?>