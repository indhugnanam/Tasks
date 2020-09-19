<section style="height:15%"></section>
<section class="col-xs-12 mt-4">

	<?php if($this->session->userdata('User_Role')=='A'){?>

		<a class="col-xs-6 col-sm-4 col-md-3" href="<?php echo base_url();?>CAdmin/CategoryList">
			<div class="mi-dash-widget">
				<span class="mi-dash-widget-bg" style="background:#009efb;"><i class="fa fa-user" aria-hidden="true"></i></span>
				<div class="mi-dash-widget-info text-right">
					<h3 class="mb-3"><?php echo count($category_list); ?></h3>
					<span class="mi-widget-title" style="background:#009efb;">Category User <i class="fa fa-check" aria-hidden="true"></i></span>
				</div>
			</div>
		</a>

		<a class="col-xs-6 col-sm-4 col-md-3" href="<?php echo base_url();?>CAdmin/SubCategoryList">
			<div class="mi-dash-widget">
				<span class="mi-dash-widget-bg" style="background:#009efb;"><i class="fa fa-th-list" aria-hidden="true"></i></span>
				<div class="mi-dash-widget-info text-right">
				<h3 class="mb-3"><?php echo count($sub_cat); ?></h3>
					<span class="mi-widget-title" style="background:#009efb;">Sub Category <i class="fa fa-check" aria-hidden="true"></i></span>
				</div>
			</div>
		</a>

		<a class="col-xs-6 col-sm-4 col-md-3" href="<?php echo base_url();?>CAdmin/ProductList">
			<div class="mi-dash-widget">
				<span class="mi-dash-widget-bg" style="background:#009efb;"><i class="fa fa-list" aria-hidden="true"></i></span>
				<div class="mi-dash-widget-info text-right">
				<h3 class="mb-3"><?php echo count($prod_category); ?></h3>
					<span class="mi-widget-title" style="background:#009efb;">Products <i class="fa fa-check" aria-hidden="true"></i></span>
				</div>
			</div>
		</a>
	<?php } ?>
</section>
