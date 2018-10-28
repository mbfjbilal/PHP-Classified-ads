<!--==================================
=            User login           =
===================================-->

<!-- <section class="page-title"> -->
    
  <!-- Container Start -->
  <!-- <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 text-center"> -->
        <!-- Title text -->
        <!-- <h3>Blog Page</h3> -->
       
    <!--   </div>
    </div>
  </div> -->
  <!-- Container End -->
<!-- </section> -->
<div class="container">
	<br>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">

			<?php echo validation_errors(); ?>
            <?php echo form_open('users/login'); ?>
            <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2">
                        <!-- <h3><i class="fa fa-envelope"></i> Contactanos</h3> -->
                        <br>
                                    <p class="m-0"> <h3><?= $title ?></h3></p>
                                </div>
                            </div>
                            <div class="card-body p-3">
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

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-block rounded-0 py-2">Login </button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>