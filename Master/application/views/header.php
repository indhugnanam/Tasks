<html class="no-js" lang="zxx">

    <head>

        <meta charset="utf-8">
        <meta name="author" content="John Doe">
        <meta name="description" content="">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Master</title>
        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/formvalidation/formValidation.min.css">
        <link href="<?php echo base_url();?>assets/css/toastr.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
       
        <script src="<?php echo  base_url(); ?>assets/js/jquery.min.js"></script>

    </head>


   <body data-spy="scroll" data-target=".mainmenu-area">
  
 <nav class="navbar mainmenu-area" data-spy="affix" data-offset-top="197"  style="background:#20B7E6; ">
        <div class="container">
            <div class="row">
                <div class="col-xs-">
                    <div id="search-box" class="collapse">
                        <form action="#">
                            <input type="search" class="form-control" placeholder="What do you want to know?">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="navbar-header smoth">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                        </button>
                        <a href=""><h1 class="logo_agile mt-2" style="font-size:25px;">Master</h1></a>
                    </div>
            
                    <div class="collapse navbar-collapse navbar-right" id="mainmenu">

                        <ul class="nav navbar-nav text-center primary-menu" style="float: none;">
                               
                                <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false" href="#">Category</a>
                                   <ul class="dropdown-menu">
                                        <li class=""><a class="ropdown-item" href="<?php echo base_url();?>CAdmin/CategoryList">List Category</a></li>
                                        <li class=""><a class="ropdown-item" href="<?php echo base_url();?>CAdmin/AddCategory">Add Category</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false" href="#">Sub Category</a>
                                   <ul class="dropdown-menu">
                                        <li class=""><a class="ropdown-item" href="<?php echo base_url();?>CAdmin/SubCategoryList">List Sub Category</a></li>
                                        <li class=""><a class="ropdown-item" href="<?php echo base_url();?>CAdmin/AddSubCategory">Add Sub Category</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false" href="#">Products</a>
                                   <ul class="dropdown-menu">
                                        <li class=""><a class="ropdown-item" href="<?php echo base_url();?>CAdmin/ProductList">List Products</a></li>
                                        <li class=""><a class="ropdown-item" href="<?php echo base_url();?>CAdmin/AddProduct">Add Products</a></li>
                                    </ul>
                                </li>

                            <li class="nav-item">
                              <a class="nav-link" href="<?php echo base_url();?>CCart/Logout">Logout</a>
                            </li>
                        </ul>
                
                </div>
            </div>
        </div>
        </div>
    </nav>
