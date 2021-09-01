		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
			  
			<div class="col-md-6 offset-3">
			   <?php echo form_open_multipart($action, 'class="user"'); ?>
			   
			    <div class="form-group mb-2">
                    <label class="h6">Member Name</label>
                    <input type="text" name="member_name" id="member_name" class="form-control" value="<?php echo (set_value('member_name'))?set_value('member_name'):'';?>">
    		        <span class="text-danger"><?php echo form_error('member_name'); ?></span>
                </div>
                
                <div class="form-group mb-2">
                    <label class="h6">Mobile</label>
                    <input type="text" name="member_mobile" id="member_mobile" class="form-control" value="<?php echo (set_value('member_mobile'))?set_value('member_mobile'):'';?>">
    		        <span class="text-danger"><?php echo form_error('member_mobile'); ?></span>
                </div>
                
                <div class="form-group mb-2">
                    <label class="h6">Email</label>
                    <input type="text" name="member_email" id="member_email" class="form-control" value="<?php echo (set_value('member_email'))?set_value('member_email'):'';?>">
    		        <span class="text-danger"><?php echo form_error('member_email'); ?></span>
                </div>
                
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"> SUBMIT </button>
          		    <?php echo anchor('student/my_team','CANCEL', 'class="btn btn-info btn-sm" '); ?>
                </div>
                  
			   
               </form>
			  
			</div>
        </div>


<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';

		$('#member_name').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });

        $('#member_name').keypress(function(e){
			var inputValue = e.charCode;
			if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
				e.preventDefault();
			}
        });

		$('#member_email').keyup(function(){
            $(this).val($(this).val().toLowerCase());
        });

		$('#member_mobile').keypress(function(e) {
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