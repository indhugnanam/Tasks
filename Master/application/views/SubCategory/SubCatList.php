<section style="margin-top: 5%;"></section>
<section class="col-xs-12 col-sm-10 col-sm-offset-1 content-wrapper">
		<div class="col-sm-5 col-xs-5 my-2">
	        <h4 class="page-title">Sub Category List</h4>
	    </div>
	    <div class="col-sm-7 col-xs-7 text-right my-2">
	        <a href="<?php echo base_url();?>CAdmin/AddSubCategory" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Sub Category</a>
	    </div>
		<div class="table-responsive">
			<table class="table" id="example">
				<thead>
					<tr>
						<th>Id</th>
						<th>Category Name</th>
						<th>Sub Category Name</th>
						<th>Status</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(!empty($sub_cat_list)){foreach ($sub_cat_list as $key => $value) { ?>
						<tr>
							<td><?php echo $value->Sub_Id; ?></td>
							<td><?php echo $value->Category_Name; ?></td>
							<td><?php echo $value->Sub_Name; ?></td>
							<td><?php echo ($value->Status=="A")?"Active":"Inactive"; ?></td>
							<td><a href="<?php echo base_url(); ?>CAdmin/edit_subcategory/<?php echo $value->Sub_Id; ?>"><i class="fa fa-edit"></i></a></td>
						</tr>
					<?php } }?>
				</tbody>
			</table>
		</div>
	</div>
</section>
