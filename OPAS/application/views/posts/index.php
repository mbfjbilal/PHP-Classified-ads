<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<!-- <h3>Blog Page</h3> -->
				<h3><?= $title ?></h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!--==================================
=            Blog Section            =
===================================-->

<section class="blog section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">


				<?php 	foreach ($posts as $post) { ?>
					
				
				<!-- Article 01 -->
				<article>
	<!-- Post Image -->
	<div class="image">
		<img src="<?php echo site_url(); ?>assets/images/products/<?php echo $post['p_image']; ?>" alt="article-01">
	</div>
	<!-- Post Title -->
	<h3><?php echo $post['p_title'] ;?></h3>

	<ul class="list-inline">
		<li class="list-inline-item">by <a href="">Admin</a></li>
		<li class="list-inline-item"><?php echo date("l jS \of F Y", strtotime($post['p_created_at']));?></li>
		<li class="list-inline-item">in <a href=""><?php echo $post['c_name'];?></a></li>
	</ul>
	<!-- Post Description -->
	<p class=""><?php echo word_limiter($post['p_body'],60) ;?></p>
	<!-- Read more button -->
	<a href="<?php echo site_url('/posts/view/'.$post['p_slug']) ;?>" class="btn btn-transparent">Read More</a>
</article>

			<?php	}	 ?>
				<!-- Pagination -->
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				  	<?php echo $this->pagination->create_links(); ?>
				   <!--  <li class="page-item active"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Next">
				        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
				        <span class="sr-only">Next</span>
				      </a>
				    </li> -->
				  </ul>
				</nav>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- Search Widget -->
					<div class="widget search p-0">
						<div class="input-group">
						    <input type="text" class="form-control" id="expire" placeholder="Search...">
						    <span class="input-group-addon"><i class="fa fa-search"></i></span>
					    </div>
					</div>
					<!-- Category Widget -->
					<div class="widget category">
						<!-- Widget Header -->
						<h5 class="widget-header">Categories</h5>
						<ul class="category-list">
							<li><a href="">Appearel <span class="float-right">(2)</span></a></li>
							<li><a href="">Accesories <span class="float-right">(5)</span></a></li>
							<li><a href="">Business<span class="float-right">(7)</span></a></li>
							<li><a href="">Entertaiment<span class="float-right">(3)</span></a></li>
							<li><a href="">Education<span class="float-right">(9)</span></a></li>
						</ul>
					</div>
					<!-- Store Widget -->
					<div class="widget related-store">
						<!-- Widget Header -->
						<h5 class="widget-header">Related Store</h5>
						<ul class="store-list md list-inline">
							<li class="list-inline-item">
								<a href=""><img src="images/popular-offer/populer-offer-02.png" alt="store-image"></a>
							</li>
							<li class="list-inline-item">
								<a href=""><img src="images/popular-offer/populer-offer-03.png" alt="store-image"></a>
							</li>
							<li class="list-inline-item">
								<a href=""><img src="images/popular-offer/populer-offer-04.png" alt="store-image"></a>
							</li>
							<li class="list-inline-item">
								<a href=""><img src="images/popular-offer/populer-offer-05.png" alt="store-image"></a>
							</li>
							<li class="list-inline-item">
								<a href=""><img src="images/popular-offer/populer-offer-06.png" alt="store-image"></a>
							</li>
							<li class="list-inline-item">
								<a href=""><img src="images/popular-offer/populer-offer-07.png" alt="store-image"></a>
							</li>
						</ul>
					</div>
					<!-- Archive Widget -->
					<div class="widget archive">
						<!-- Widget Header -->
						<h5 class="widget-header">Archives</h5>
						<ul class="archive-list">
							<li><a href="">January 2017</a></li>
							<li><a href="">February 2017</a></li>
							<li><a href="">March 2017</a></li>
							<li><a href="">April 2017</a></li>
							<li><a href="">May 2017</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>