<!--==================================
=            user dashboard            =
===================================-->
<section class="dashboard section" style="background-image: url('<?php echo base_url(); ?>assets/images/navigation/10.jpg');">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">

			<!-- USER SIDEBAR -->
			<?php $this->load->view('./users/dashboard_user_sidebar'); ?>
			<!-- END USER SIDEBAR -->
			
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">My Ads</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Title</th>
								<th class="text-center">Category</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($user_ads as $ad): ?>
							
							<tr>	
								<td class="product-thumb">
									<img width="80px" height="auto" src="<?php echo site_url(); ?>assets/images/products/<?php echo $ad['p_image']; ?>" alt="image description">
								</td>
								<td class="product-details">
									<h3 class="title"><?php echo ucwords($ad['p_title']); ?></h3>

									<span class="add-id"><strong>Ad ID:</strong><?php echo $ad['p_id']; ?></span>

									<span><strong>Posted on: </strong><time><?php echo date("jS \of F Y", strtotime($ad['p_created_at']));?></time> </span>

									<?php if ($ad['p_status'] === '1') { ?>
										<span class="status active"><strong>Status</strong>Active</span>

									<?php } elseif ($ad['p_status'] === '0') { ?>
										<span class="status active"><strong>Status</strong>Rejected</span>

									<?php } else { ?>
										<span class="status active"><strong>Status</strong>Pending</span>
									<?php } ?>

									<span class="location"><strong>Location</strong><?php echo ucwords($ad['p_location']); ?></span>

								</td>
								<td class="product-category"><span class="categories"><?php echo ucwords($ad['c_name']); ?></span></td>
								
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="view" href="<?php echo site_url('/posts/view/'.$ad['p_slug']); ?>">
													<i class="fa fa-eye"></i>
												</a>		
											</li>
											<li class="list-inline-item">
												<a class="edit" href="<?php echo site_url('/posts/edit/'.$ad['p_slug']); ?>">
													<i class="fa fa-pencil"></i>
												</a>		
											</li>
											<li class="list-inline-item">
												<a class="delete" href="<?php echo site_url('/posts/delete/'.$ad['p_id']); ?>">
													<i class="fa fa-trash"></i>
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>

							<?php endforeach; ?>
							
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>
