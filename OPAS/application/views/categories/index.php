<!--=================================
=            Category         =
==================================-->
<section class="section-sm">
	<div class="container">
		<?php if ($search === TRUE): ?>
			<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results For "<?= $this->input->post('search'); ?>"</h2>
					<p> Found <strong style="color: red;"><?php echo $result['count']; ?></strong> Results</p>
				</div>
			</div>
		</div>
		<?php endif ?>
		<div class="row">

			<!-- start Side bar -->
			<?php $this->load->view('./categories/sidebar'); ?>
			<!-- End Side bar -->

			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<strong>Short</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">

						<?php if ($search === TRUE){ 
						foreach ($result['query'] as $search){ ?>
						 					
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="<?php echo site_url('/posts/view/'.$search['p_slug']); ?>">
				<img class="card-img-top img-fluid" src="<?php echo site_url(); ?>assets/images/products/<?php echo $search['p_image']; ?>" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="<?php echo site_url('/posts/view/'.$search['p_slug']); ?>"><?php echo ucwords($search['p_title']); ?></a></h4>

		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="<?php echo site_url('/categories/posts/'.$search['c_id']); ?>"><i class="fa fa-folder-open-o"></i><?php echo ucfirst($search['c_name']); ?></a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-calendar"></i> <?php echo date("F Y", strtotime($search['p_created_at']));?></a>
		    	</li>
		    </ul>
		    <p class="card-text"><?php echo word_limiter(ucfirst($search['p_body']),15); ?></p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div>

					<?php }}else{
						foreach ($posts as $search){ ?>

							<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="<?php echo site_url('/posts/view/'.$search['p_slug']); ?>">
				<img class="card-img-top img-fluid" src="<?php echo site_url(); ?>assets/images/products/<?php echo $search['p_image']; ?>" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="<?php echo site_url('/posts/view/'.$search['p_slug']); ?>"><?php echo ucwords($search['p_title']); ?></a></h4>

		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="<?php echo site_url('/categories/posts/'.$search['c_id']); ?>"><i class="fa fa-folder-open-o"></i><?php echo ucfirst($search['c_name']); ?></a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-calendar"></i> <?php echo date("F Y", strtotime($search['p_created_at']));?></a>
		    	</li>
		    </ul>
		    <p class="card-text"><?php echo word_limiter(ucfirst($search['p_body']),15); ?></p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div>

						<?php }} ?>
				
				<!-- 		<div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">Study Table Combo</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->
						<!-- <div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->
						<!-- <div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->
						<!-- <div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">Study Table Combo</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->
						<!-- <div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->
						<!-- <div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->
						<!-- <div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">Study Table Combo</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->
						<!-- <div class="col-sm-12 col-lg-4 col-md-6"> -->
							<!-- product card -->
<!-- <div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content"> -->
			<!-- <div class="price">$200</div> -->
			<!-- <a href="">
				<img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
						</div> -->


					</div>
				</div>
				<div class="pagination justify-content-center">
					<!-- Pagination -->
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				  	<?php echo $this->pagination->create_links(); ?>
				  </ul>
				</nav>
					<!-- <nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav> -->
				</div>
			</div>
		</div>
	</div>
</section>