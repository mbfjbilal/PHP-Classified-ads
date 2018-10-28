
<!--=================================
=           Create Post            =
==================================-->

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

<section class="user-profile section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Register Personal Info -->
        <div class="widget personal-info">
           <?php echo validation_errors(); ?>
         <?php echo form_open_multipart('posts/create'); ?>
         
            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input  name="title" placeholder="Add Title" class="form-control"  type="text">
            </div>

            <!-- Text area -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="editor1" class="form-control" name="description" placeholder="Description"></textarea>
            </div>
            <!-- Category -->
            <div class="form-group">
                <label for="Category">Category</label><br>
                <select name="category_id" class="form-control selectpicker" >
                <?php foreach ($categories as $category) { ?>
                  
                  <option value="<?php echo $category['c_id']; ?>"><?php echo $category['c_name']; ?></option>

                <?php } ?>
              </select>
            </div>

            <!-- Image input-->
            <div class="form-group">
                <label for="Upload Image">Upload Image</label>
                <input name="userfile" size="20" class="form-control"  type="file">
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-transparent">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>