<section class="wrapper bg-light">
<div class="container py-10 pt-md-10 pb-md-10">

		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
          <div class="col-lg-6">
            <figure><img class="w-auto" src="<?php echo base_url(); ?>assets/img/concept/concept5.png" srcset="<?php echo base_url(); ?>assets/img/concept/concept5.png 2x" alt="" /></figure>
          </div>
          <!--/column -->
		  
          <div class="col-md-6">
            <?php if($display == 2) { echo $otp; ?>
		  		<h1 class="mb-5">Reset your password ?</h1>
		  		<h2 class="fs-16 mb-3">A OTP has been sent to registered mobile number.</h2>
		  
			  	<?php if($this->session->flashdata('message')){?> 
	              <div class="alert alert-danger" id="msg">      
	                <?php echo $this->session->flashdata('message')?>
	              </div>
	          	<?php } ?>		   
			  	<?php echo form_open($action, 'class="user"'); ?>
				<!-- <div class="row"> -->
					<div class="form-group mb-3">
						<input type="text" id="mobile" name="mobile" class="form-control" autofocus="off" placeholder="Enter Mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):$mobile;?>" readonly>
	                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
					</div>
					<div class="form-group mb-3">
						<input type="text" id="otp" name="otp" class="form-control" autofocus="off" placeholder="Enter OTP" value="<?php echo (set_value('otp'))?set_value('otp'):'';?>">
	                    <?php echo form_error('otp', '<div class="error">', '</div>'); ?>
					</div>
					<div class="form-group mb-3">
						<input type="password" id="new_password" name="new_password" class="form-control" autofocus="off" placeholder="Enter New Password" value="<?php echo (set_value('new_password'))?set_value('new_password'):'';?>">
	                    <?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
					</div>
					<div class="form-group row mb-3">
						<div class="col-6">
							<?php  echo anchor('student/login','Click here to Login','class="hover link-violet"'); ?>
						</div>
						<div class="col-6 text-end">
							<button type="submit" class="btn btn-primary btn-sm">Reset Password</button>
						</div>
					</div>	
				<!-- </div> -->
		  		</form>
			<?php } ?>
		  	
		  	<?php if($display == 3) { ?>
		  		<div class="text-center">
		  			<h4> A OTP has been sent to registered mobile number. <br/> You can now use your new OTP as password to log into your account. </h4>
		  			<?php echo anchor('student/login','Click here to Login','class="text-danger"');?>
		  		</div>
		  	<?php } ?>

		  	<?php if($display == 4) { ?>
		  		<div class="col-md-12">
		  			<div class="text-center">
			  			<h4>Oops..!! Something went wrong. Please try again later..!!</h4>
			  			<?php echo anchor('student/forgot','Click here to Retry','class="text-danger"');?>
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

		$('#otp').keypress(function(e) {
			if ($(this).val().length < 6) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
			} else {
				event.preventDefault();
				return false;
			}
        });

		$('#mobile').keypress(function(e) {
			if ($(this).val().length < 10) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
			} else {
				event.preventDefault();
				return false;
			}
        });

	});
</script>