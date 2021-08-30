<section class="wrapper bg-light">
<div class="container py-10 pt-md-10 pb-md-10">

		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
          <!-- <div class="col-lg-6">
            <figure><img class="w-auto" src="<?php echo base_url(); ?>assets/img/concept/concept5.png" srcset="<?php echo base_url(); ?>assets/img/concept/concept5@2x.png 2x" alt="" /></figure>
          </div> -->
          <!--/column -->
		  
          <div class="col-md-12">
		  <?php echo form_open("", 'class="user"'); ?>
			<div class="row">
				<div class="form-group mb-3 col-6">
					<label class="">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo (set_value('name'))?set_value('name'):'';?>">
                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
				</div>
				<!-- <div class="form-group mb-3 col-4">
					<label class="">Mobile</label>
					<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):'';?>">
                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
				</div> -->
				<div class="form-group mb-3 col-6">
					<label class="">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
			</div>
			<div class="row">
				<div class="form-group mb-3 col-4">
					<label class="">State</label>
					<?php $statusOptions = array('1'=>'Enable','0'=>'Disable');
                            echo form_dropdown('status', $statusOptions, '', 'class="form-select form-control" id="status"'); ?>
                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3 col-4">
					<label class="">District</label>
					<?php $statusOptions = array('1'=>'Enable','0'=>'Disable');
                            echo form_dropdown('status', $statusOptions, '', 'class="form-select form-control" id="status"'); ?>
                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3 col-4">
					<label class="">City</label>
					<?php $statusOptions = array('1'=>'Enable','0'=>'Disable');
                            echo form_dropdown('status', $statusOptions, '', 'class="form-select form-control" id="status"'); ?>
                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
				</div>
			</div>
			<div class="row">
				<div class="form-group mb-3 col-4">
					<label class="">College</label>
					<?php $statusOptions = array('1'=>'Enable','0'=>'Disable');
                            echo form_dropdown('status', $statusOptions, '', 'class="form-select form-control" id="status"'); ?>
                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3 col-4">
					<label class="">Stream</label>
					<?php $statusOptions = array('1'=>'Enable','0'=>'Disable');
                            echo form_dropdown('status', $statusOptions, '', 'class="form-select form-control" id="status"'); ?>
                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
				</div>
				<div class="form-group mb-3 col-4">
					<label class="">Team Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo (set_value('name'))?set_value('name'):'';?>">
                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-primary btn-sm">Submit</button>
				</div>
			</div>

		  </form>
          </div>
          <!--/column -->
        </div>

</div>
</section>