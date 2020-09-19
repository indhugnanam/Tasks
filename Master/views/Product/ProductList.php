<section style="margin-top: 5%;"></section>
<section class="container">
	<div class="col-xs-12 content-wrapper">
		<div class="col-sm-5 col-xs-5 my-2">
	        <h4 class="page-title">Product List</h4>
	    </div>
	    <div class="col-sm-7 col-xs-7 text-right my-2">
	        <a href="<?php echo base_url();?>CAdmin/AddProduct" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Product</a>
	    </div>
		
		<div class="table-responsive">
			<table class="table" id="example">
				<thead>
					<tr>
						<th>Category Name</th>
						<th>Sub Name</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Status</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($prod_list as $key => $value) { ?>
						<tr>
							<td><?php echo $value->Category_Name; ?></td>
							<td><?php echo $value->Sub_Name; ?></td>
							<td><?php echo $value->Product_Name; ?></td>
							<td><?php echo $value->Price; ?></td>	
							<td><?php echo ($value->Status=="A")?"Active":"Inactive"; ?></td>
							<td><a href="<?php echo base_url(); ?>CAdmin/edit_product/<?php echo $value->Product_Id ?>"><i class="fa fa-edit"></i></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

