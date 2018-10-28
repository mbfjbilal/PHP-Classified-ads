
<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							<img src="<?php echo site_url(); ?>assets/images/user/<?php echo $user[0]['u_image']; ?>" alt="" class="rounded-circle">
						</div>
						<!-- File chooser -->
						<?php echo form_open_multipart('users/update_image'); ?>
						<div class="widget user-dashboard-profile choose-file input-group">
							
							<button type="submit" class="btn-transparent rounded-circle pull-left inline"><i class="fa fa-save text-center"></i></button>	
							<input type="file" name="userfile" size="20" class="form-control-file d-inline">
									    
						 </div>
						<?php echo form_close(); ?>
						<!-- User Name -->
						<h5 class="text-center"><?php echo ucfirst($user[0]['u_name']); ?></h5>
						<p>Joined <?php echo date("jS \of F Y", strtotime($user[0]['u_register_date']));?></p>
						<a href="<?php echo site_url('users/edit_profile') ?>" class="btn btn-main-sm">Edit Profile</a>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li class="active" ><a href="<?php echo site_url('users/dashboard') ?>"><i class="fa fa-user"></i> My Ads</a></li>

							<li><a href="<?php echo site_url('users/favourite_ads') ?>"><i class="fa fa-bookmark-o"></i> Favourite Ads <span>5</span></a></li>

							<li><a href="<?php echo site_url('users/archived_ads') ?>"><i class="fa fa-file-archive-o"></i>Archived Ads <span>12</span></a></li>

							<li><a href="<?php echo site_url('users/pending_ads') ?>"><i class="fa fa-bolt"></i> Pending Approval<span><?php echo $ads_count['pending_count']; ?></span></a></li>

							<li><a href="<?php echo site_url("users/logout"); ?>"><i class="fa fa-cog"></i> Logout</a></li>

							<li><a href="<?php echo site_url('users/delete_account') ?>"><i class="fa fa-power-off"></i>Delete Account</a></li>
						</ul>
					</div>
				</div>
			</div>