<section style="margin-top: 5%;"></section>
<section class="col-xs-12 col-sm-10 col-sm-offset-1 content-wrapper">
		<div class="col-xs-12 card">
			<div class="col-xs-1">
	            <a href="<?php echo base_url();?>CAdmin/CategoryList"><i class="fa fa-arrow-left"></i></a>
	        </div>
			<h3 class="text-center my-2">Update Category</h3>

			<?php echo form_open('', array('method'=>'post','id'=>'edit_categoryfrm'));?>

				<?php echo form_input(['name'=>'cat_id','id'=>'cat_id','class'=>'form-control d-none' ,'value'=>$cat_data->Category_Id,'required'=>'required']);?>
				<div class="col-xs-6 col-sm-4 form-group ">
					<label>Category name</label>
					<?php echo form_input(['name'=>'cat_name','id'=>'cat_name','placeholder'=>'Enter your Category','class'=>'form-control' ,'value'=>$cat_data->Category_Name,'required'=>'required']);?>
				</div>
				<div class="col-xs-4 col-sm-4 form-group">
					<label>Status</label>
					<label class="mi-switch">
						<?php echo form_checkbox(array('name' => 'Status', 'value'=>"A",'class'=>'','checked'=>($cat_data->Status =='A')?"checked":""));?>
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