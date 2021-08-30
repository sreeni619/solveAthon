<div class="row mb-3">
    <div class="col-6">
        <h2><?=$page_title;?></h2>
    </div>
    <div class="col-6">
        <div class="float-sm-right text-zero">
            <?php echo anchor('admin/addLearning','Add New','class="btn btn-primary btn-sm text-uppercase"'); ?>
        </div>
        <!--<div class="separator mb-3"></div>-->
    </div>
</div>

            <?php if($this->session->flashdata('message')){?> 
              <div align="center" class="alert alert-success" id="msg">      
                <?php echo $this->session->flashdata('message')?>
              </div>
            <?php } ?>
            
<div class="row">
    <div class="col-md-12">
        
        <?php 
        if($details){
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
                
                if($details1->status){
                    $status = anchor('admin/learningSatus/'.$details1->id.'/0','Hide','class="badge badge-pill badge-secondary"');
                }else{
                    $status = anchor('admin/learningSatus/'.$details1->id.'/1','Show','class="badge badge-pill badge-success"');
                }
                
                // $thumbnail="http://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
        ?>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card d-flex flex-row mb-3">
                        <a class="d-flex" href="#">
                            <img alt="Thumbnail" src="<?=$thumbnail;?>" class="list-thumbnail responsive border-0" />
                        </a>
                        <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                            <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                <a href="#" class="w-80 w-sm-100">
                                    <p class="list-item-heading mb-1 truncate"><?=$details1->title;?></p>
                                </a>
                                <div class="w-20 w-sm-100">
                                    <?php echo anchor($details1->url,'Play','class="badge badge-pill badge-danger" target="_blank"'); ?>
                                    <?php echo $status ?>
                                    <?php echo anchor('admin/deleteLearning/'.$details1->id,'Delete','class="badge badge-pill badge-dark"'); ?>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>    
        
        <?php }
        }else{ ?>
            <div class="col-md-12 text-center">
                <h3 class="text-muted mx-5 my-5"> Learning Details not found..!</h3>    
            </div>
        <?php } ?>
                   

    </div>
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
		
// 		showNotification("top", "right", "primary");
		
		function showNotification(placementFrom, placementAlign, type) {
          $.notify(
            {
              title: "Bootstrap Notify",
              message: "Here is a notification!",
              target: "_blank"
            },
            {
              element: "body",
              position: null,
              type: type,
              allow_dismiss: true,
              newest_on_top: false,
              showProgressbar: false,
              placement: {
                from: placementFrom,
                align: placementAlign
              },
              offset: 20,
              spacing: 10,
              z_index: 1031,
              delay: 4000,
              timer: 2000,
              url_target: "_blank",
              mouse_over: null,
              animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp"
              },
              onShow: null,
              onShown: null,
              onClose: null,
              onClosed: null,
              icon_type: "class",
              template:
                '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>"
            }
          );
        }
		
	});
</script>