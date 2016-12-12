<div class="">
    <div class="page-title">
        <div class="title_left">

        </div>


    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  
                    <h2>Edit Room </h2><div class="text-right"><a href="<?php echo base_url('admin/master/list_partner'); ?>" class="btn btn-warning">Back </a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <?php if ($this->session->flashdata('error_message')) { ?>
                        <div class="alert alert-warning">
                            <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('success_message')) { ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ?>

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                        
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Room Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="room_type" name="room_type"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($room_details->room_type)?$room_details->room_type:""; ?>" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Room Name In <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="room_name" name="room_name"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($room_details->room_name)?$room_details->room_name:""; ?>">
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Room Images <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             
                            <div class="pv" id="preview2">
                                <?php load_medias([$room_images], $input_media_id = '#input-media2'); ?>
                            </div>
                            <input id="input-media2" type="hidden" value="<?php echo $room_images; ?>" name="media_ids" />
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media2" data-is-multi="true" data-preview="#preview2" >Media</button>
                        
                            </div>
                        </div>  
                        
                        
<!--                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" id="short_description" name="short_description"></textarea>                                
                            </div>
                        </div>                        -->
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- /page content -->


</div>
</div>


<script>
    $(document).ready(function(){   
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#root_type').val()==""){         
               $("#root_type").parent().append("<div class='validation'>Please enter room type</div>");
                return false;
           }else if($('#room_name').val()==""){         
               $("#room_name").parent().append("<div class='validation'>Please enter room name </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>


</body>
