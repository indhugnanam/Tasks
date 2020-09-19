    <div class="col-xs-12">
        <a class="float-right my-3 pr-4" href="<?php echo base_url(); ?>CCart/Logout"><i class="fa fa-logout">Logout</i>
        </a>
    </div>

    <section style="padding-top: 5%;"></section>

    <!-- Prodcuts-Area -->
        <section class="col-xs-12 section-padding">
            <div class="col-xs-12 categoryproduct-data">
               
                    <div class="col-xs-12">
                        <!-- <h4 class="heading-category"><?php echo $category->Category_Name; ?></h4> -->
                        <?php if(!empty($sub_cat)){ foreach ($sub_cat as $sub) { ?>
                        <h4 class="heading-category"><?php echo $sub->Sub_Name; ?></h4>
                            <?php foreach ($prod_category as $prod) { if($sub->Sub_Id==$sub->Sub_Id){ ?>
                                <div class="my-3 col-xs-6 col-sm-4 col-md-3 cursor-pointer productlist product_category">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="item-info-product">
                                            <h4 class="text-center my-2"><?php echo $prod->Product_Name; ?></h4>
                                        </div
                                    ></div>

                                    <div class="product-image-thumb-item text-center">
                                        <img src="<?php echo base_url();?>uploads/<?php echo $prod->Image; ?>" alt="">
                                    </div>
                                </div>
                          <?php } } ?>

                        <?php } } ?>
                    </div>
            </div>
        </section>
    <!--/ Prodcuts-Area -->

    </body>
</html>
