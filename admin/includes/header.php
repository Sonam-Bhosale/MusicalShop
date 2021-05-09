<?php
session_start();
include"includes/config.php";
?>
<div class="navbar navbar-inverse set-radius-zero" style="color:black">
        <div class="container"style="background-color:orange">
            <div class="navbar">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"style="color:black">
					<h1><a href="index.php">Anusadhan </a>Musical Instrument Store...........</h1>
                  
                </a>

            </div>

            <div class="right-div">
                Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! ||<a href="logout.php" >Logout</a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">Dashboard</a></li>
                           
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Categories <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add_category.php">Add Category</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_category.php">Manage Categories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Sub Categories <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add_subcategory.php">Add Sub Categories</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_subcategory.php">Manage Sub Categories</a></li>
                                </ul>
                            </li>
 <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Products <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add_product.php">Add Products</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_product.php">Manage Products</a></li>
									  <li role="presentation"><a role="menuitem" tabindex="-1" href="category_product.php">Category Wise Product</a></li>
									   <li role="presentation"><a role="menuitem" tabindex="-1" href="subcategory_product.php">SubCategory Wise Product</a></li>
                                </ul>
                            </li>

							<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Feedback<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_feedback.php">Manage Feedback</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Supplier<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="add_supplier.php">Add New Supplier</a></li>
									  <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_supplier.php">Manage Supplier</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Users<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="register_users.php">Registered User</a></li>
									  <li role="presentation"><a role="menuitem" tabindex="-1" href="login_user.php">Login User</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Orders<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="todays.php">Todays Orders</a></li>
									 <li role="presentation"><a role="menuitem" tabindex="-1" href="confirmed.php">Confirmed Order</a></li>
									  <li role="presentation"><a role="menuitem" tabindex="-1" href="pending.php">Pending Order</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="delivered.php">Delivered Order</a></li>
									  
                                </ul>
                            </li>
                             <li>
							  <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Reports<i class="fa fa-angle-down"></i></a>
							 <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">					
									 <li role="presentation"><a role="menuitem" tabindex="-1" href="productreport.php">Product</a></li>
									  <li role="presentation"><a role="menuitem" tabindex="-1" href="orderreport.php">Order</a></li>
									  <li role="presentation"><a role="menuitem" tabindex="-1" href="usersreport.php">User</a></li>
							</li>
                            </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>