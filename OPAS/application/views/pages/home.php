<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Near You </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="<?php echo base_url(); ?>categories"><i class="fa fa-bed"></i> Hotel</a></li>
							<li class="list-inline-item">
								<a href="<?php echo base_url(); ?>categories"><i class="fa fa-grav"></i> Fitness</a>
							</li>
							<li class="list-inline-item">
								<a href="<?php echo base_url(); ?>categories"><i class="fa fa-car"></i> Cars</a>
							</li>
							<li class="list-inline-item">
								<a href="<?php echo base_url(); ?>categories"><i class="fa fa-cutlery"></i> Restaurants</a>
							</li>
							<li class="list-inline-item">
								<a href="<?php echo base_url(); ?>categories"><i class="fa fa-coffee"></i> Cafe</a>
							</li>
						</ul>
					</div>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search" style="background-image: url('<?php echo base_url(); ?>assets/images/navigation/10.jpg');">
					<?php echo validation_errors(); ?>
					<?php echo form_open('pages/search'); ?>
						<div class="row">
							<!-- Store Search -->
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<!-- <input type="text" name="category" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Category"> -->
									<select name="category_id">
										<?php foreach ($categories as $category) { ?>
											<option class="dropdown-menu dropdown-menu-right" value="<?php echo $category['c_id']; ?>"><?php echo ucfirst($category['c_name']); ?></option>
									<?php	} ?>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="search" placeholder="Search for store" required="">
									<!-- Search Button -->
									<button type="submit" class="btn btn-main">SEARCH</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray" style="background-image: url('<?php echo base_url(); ?>assets/images/navigation/10.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Trending Ads</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<?php $i=0; ?>
			<?php foreach ($posts as $post) { 
				if ($i == 3) {
					break;
				}
				$i++;
			?>
				
			<div class="col-sm-12 col-lg-4">
				<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="<?php echo site_url('/posts/view/'.$post['p_slug']); ?>">
				<img class="card-img-top img-fluid" src="<?php echo base_url(); ?>assets/images/products/<?php echo $post['p_image']; ?>" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="<?php echo site_url('/posts/view/'.$post['p_slug']); ?>"><?php echo ucwords($post['p_title']); ?></a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="<?php echo site_url('/categories/posts/'.$post['c_id']); ?>"><i class="fa fa-folder-open-o"></i><?php echo ucfirst($post['c_name']); ?></a>
		    	</li>
		    	<li class="list-inline-item">
		    		<!-- <a href="#"> -->
		    			<i class="fa fa-calendar"></i> <?php echo date("F Y", strtotime($post['p_created_at']));?>
		    		<!-- </a> -->
		    	</li>
		    </ul>
		    <p class="card-text"><?php echo word_limiter(ucfirst($post['p_body']),15); ?></p>
		    <!-- <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div> -->
		</div>
	</div>
</div>
			</div>
		<?php } ?>
	
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Categories</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
				</div>
				<div class="row">
					<!-- Category list -->
					<!-- <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-laptop icon-bg-1"></i> 
								<h4>Electronics</h4>
							</div>
							<ul class="category-list" >
								<?php// foreach ($categories as $category): ?>
									<li><a href="<?php //echo site_url('/categories/posts/'.$category['c_id']); ?>"><?php //echo $category['c_name']; ?> <span>93</span></a></li>
								<?php //endforeach; ?>
								
								<li><a href="category.html">Iphone <span>233</span></a></li>
								<li><a href="category.html">Microsoft  <span>183</span></a></li>
								<li><a href="category.html">Monitors <span>343</span></a></li>
							</ul>
						</div>
					</div>  --><!-- /Category List -->
					<!-- Category list -->
					<?php foreach ($main_categories as $main_category): ?>
							<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-bars icon-bg-<?php echo(rand(1,8)); ?>"></i> 
								<h4><?php echo ucwords($main_category['m_c_name']); ?></h4>
							</div>
							<ul class="category-list" >

								<?php foreach ($main_category['categories'] as $category): ?>
								<li><a href="<?php echo site_url('/categories/posts/'.$category['c_id']) ?>"><?php echo ucfirst($category['c_name']); ?> <span><?php print_r( $count_ads); ?></span></a></li>
								<?php endforeach; ?>
								
								<!-- <li><a href="category.html">Fast food <span>23</span></a></li>
								<li><a href="category.html">Restaurants  <span>13</span></a></li>
								<li><a href="category.html">Food Track<span>43</span></a></li> -->
							</ul>
						</div>
					</div> <!-- /Category List -->
					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
