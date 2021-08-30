<section class="wrapper bg-light">
<div class="container py-10 pt-md-10 pb-md-10">

		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
          <div class="col-lg-6">
            <figure><img class="w-auto" src="<?php echo base_url(); ?>assets/img/concept/concept5.png" srcset="<?php echo base_url(); ?>assets/img/concept/concept5.png 2x" alt="" /></figure>
          </div>
          <!--/column -->
		  
          <div class="col-md-6">
		  <h2 class="fs-16 text-uppercase text-muted mb-3">Enter below details to login </h2>
		  
		  <?php if($this->session->flashdata('message')){?> 
              <div class="alert alert-danger" id="msg">      
                <?php echo $this->session->flashdata('message')?>
              </div>
          <?php } ?>

		   
		  <?php echo form_open($action, 'class="user"'); ?>
			<!-- <div class="row"> -->
				<div class="form-group mb-3">
					<input type="text" id="mobile" name="mobile" class="form-control" autofocus="off" placeholder="Enter Mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):'';?>">
                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password"  value="<?php echo (set_value('password'))?set_value('password'):'';?>">
                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group row mb-3">
					<div class="col-6">
						<?php echo anchor('student/register','Not yet register? Click Here','class="hover link-violet"'); ?>
					</div>
					<div class="col-6 text-end">
						<button type="submit" class="btn btn-primary btn-sm">Login</button>
					</div>
					
				</div>	
			<!-- </div> -->
		  </form>
          </div>
          <!--/column -->
        </div>

</div>
</section>
<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';

		$('#student_name').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });

		$('#email').keyup(function(){
            $(this).val($(this).val().toLowerCase());
        });

		$('#team_name').keyup(function(){
            $(this).val($(this).val().toUpperCase());
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