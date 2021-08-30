<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14">
    <div class="col-md-8 offset-2">
      <div class="card">
          <div class="card-body">
              
            <?php echo form_open($action, 'class="user"'); ?>
                <div class="form-group mb-3">
    				<label class="h6">1. Problem Statement <span class="fs-sm">(150-200 words)</span></label> 
    				<textarea id="ques1" name="ques1" class="form-control" rows=5></textarea>
                    <?php echo form_error('ques1', '<div class="error">', '</div>'); ?>
    			</div>
    			
    			<div class="form-group mb-3">
    				<label class="h6">2. Explanation of problem and context <span class="fs-sm">(200-400 words)</span> </label> 
    				<textarea id="ques2" name="ques2" class="form-control" rows=5></textarea>
                    <?php echo form_error('ques2', '<div class="error">', '</div>'); ?>
    			</div>
    			
    			<div class="form-group mb-3">
    				<label class="h6">3. Explanation of your solution <span class="fs-sm">(700-1,400 words)</span></label> 
    				<textarea id="ques3" name="ques3" class="form-control" rows=5></textarea>
                    <?php echo form_error('ques3', '<div class="error">', '</div>'); ?>
    			</div>
    			
    			<div class="form-group mb-3">
    				<label class="h6">4. Are there similar examples? If so, where and how? Please elaborate. <span class="fs-sm">(150-300 words)</span></label> 
    				<textarea id="ques4" name="ques4" class="form-control" rows=5></textarea>
                    <?php echo form_error('ques4', '<div class="error">', '</div>'); ?>
    			</div>
    			
    			<div class="form-group mb-3">
    				<label class="h6">5. What are the challenges you might face and how can they be addressed? <span class="fs-sm">(200-400 words)</span> </label> 
    				<textarea id="ques5" name="ques5" class="form-control" rows=5></textarea>
                    <?php echo form_error('ques5', '<div class="error">', '</div>'); ?>
    			</div>
    			
    			<div class="form-group mb-3">
    				<label class="h6">6. Any additional relevant information</label> 
    				<textarea id="ques6" name="ques6" class="form-control" rows=5></textarea>
                    <?php echo form_error('ques6', '<div class="error">', '</div>'); ?>
    			</div>
    			
    			<div class="form-group row col-md-12 mb-3">
    			    <div class="col-md-6">
    			        <button type="submit" class="btn btn-red btn-sm" id="submit" name="submit">Submit</button>
    			        <?php echo anchor('student/ideas','Back to Categories','class="btn btn-dark btn-sm"'); ?>
    			    </div>
    			    <div class="col-md-6 text-end">
    			        <?php echo anchor('','<i class="uil uil-link"></i> Idea Submmision Format','class="text-red fw-bold"'); ?>
    			    </div>
    			</div>
            </form>
            
         </div>
      </div>      
      
    </div>
</div>
