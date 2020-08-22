<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
                     <li><a href="change-password.php"><i class="fa fa-gear"></i>Change Password</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i>Customer Manager</a>
					<ul>
						<li><a href="add-customer.php">Add customer</a></li>
						<li><a href="manage-customer.php">Manage customer</a></li>
					</ul>
				</li>

			<li><a href="#"><i class="fa fa-print"></i>Loan Manager</a>
				<ul>
						<li><a href="loan-lending.php">Loan Application</a></li>
						<li><a href="manage-loan.php">Manage Application</a></li>
						<li><a href="processing_file.php">Processing File </a></li>
						<li><a href="manage-file.php">Manage file</a></li>
					</ul></li>
					<li><a href="#"><i class="fa fa-print"></i>Calling</a>
					<ul>
						<li><a href="harpal.php">dashboard</a></li>
						<li><a href="added-customer.php">added no</a></li>
						<li><a href="processing_file.php">called-list</a></li>
						
					</ul>
					</li>
				<?php }?>
			</ul>
		</nav>