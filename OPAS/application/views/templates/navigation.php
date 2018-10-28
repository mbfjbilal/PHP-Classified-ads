<!--===============================
=            Navigation Area      =
================================-->


<section style="background-image: url('<?php echo base_url(); ?>assets/images/navigation/10.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg  navigation">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">
						<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="main logo">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
							</li>

							<?php if ($this->session->userdata('logged_in')): ?>
								<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>users/dashboard">Dashboard</a>
							</li>
							<?php endif; ?>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="<?php echo base_url(); ?>posts">Latest Ads</a>
									<a class="dropdown-item" href="<?php echo base_url(); ?>categories">Category</a>

									<!-- <a class="dropdown-item" href="<?php //echo base_url(); ?>users/dashboard">Dashboard</a> -->
									<!-- <a class="dropdown-item" href="single.html">Single Page</a>
									<a class="dropdown-item" href="store-single.html">Store Single</a>
									
									<a class="dropdown-item" href="user-profile.html">User Profile</a>
									<a class="dropdown-item" href="submit-coupon.html">Submit Coupon</a>
									<a class="dropdown-item" href="blog.html">Blog</a>
									<a class="dropdown-item" href="single-blog.html">Single Post</a> -->
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<?php if (!$this->session->userdata('logged_in')): ?>
								<li class="nav-item">
								<a class="nav-link login-button" href="<?php echo site_url("/users/login"); ?>">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link add-button" href="<?php echo site_url("/users/register"); ?>"><i class="fa fa-plus-circle"></i> Register</a>
							</li>
							<?php endif; ?>

							<?php if ($this->session->userdata('logged_in')): ?>
							<li class="nav-item">
								<a class="nav-link login-button" href="<?php echo site_url("/users/logout"); ?>">Logout</a>
							</li>
							<li class="nav-item">
								<a class="nav-link add-button" href="<?php echo site_url("/posts/create"); ?>"><i class="fa fa-plus-circle"></i> Submit an Ad</a>
							</li>
							<li class="nav-item">
								<a class="nav-link add-button" href="<?php echo site_url("/categories/create"); ?>"><i class="fa fa-plus-circle"></i> Add Category</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
	<!-- Flash Message -->
	<?php if ($this->session->flashdata('user_registered')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('user_registered').'</p>';
	} ?>

	<?php if ($this->session->flashdata('post_created')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('post_created').'</p>';
	} ?>

	<?php if ($this->session->flashdata('post_updated')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('post_updated').'</p>';
	} ?>

	<?php if ($this->session->flashdata('category_created')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('category_created').'</p>';
	} ?>

	<?php if ($this->session->flashdata('post_deleted')) {
		 echo '<p class="text-center alert alert-success">'.$this->session->flashdata('post_deleted').'</p>';
	 } ?>

	<?php if ($this->session->flashdata('user_loggedin')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';
	} ?>

	<?php if ($this->session->flashdata('user_loggedout')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>';
	} ?>

	<?php if ($this->session->flashdata('category_deleted')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('category_deleted').'</p>';
	} ?>

	<?php if ($this->session->flashdata('user_update')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('user_update').'</p>';
	} ?>

	<?php if ($this->session->flashdata('user_image_updated')) {
		echo '<p class="text-center alert alert-success">'.$this->session->flashdata('user_image_updated').'</p>';
	} ?>

	<?php if ($this->session->flashdata('login_failed')) {
		echo '<p class="text-center alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';
	} ?>