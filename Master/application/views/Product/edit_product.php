<section style="margin-top: 5%;"></section>
<section class="col-xs-12 col-sm-10 col-sm-offset-1 content-wrapper">
		<div class=" col-xs-12 card">
			<div class="col-xs-1">
	            <a href="<?php echo base_url();?>CAdmin/ProductList"><i class="fa fa-arrow-left"></i></a>
	        </div>
	        
			<h3 class="text-center my-3">Update Product</h3>
			<?php echo form_open_multipart('',array('name'=>'product','id'=>'edit_prod','method'=>'post'));?>
	        
			<?php echo form_input(['name'=>'prod_id','id'=>'prod_id','placeholder'=>'Enter your Product','class'=>'d-none' ,'required'=>'required','value'=>$prod_data->Product_Id]);?>
			
			<div class="col-xs-6 col-sm-4 form-group">
				<label>Category</label>
					<?php echo form_dropdown('editCat_id',$cat_list,'D','class="form-control cat_id" id="editCat_id"'); ?>
			</div>
			<div class="col-xs-6 col-sm-4 form-group">
				<label>SubCategory</label>
					<?php echo  form_dropdown('editsub_id',$product_data->Sub_Name,'D','class="form-control sub_id" id="editsub_id"'); ?>
			</div>
			<div class="col-xs-6 col-sm-4 form-group">
				<label>Product name</label>
				<?php echo form_input(['name'=>'prod_name','id'=>'prod_name','placeholder'=>'Enter your Product','class'=>'form-control' ,'required'=>'required','value'=>$prod_data->Product_Name]);?>
			</div>
			<div class="col-xs-6 col-sm-4 form-group">
				<label>Price</label>
				<?php echo form_input(['name'=>'price','id'=>'price','placeholder'=>'Enter your Product','class'=>'form-control' ,'required'=>'required','value'=>$prod_data->Price]);?>
			</div>
			<div class="col-xs-6 col-sm-4 form-group">
				<label>Image</label>
				<input type='file' name='userfile' size='20' /><?php echo $prod_data->Image;?>
			</div>
			
			<div class="col-xs-6 col-sm-4 form-group">
				<label>Status</label>
				<label class="mi-switch">
					<?php echo form_checkbox(array('name' => 'Status', 'value'=>"A",'class'=>'','checked'=>($prod_data->Status =='A')?"checked":""));?>
					<span class="mi-status-slider mi-round"></span>
				</label>
			</div>
			<div class="col-xs-12 text-center">
				<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>"mi-btn-submit"]);?>
			</div>
			<?php echo form_close();?>
		</div>
    </div>
</section>

<script type="text/javascript">
	$('#editCat_id').val('<?php echo $product_data->Category_Id; ?>');
</script>