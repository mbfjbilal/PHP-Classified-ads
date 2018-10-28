
<!--=================================
=           Create Cstegory         =
==================================-->

<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				
				<h3><?= $title ?></h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="user-profile section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-1 col-lg-6 offset-lg-0">
        <!-- Category form -->
        <div class="widget personal-info">
           <?php echo validation_errors(); ?>
         <?php echo form_open_multipart('categories/create'); ?>
            <h4 class="alert alert-success">Create Sub-Category</h4>
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input  name="name" placeholder="Add Category Name" class="form-control"  type="text">
            </div>

            <!-- Category belongs to -->
            <div class="form-group">
                <label for="Category">Category Belongs To</label><br>
                <select name="main_category_id" class="form-control selectpicker" >
                  <?php foreach ($main_categories as $main_category) { ?>
                    <option value="<?php echo($main_category['m_c_id']); ?>"><?php echo(ucfirst($main_category['m_c_name'])); ?></option>
                  <?php } ?>
              </select>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-transparent">Save</button>
          </form>
        </div>
      </div>


      <!-- Main Category form -->
      <div class="col-md-8 offset-md-1 col-lg-6 offset-lg-0">
        <div class="widget personal-info">
           <?php echo validation_errors(); ?>
         <?php echo form_open_multipart('categories/create_main'); ?>
         <h4 class="alert alert-success">Create Main-Category</h4>
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input  name="name" placeholder="Add Main Category Name" class="form-control"  type="text">
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-transparent">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
