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
                    <h2>Edit Continent</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="continent_name">Continent <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="continent_name" name="continent_name"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($continent_details->continent_name)?$continent_details->continent_name:""; ?>"  >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="continent">Continent Name in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="continent" name="continent"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($continent_details->continent)?$continent_details->continent:""; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Short Description 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="description" name="description"  class="form-control col-md-7 col-xs-12"><?php echo isset($continent_details->short_description)?$continent_details->short_description:""; ?></textarea>                                
                            </div>
                        </div>
                       
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Continent Image 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview">
                                <?php load_medias(isset($continent_details->media_id)?$continent_details->media_id:"", $input_media_id = '#input-media', true); ?>
                            </div>
                                <input id="input-media" type="hidden" value="<?php echo isset($continent_details->media_id)?$continent_details->media_id:""; ?>" name="media_ids" class="form-control" />
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media"  data-preview="#preview" >Media</button>
                            </div>
                        </div> 
                       
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
           if($('#continent_name').val()==""){         
               $("#continent_name").parent().append("<div class='validation'>Please enter continent name</div>");
                return false;
           }else if($('#continent').val()==""){         
               $("#continent").parent().append("<div class='validation'>Please enter continent</div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>

</body>
