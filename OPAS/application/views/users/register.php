<!--==================================
=            User Register            =
===================================-->

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
          <h3 class="widget-header user">Personal Information</h3>
          <?php echo validation_errors(); ?>
         <?php echo form_open('users/register'); ?>
            <!-- full Name -->
            <div class="form-group">
                <label for="first-name">Full Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <!-- user Name -->
            <div class="form-group">
                <label for="first-name">User Name</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="new-password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <!-- Confirm  Password -->
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm-password">
            </div>
            <!-- email -->
            <div class="form-group">
                <label for="new-email">Email</label>
                <input type="email" name="email" class="form-control" id="new-email">
            </div>
            <!-- Zip Code -->
            <div class="form-group">
                <label for="zip-code">Zip Code</label>
                <input type="text" name="zipcode" class="form-control" id="zip-code">
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-transparent">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
