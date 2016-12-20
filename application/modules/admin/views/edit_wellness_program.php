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
                    <h2>Edit Wellness Program</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Program Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="program" name="program"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($wellness_details->program)?$wellness_details->program:""; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Program in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="program_name" name="program_name"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($wellness_details->program_name)?$wellness_details->program_name:""; ?>">
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wellness Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="wellness_type_id" name="wellness_type_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($wellness_type)){
                                        foreach ($wellness_type as $type){ ?>
                                            <option value="<?php echo $type->id; ?>" <?php echo ($wellness_details->wellness_type_id==$type->id)?"selected":""; ?> ><?php echo $type->wellness_type; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>
                               
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Short Description 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="description" name="description"  class="form-control col-md-7 col-xs-12"><?php echo $wellness_details->short_description; ?></textarea>                                
                            </div>
                        </div>
                       
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Program Image 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview">
                                <?php load_medias($wellness_details->media_id, $input_media_id = '#input-media', true); ?>
                            </div>
                                <input id="input-media" type="hidden" value="<?php echo $wellness_details->media_id; ?>" name="media_ids" class="form-control" />
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media"  data-preview="#preview" >Media</button>
                            </div>
                        </div> 
<!--                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" id="short_description" name="short_description"><?php //echo isset($wellness_details->short_description)?$wellness_details->short_description:""; ?></textarea>                                
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
           if($('#program').val()==""){         
               $("#program").parent().append("<div class='validation'>Please enter program</div>");
                return false;
           }else if($('#program_name').val()==""){         
               $("#program_name").parent().append("<div class='validation'>Please enter program name</div>");
                return false;
           }else if($('#wellness_type_id').val()=="" ){               
               $("#wellness_type_id").parent().append("<div class='validation'>Please select wellness type.</div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>


</body>
