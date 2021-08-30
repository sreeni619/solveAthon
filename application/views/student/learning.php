<div class="row text-center gx-lg-8 gy-5 mb-10 mb-md-14">
    
        <?php 
        if($details){
            echo '<div class="col-md-12">';
            echo '<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">';
            foreach($details as $details1){
                $link = $details1->url;
                $video = explode("?v=", $link);
                
                $video_id = null;
                if (array_key_exists("1",$video)){
                    $video_id = $video[1];
                    $thumbnail = "https://img.youtube.com/vi/".$video_id."/hqdefault.jpg";
                }else{
                    $thumbnail = base_url()."assets/img/default.png";
                }
                
                $status = $details1->status;
        ?>
          
            <div class="col-md-3 col-lg-3">
			  <div class="card">
				<figure class="card-img-top"><img class="img-fluid" src="<?=$thumbnail;?>" srcset="<?=$thumbnail;?> 4x"/></figure>
				<div class="card-body px-6 py-5">
                    <h4 class="mb-1"><?php echo anchor($details1->url,$details1->title,'class="text-dark" target="_blank"');?></h4>
                  </div>
			  </div>
			</div>
			
        <?php
            }
            echo '</div>';
            echo '</div>';
        }else{ ?>
            <div class="col-md-6 offset-3 text-center">
                <img src="<?=base_url().'assets/img/Deadline-pana.png';?>" width="300px"/>    
                <h4>Learning takes time and there is still time for learning. Come back soon!</h4>
            </div>
        <?php } ?>
        
    
</div>

		<!--<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
		<!--	<div class="col-md-3 col-lg-3">-->
		<!--	  <div class="card">-->
		<!--		<figure class="card-img-top"><img class="img-fluid" src="https://via.placeholder.com/250" srcset="https://via.placeholder.com/250 4x" alt="" /></figure>-->
		<!--		<div class="card-body px-6 py-5">-->
  <!--                  <h4 class="mb-1">Title will display here</h4>-->
  <!--                  <p class="mb-0">Category</p>-->
  <!--                </div>-->
		<!--	  </div>-->
		<!--	</div>-->
  <!--      </div>-->
