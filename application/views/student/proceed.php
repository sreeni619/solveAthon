<section class="wrapper bg-light">
<div class="container py-10 pt-md-10 pb-md-10">

		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
          <div class="col-lg-6">
            <figure><img class="w-auto" src="<?php echo base_url(); ?>assets/img/concept/concept5.png" srcset="<?php echo base_url(); ?>assets/img/concept/concept5@2x.png 2x" alt="" /></figure>
          </div>
          <!--/column -->
		  
          <div class="col-md-6">
		  <h2 class="fs-16 text-uppercase text-muted mb-3">Enter below details to complete Registration </h2>
		  <?php echo form_open($action, 'class="user"'); ?>
			<!-- <div class="row"> -->
				<div class="form-group mb-3">
					<input type="text" id="student_name" name="student_name" class="form-control" autofocus="off" placeholder="Enter Student Name" value="<?php echo (set_value('student_name'))?set_value('student_name'):'';?>">
                    <?php echo form_error('student_name', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<input type="text" id="mobile" name="mobile" class="form-control" autofocus="off" placeholder="Enter Mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):'';?>">
                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password"  value="<?php echo (set_value('password'))?set_value('password'):'';?>">
                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo (set_value('email'))?set_value('email'):'';?>">
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<input id="team_name" type="team_name" name="team_name" class="form-control" placeholder="Enter Team Name" value="<?php echo (set_value('team_name'))?set_value('team_name'):'';?>">
                    <?php echo form_error('team_name', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group row mb-3">
					<div class="col-6">
						<?php echo anchor('student/register','Back','class="btn btn-primary btn-sm"'); ?>
					</div>
					<div class="col-6 text-end">
						<button type="submit" class="btn btn-primary btn-sm">Register</button>
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

		$('#student_name').keypress(function(e){
			var inputValue = e.charCode;
			if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
				e.preventDefault();
			}
        });

		$('#student_name').keyup(function(e){
			$(this).val($(this).val().toUpperCase());
        });

		$('#email').keyup(function(){
            $(this).val($(this).val().toLowerCase());
        });

		$('#team_name').keypress(function(e){
			var inputValue = e.charCode;
			if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
				e.preventDefault();
			}
        });

		$('#team_name').keyup(function(e){
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