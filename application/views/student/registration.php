		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
          <div class="col-lg-6">
            <figure><img class="w-auto" src="<?php echo base_url(); ?>assets/img/concept/concept5.png" srcset="<?php echo base_url(); ?>assets/img/concept/concept5.png" alt="Registration" /></figure>
          </div>
          <!--/column -->
		  
          <div class="col-md-6">
		  <h2 class="fs-16 text-uppercase text-muted mb-3">Choose Your College to Register </h2>
		  <?php echo form_open($action, 'class="user"'); ?>
				<div class="form-group mb-3">
					<!-- <label class="h6">State</label> -->
					<?php echo form_dropdown('state', $statesList, (set_value('state'))?set_value('state'):'', 'class="form-select form-control" id="state"'); ?>
                    <?php echo form_error('state', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<!-- <label class="h6">District</label> -->
					<?php $districtOptions = array(' '=>'Select District');
                            echo form_dropdown('district', $districtOptions, (set_value('district'))?set_value('district'):'', 'class="form-select form-control" id="district"'); ?>
                    <?php echo form_error('district', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<!-- <label class="h6">City</label> -->
					<input type="text" id="city" name="city" class="form-control" placeholder="Enter City" value="<?php echo (set_value('city'))?set_value('city'):'';?>">
					<p class="text-muted">(Enter full city name) </p>
                    <?php echo form_error('city', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<!-- <label class="h6">Level</label> -->
					<?php echo form_dropdown('level', $levelOptions, (set_value('level'))?set_value('level'):'', 'class="form-select form-control" id="level"'); ?>
                    <?php echo form_error('level', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<!-- <label class="h6">Program</label> -->
					<?php echo form_dropdown('program', $programOptions, (set_value('program'))?set_value('program'):'', 'class="form-select form-control" id="program"'); ?>
                    <?php echo form_error('program', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3">
					<!-- <label class="h6">College</label> -->
                    <input type="text" id="college" name="college" class="form-control" placeholder="Enter College Full Name" value="<?php echo (set_value('college'))?set_value('college'):'';?>">
                    <p class="text-muted">(Enter the Full College Name) </p>
					<span id="lblError" style="color: red"></span>
                    <?php echo form_error('college', '<div class="error" id="lblError">', '</div>'); ?>
				</div>
				<div class="form-group mb-3 text-end">
					<button type="submit" class="btn btn-primary btn-sm" id="proceed" name="proceed">Proceed</button>
				</div>
		  </form>
          </div>
          <!--/column -->
        </div>
<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
		
		$("#state").change(function(){
			event.preventDefault();
	            	
			var state = $("#state").val();
			
			if(state == ' '){
			   alert("Please Select State");
			}else{
			  $.ajax({'type':'POST',
				'url':base_url+'student/districtList',
				'data':{'state':state},
				'dataType':'text',
				'cache':false,
				'success':function(data){
					$('select[name="district"]').empty();
					$('select[name="district"]').append(data);
					$('select[name="district"]').removeAttr("disabled");
				}
			  });
			  
			}
		});

		$('#city').keypress(function(e){
			var inputValue = e.charCode;
			if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
				e.preventDefault();
			}
        });

		$('#city').keyup(function(e){
			$(this).val($(this).val().toUpperCase());
        });

		$('#college').keypress(function(e){
			var inputValue = e.charCode;
			if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
				e.preventDefault();
			}
			$(this).val($(this).val().toUpperCase());
        });

		$('#college').keyup(function(e){
			$(this).val($(this).val().toUpperCase());
        });

// 		$("#district").change(function(){
// 			event.preventDefault();
	            	
// 			var state = $("#state").val();
// 			var district = $("#district").val();
			
// 			if(state == ' ' || district == ' '){
// 			   alert("Please Select State and District");
// 			}else{
// 			  $.ajax({'type':'POST',
// 				'url':base_url+'student/cityList',
// 				'data':{'state':state, 'district':district},
// 				'dataType':'text',
// 				'cache':false,
// 				'success':function(data){
// 					$('select[name="city"]').empty();
// 					$('select[name="city"]').append(data);
// 					$('select[name="city"]').removeAttr("disabled");
// 				}
// 			  });
			  
// 			}
// 		});

// 		$("#city").change(function(){
// 			event.preventDefault();
	            	
// 			var state = $("#state").val();
// 			var district = $("#district").val();
// 			var city = $("#city").val();
			
// 			if(state == ' ' || district == ' ' || city == ' '){
// 			   alert("Please Select State, District and City");
// 			}else{
// 			  $.ajax({'type':'POST',
// 				'url':base_url+'student/levelList',
// 				'data':{'state':state, 'district':district, 'city':city},
// 				'dataType':'text',
// 				'cache':false,
// 				'success':function(data){
// 					$('select[name="level"]').empty();
// 					$('select[name="level"]').append(data);
// 					$('select[name="level"]').removeAttr("disabled");
// 				}
// 			  });
			  
// 			}
// 		});

// 		$("#level").change(function(){
// 			event.preventDefault();
	            	
// 			var state = $("#state").val();
// 			var district = $("#district").val();
// 			var city = $("#city").val();
// 			var level = $("#level").val();
			
// 			if(state == ' ' || district == ' ' || city == ' ' || level == ' '){
// 			   alert("Please Select State, District, City and Level");
// 			}else{
// 			  $.ajax({'type':'POST',
// 				'url':base_url+'student/programList',
// 				'data':{'state':state, 'district':district, 'city':city, 'level':level},
// 				'dataType':'text',
// 				'cache':false,
// 				'success':function(data){
// 					$('select[name="program"]').empty();
// 					$('select[name="program"]').append(data);
// 					$('select[name="program"]').removeAttr("disabled");
// 				}
// 			  });
			  
// 			}
// 		});

// 		$("#program").change(function(){
// 			event.preventDefault();
	            	
// 			var state = $("#state").val();
// 			var district = $("#district").val();
// 			var city = $("#city").val();
// 			var level = $("#level").val();
// 			var program = $("#program").val();
			
// 			if(state == ' ' || district == ' ' || city == ' ' || level == ' ' || program == ' '){
// 			   alert("Please Select State, District, City, Level and Program");
// 			}else{
// 			  $.ajax({'type':'POST',
// 				'url':base_url+'student/collegesList',
// 				'data':{'state':state, 'district':district, 'city':city, 'level':level, 'program':program},
// 				'dataType':'text',
// 				'cache':false,
// 				'success':function(data){
// 					$('select[name="college"]').empty();
// 					$('select[name="college"]').append(data);
// 					$('select[name="college"]').removeAttr("disabled");
// 				}
// 			  });
			  
// 			}
// 		});

// 		$("#college").change(function(){
// 			event.preventDefault();
	            	
// 			var college = $("#college").val();
			
// 			if(college == ' '){
// 			   $("#proceed").prop("disabled", true);
// 			   alert("Please Select College");
// 			}else{
// 				$("#proceed").prop("disabled", false);
// 			}
// 		});

	});
</script>