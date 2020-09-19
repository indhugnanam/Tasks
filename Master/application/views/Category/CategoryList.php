<section style="margin-top: 5%;"></section>
<section class="col-xs-12 col-sm-10 col-sm-offset-1 content-wrapper">
		<div class="col-sm-5 col-xs-5 my-2">
	        <h4 class="page-title">Category List</h4>
	    </div>
	    <div class="col-sm-7 col-xs-7 text-right my-2">
	        <a href="<?php echo base_url();?>CAdmin/AddCategory" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Category</a>
	    </div>
		<div class="table-responsive">
			<table class="table" id="example">
				<thead>
					<tr>
						<th>Category Name</th>
						<th>Status</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($category_list)){foreach ($category_list as $key => $value) { ?>
						<tr>
							<td><?php echo $value->Category_Name; ?></td>
							<td><?php echo ($value->Status=="A")?"Active":"Inactive"; ?></td>
							<td><a href="<?php echo base_url(); ?>CAdmin/edit_category/<?php echo $value->Category_Id; ?>"><i class="fa fa-edit"></i></a></td>
							<td><a href="<?php echo base_url(); ?>CAdmin/delete_category/<?php echo $value->Category_Id; ?>"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php } }?>
				</tbody>
			</table>
		</div>
	</div>
</section>
