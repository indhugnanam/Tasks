<section style="margin-top: 5%;"></section>
<section class="col-xs-12 col-sm-10 col-sm-offset-1 content-wrapper">
		<div class="card col-xs-12">
			<div class="col-xs-1">
	            <a href="<?php echo base_url();?>CAdmin/ProductList"><i class="fa fa-arrow-left"></i></a>
	        </div>
			<h3 class="text-center my-2">Add Product</h3>
			<div class="card-body">
				<?php echo form_open_multipart('',array('name'=>'product','id'=>'product','method'=>'post'));?>
					
					<div class="col-xs-6 col-sm-4 form-group">
						<label>Category</label>
						<?php echo  form_dropdown('Cat_id',$cat_list,'D','class="form-control cat_id" id="Cat_id" required="required"'); ?>
					</div>

					<div class="col-xs-6 col-sm-4 form-group">
						<label>Sub Category</label>
						<?php echo form_dropdown('sub_id',$cat_list,'D','class="form-control sub_id" id="sub_id" required="required"'); ?>
					</div>

					<div class="col-xs-6 col-sm-4 form-group">
						<label>Product name</label>
						<?php echo form_input(['name'=>'prod_name','id'=>'prod_name','placeholder'=>'Enter your Product','class'=>'form-control' ,'required'=>'required']);?>
					</div>
					
					<div class="col-xs-6 col-sm-4 form-group">
						<label>Price</label>
						<?php echo form_input(['name'=>'price','id'=>'price','placeholder'=>'Enter your Product','class'=>'form-control' ,'required'=>'required']);?>
					</div>
					<div class="col-xs-6 col-sm-4 form-group">
						<label>Image</label>
						<input type='file' name='userfile' size='20' />
					</div>
					<div class="col-xs-6 col-sm-4 form-group">
						<label>Status</label>
						<label class="mi-switch">
							<input type="checkbox" name="Status" value="A" checked>
							<span class="mi-status-slider mi-round"></span>
						</label>
					</div>
					<div class="col-xs-12 text-center">
						<?php echo form_submit(['name'=>'submit','value'=>'Add Products','class'=>"mi-btn-submit"]);?>
					</div>
				<?php echo form_close();?>
			</div>
		</div>	
	</div>
</section>


