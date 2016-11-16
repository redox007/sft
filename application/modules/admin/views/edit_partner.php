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
                    <h2>Edit Partner</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Partner Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="partner_name" name="partner_name"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($partner_details->partner_name)?$partner_details->partner_name:""; ?>">
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
                                            <option value="<?php echo $type->id; ?>" <?php echo ($partner_details->wellness_type_id==$type->id)?"selected":""; ?> ><?php echo $type->wellness_type; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>
                               
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wellness Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="country_id" name="country_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($country)){
                                        foreach ($country as $con){ ?>
                                            <option value="<?php echo $con->id; ?>" <?php echo ($partner_details->country_id==$con->id)?"selected":""; ?>><?php echo $con->code; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Partner Logo 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview">
                                <?php load_medias(isset($partner_details->partner_logo)?$partner_details->partner_logo:"", $input_media_id = '#input-media', true); ?>
                            </div>
                                <input id="input-media" type="hidden" value="1" name="media_ids" />
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
           if($('#partner_name').val()==""){         
               $("#partner_name").parent().append("<div class='validation'>Please enter partner name</div>");
                return false;
           }else if($('#wellness_type_id').val()==""){         
               $("#wellness_type_id").parent().append("<div class='validation'>Please select wellness type</div>");
                return false;
           }else if($('#country_id').val()==""){         
               $("#country_id").parent().append("<div class='validation'>Please select country </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>

</body>
