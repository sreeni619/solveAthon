<section class="wrapper bg-light">
<div class="container py-10 pt-md-10 pb-md-10">

		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
          <div class="col-lg-6 text-center">
            <figure><img class="w-auto" src="<?php echo base_url(); ?>assets/img/concept/concept5.png" srcset="<?php echo base_url(); ?>assets/img/concept/concept5.png 2x" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-md-6">
			
			<?php if($status == '1') { ?>
				<div class="card">
                  <div class="card-body text-center">
				  <i class="uil uil-check-circle text-materialgreen font-80 display-1"></i>
                    <h2>Congratulations!</h3>
                    <p class="mb-2">Your account has been successfully created.</p>
					<?php echo anchor('student/login','Click here to Login','class="more hover link-violet"'); ?>
                  </div>                  
                </div>
			<?php } ?>

			<?php if($status == '2') { ?>
		  		<div class="card">
                  <div class="card-body text-center">
				  <i class="uil uil-times-circle text-red font-80 display-1"></i>
                    <h2>Oops!</h3>
                    <p class="mb-2">Something wrong happend.</p>
					<?php echo anchor('student/register','Click here to try again registration','class="more hover link-violet"'); ?>
                  </div>                  
                </div>
			<?php } ?>

			<?php if($status == 'mobile') { ?>
		  		<div class="card">
                  <div class="card-body text-center">
				  <i class="uil uil-times-circle text-red font-80 display-1"></i>
                    <h2>Oops!</h3>
                    <p class="mb-2">The mobile number you entered already exists with another account. Please try with another number.</p>
					<?php echo anchor('student/register','Click here to try again registration','class="more hover link-violet"'); ?>
                  </div>                  
                </div>
			<?php } ?>

			<?php if($status == 'email') { ?>
		  		<div class="card">
                  <div class="card-body text-center">
				  <i class="uil uil-times-circle text-red font-80 display-1"></i>
                    <h2>Oops!</h3>
                    <p class="mb-2">The email you entered already exists with another account. Please try with another number.</p>
					<?php echo anchor('student/register','Click here to try again registration','class="more hover link-violet"'); ?>
                  </div>                  
                </div>
			<?php } ?>

			<?php if($status == 'team_name') { ?>
		  		<div class="card">
                  <div class="card-body text-center">
				  <i class="uil uil-times-circle text-red font-80 display-1"></i>
                    <h2>Oops!</h3>
                    <p class="mb-2">The team name you entered already exists with another account. Please try with another number.</p>
					<?php echo anchor('student/register','Click here to try again registration','class="more hover link-violet"'); ?>
                  </div>                  
                </div>
			<?php } ?>

          </div>
          <!--/column -->
        </div>

</div>
</section>
<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';

	});
</script>