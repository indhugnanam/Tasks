<section style="margin-top: 5%;"></section>
<section class="col-xs-12 col-sm-10 col-sm-offset-1 content-wrapper">
		<div class="col-xs-12 card">
			<div class="col-xs-1">
	            <a href="<?php echo base_url();?>CAdmin/CategoryList"><i class="fa fa-arrow-left"></i></a>
	        </div>
			<h3 class="text-center my-2">Add Sub Category</h3>

			<?php echo form_open('', array('method'=>'post','id'=>"add_subcategory"));?>
				<div class="col-xs-6 col-sm-4 form-group">
					<label>Category</label>
					<?php echo  form_dropdown('Cat_id',$cat_list,'D','class="form-control" id="Cat_id" required="required"'); ?>
				</div>

				<div class="col-xs-6 col-sm-4 form-group">
					<label>Sub Category name</label>	
					<?php echo form_input(['name'=>'subcat_name','id'=>'subcat_name','placeholder'=>'Enter your Sub Category','class'=>'form-control' ,'required'=>'required']);?>
				</div>
				<div class="col-xs-6 col-sm-4 form-group">
					<label>Status</label>
					<label class="mi-switch">
						<input type="checkbox" name="Status" value="A" checked>
						<span class="mi-status-slider mi-round"></span>
					</label>
				</div>
				<div class="col-xs-12 text-center">
					<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>"mi-btn-submit"]);?>
				</div>
			<?php echo form_close();?>
		</div>
</section>




