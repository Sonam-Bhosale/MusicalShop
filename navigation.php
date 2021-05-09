<!-- Main Navigation Start-->            
        <nav id="nav">
            <div id="menu">
                <h3 class="menuarrow"><span>Menu</span></h3>
                <ul>
					<li><a href="Home.php">Home</a></li>
					
				<?php
				 
					include("config.php");
			
					$main_menu_query = "select * from tblcat";
					$main_menu_result = mysqli_query($conn,$main_menu_query);

						while($r = mysqli_fetch_array($main_menu_result))
						{
	
				?>
				 <li><a href="<?php echo $r['cat_link'];?>" id="<?php echo $r['cat_id'];?>" ><?php echo $r['cat_name'];?></a>
				 <div>
				 <ul>
				<?php
			
				 $sub_menu_query = "select * from tblsubcat where cat_id=".$r['cat_id'];
				 $sub_menu_result = mysqli_query($conn,$sub_menu_query);
				 while($r1 = mysqli_fetch_array($sub_menu_result))
				 {
					 
				?>
				  <li><a href="<?php echo $r1['sub_link'];?>?Items=<?php echo $r1['0'];?>&Subname=<?php echo $r1['2'];?>&MenuCat=<?php echo $r1['1'];?>"><?php echo $r1['subcat_name'];?></a></li>
				 <?php 
				 } 
				?>
				 </ul>
				 </div>
				 </li>
				<?php
				}
				?>
				<li><a href="about.php">About Us</a></li>
				
				<li><a href="contact.php">Contact</a></li>
				<!--<li><a href="#">My Account</a>
				<div id="menu">
				 <ul>
					<li><a href="updateuser.php">Update</a></li>
					<li><a href="changepassword.php">Change Password</a></li>
					<li><a href="wishlist.php">Wish List</a></li>
				</ul>
				</div>
				</li>-->
				</ul>
            </div>
        </nav>
       