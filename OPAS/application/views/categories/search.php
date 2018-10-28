<!--=================================
=           Search Category         =
==================================-->
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<?php echo validation_errors(); ?>
					<?php echo form_open('pages/search'); ?>
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="search" placeholder="What are you looking for" required="">
							</div>

							<!-- <div class="form-group col-md-3">
								<input type="text" class="form-control" name="" placeholder="Location" required="">
							</div> -->

							<!-- <div class="form-group col-md-3">
								<input type="text" class="form-control" name="" placeholder="Category" required="">
							</div> -->
							<select name="category_id">
								<?php foreach ($categories as $category) { ?>
									<option class="dropdown-menu dropdown-menu-right" value="<?php echo $category['c_id']; ?>"><?php echo ucfirst($category['c_name']); ?></option>
								<?php	} ?>
							</select>

							

							<div class="form-group col-md-2">
								
								<button type="submit" class="btn btn-primary">Search Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>