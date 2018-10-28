<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section" style="background-image: url('<?php echo base_url(); ?>assets/images/navigation/10.jpg');">
	<div class="container">
		<div class="row">
			
			<!-- USER SIDEBAR -->
			<?php $this->load->view('./users/dashboard_user_sidebar'); ?>
			<!-- END USER SIDEBAR -->
			
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Edit Personal Information</h3>
					<?php echo validation_errors(); ?>
					<?php echo form_open('users/update_profile'); ?>
					<input type="hidden" name="form_number" value="1">

						<!-- First Name -->
						<div class="form-group">
						    <label for="first-name">Full Name</label>
						    <input type="text" name="name" class="form-control" id="first-name" value="<?php echo($user[0]['u_name']); ?>">
						</div>
						<!-- Last Name -->
						<!-- <div class="form-group">
						    <label for="last-name">Last Name</label>
						    <input type="text" class="form-control" id="last-name">
						</div> -->
						<!-- File chooser -->
						<!-- <div class="form-group choose-file">
							<i class="fa fa-user text-center"></i>
						    <input type="file" name="userfile" size="20" class="form-control-file d-inline" id="input-file">
						 </div> -->

						<!-- Comunity Name -->
						<div class="form-group">
						    <label for="comunity-name">Comunity Name</label>
						    <input type="text" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" readonly>
						</div>

						<!-- Checkbox -->
						<!-- <div class="form-check">
						  <label class="form-check-label" for="hide-profile">
						    <input class="form-check-input" type="checkbox" value="" id="hide-profile">
						    Hide Profile from Public/Comunity
						  </label>
						</div> -->

						<!-- Zip Code -->
						<div class="form-group">
						    <label for="zip-code">Zip Code</label>
						    <input type="text" name="zipcode" value="<?php echo($user[0]['u_zipcode']); ?>" class="form-control" id="zip-code">
						</div>
						<!-- Submit button -->
						<button type="submit" class="btn btn-transparent">Save My Changes</button>
					</form>
				</div>

				<!-- Change Password -->
				<div class="widget change-password">
					<h3 class="widget-header user">Edit Password</h3>
					<?php echo form_open('users/update_profile'); ?>
					<input type="hidden" name="form_number" value="2">

						<!-- Current Password -->
						<div class="form-group">
						    <label for="current-password">Current Password</label>
						    <input type="password" name="current_password" class="form-control" id="current_password">
						</div>
						<!-- New Password -->
						<div class="form-group">
						    <label for="new-password">New Password</label>
						    <input type="password" name="new_password" class="form-control" id="new_password">
						</div>
						<!-- Confirm New Password -->
						<div class="form-group">
						    <label for="confirm-password">Confirm New Password</label>
						    <input type="password" name="confirm_password" class="form-control" id="confirm_password">
						</div>
						<!-- Submit Button -->
						<button type="submit" class="btn btn-transparent">Change Password</button>
					</form>
				</div>

				<!-- Change Email Address -->
				<div class="widget change-email mb-0">
					<h3 class="widget-header user">Edit Email Address</h3>
					<?php echo form_open('users/update_profile'); ?>
					<input type="hidden" name="form_number" value="3">

						<!-- Current Password -->
						<div class="form-group">
						    <label for="current-email">Current Email</label>
						    <input type="email" name="current_email" class="form-control" id="current_email">
						</div>
						<!-- New email -->
						<div class="form-group">
						    <label for="new-email">New email</label>
						    <input type="email" name="new_email" class="form-control" id="new_email">
						</div>
						<!-- Submit Button -->
						<button type="submit" class="btn btn-transparent">Change email</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>