<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
<li><a href="change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
<li><a href="#"><i class="fa fa-files-o"></i>Customer Manager</a>
					<ul>
						<li><a href="add-customer.php">Add customer</a></li>
						<li><a href="manage-customer.php">Manage customer</a></li>
					</ul>
								</li>
<?php }?>
			</ul>
		</nav>