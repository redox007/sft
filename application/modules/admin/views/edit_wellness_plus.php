<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="">
    <div class="page-title">
        <div class="title_left">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">





        <div class="col-md-12 col-sm-12 col-xs-12">




            <div class="x_panel">

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

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#add_wellness">Overview</a></li>
                    <li><a data-toggle="tab" href="#itinerary">Itinerary</a></li>
                    <li><a data-toggle="tab" href="#media">Media</a></li>

                </ul>
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div id="add_wellness" class="tab-pane fade in active">

                            <h2>Overview</h2>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wellness Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="wellness_name" id="wellness_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $wellness_details->wellness_name; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wellness Name in <?php echo ($selected_lang == 1) ? "English" : "Vietnamese"; ?>  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="wellness_name_lang" id="wellness_name_lang" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $wellness_details->wellness_name_lang; ?>">
                                </div>
                            </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Wellness Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="type" id="type" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php
                                    if (!empty($wellness_type)) {
                                        foreach ($wellness_type as $type) {
                                            ?>
                                            <option value="<?php echo $type->id; ?>" <?php echo ($wellness_details->type == $type->id)?"selected":""; ?> ><?php echo $type->wellness_type; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                                        
                            </div>
                        </div>
                            
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Program <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="program_id" id="program_id" class="form-control col-md-7 col-xs-12" >
                                        <option value="">Select</option>
                                        <?php
                                        if (!empty($programs)) {
                                            foreach ($programs as $pro) {
                                                ?>
                                                <option value="<?php echo $pro->id; ?>" <?php echo ($wellness_details->program_id == $pro->id)?"selected":""; ?>><?php echo $pro->program; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>                                        
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Room <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="room_id" id="room_id" class="form-control col-md-7 col-xs-12" >
                                        <option value="">Select</option>
                                        <?php
                                        if (!empty($rooms)) {
                                            foreach ($rooms as $rm) {
                                                ?>
                                                <option value="<?php echo $rm->id; ?>"   <?php echo ($wellness_details->room_id == $rm->id)?"selected":""; ?> ><?php echo $rm->room_type; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>                                        
                                </div>
                            </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Partner <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="partner_id" id="partner_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php
                                    if (!empty($partner)) {
                                        foreach ($partner as $p) {
                                            ?>
                                            <option value="<?php echo $p->id; ?>" <?php echo ($partner_id == $p->id)?"selected":""; ?>><?php echo $p->partner_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                                        
                            </div>
                        </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Number Of Days <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <input type="text" id="no_of_day" name="no_of_day"  class="form-control col-md-7 col-xs-12" value="<?php echo $wellness_details->no_of_day; ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="price" name="price"  class="form-control col-md-7 col-xs-12" value="<?php echo $wellness_details->price; ?>" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Upload Pdf <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="pdf" id="pdf" class="form-control col-md-7 col-xs-12">                                   
                                </div>
                            </div>                            


                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Description in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="short_description" id="short_description" ><?php echo $wellness_details->short_description; ?></textarea>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo $this->ckeditor->editor("description", isset($wellness_details->description)?$wellness_details->description:"");?>
                                                               
                            </div>
                        </div>





                        </div>
                        <div id="itinerary" class="tab-pane fade">

                            <h2>Itinerary</h2>
                            <div class="ln_solid"></div>


                            <input type="button" id="add" value="Add" class="btn btn-dark" />
                            <input type="button" id="del" value="Remove" class="btn btn-danger" />

                            <div class="dynamic_text">
                                
                                 <?php if(!empty($itinerary)){ foreach($itinerary as $inkey=>$itn){ ?>
                                <div class="count_div">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Itinerary </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12"><div></div>
                                        <input type="text" name="Itinerary_title[]" class="form-control col-md-7 col-xs-12" placeholder="Title" value="<?php echo $itn->wellness_title; ?>"  /><br/>      
                                  <textarea name="Itinerary[]" class="form-control col-md-7 col-xs-12" placeholder="Day <?php echo $inkey+1; ?>"><?php echo $itn->description; ?></textarea></div>
                                </div>
                                
                                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Itinerary Image 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview<?php echo $inkey+1; ?>">
                                <?php load_medias($itn->media_id, $input_media_id = '#input-media'.$inkey+1, true); ?>
                            </div>
                                <input id="input-media<?php echo $inkey+1; ?>" type="hidden" value="<?php echo $itn->media_id; ?>" name="itinerary_media[]" class="form-control" />
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media<?php echo $inkey+1; ?>"  data-preview="#preview<?php echo $inkey+1; ?>" >Media</button>
                            </div>
                        </div>  
                                </div>
                            <?php }} ?>
                            </div> 

                        </div>  


                        <div id="media" class="tab-pane fade">
                            <h2>Media</h2>
                            <div class="ln_solid"></div> 
                            
                            <div class="pv" id="preview2">
                                <?php load_medias([$media], $input_media_id = '#input-media2'); ?>
                            </div>
                            <input id="input-media2" type="hidden" value="<?php echo $media; ?>" name="media_ids" />
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media2" data-is-multi="true" data-preview="#preview2" >Media</button>
                        
                        
                             <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Cancel</button>
                            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                            
                        </div> 
                    </div>


                   
                </form>

            </div>
        </div>
    </div>


</div>

<!-- /page content -->


</div>
</div>

<script>
    $(document).ready(function () {

        $('.form-control').focus(function () {
            $('.validation').remove('.validation');
        });
        $('#submit').click(function (e) {
           
           if ($('#wellness_name').val() == "") {
                $("#wellness_name").parent().append("<div class='validation'>Please enter wellness name</div>");
                return false;
            }else if ($('#wellness_name_lang').val() == "") {
                $("#wellness_name_lang").parent().append("<div class='validation'>Please enter wellness name</div>");
                return false;
            } else if ($('#type').val() == "") {
                $("#type").parent().append("<div class='validation'>Please select wellness type</div>");
                return false;
            }else if ($('#program_id').val() == "") {
                $("#program_id").parent().append("<div class='validation'>Please select program</div>");
                return false;
            } else if ($('#partner_id').val() == "") {
                $("#partner_id").parent().append("<div class='validation'>Please select partner</div>");
                return false;
            }  else if ($('#room_id').val() == "") {
                $("#room_id").parent().append("<div class='validation'>Please select room</div>");
                return false;
            }else if ($('#no_of_day').val() == "") {
                $("#no_of_day").parent().append("<div class='validation'>Please enter number of days in wellness </div>");
                return false;
            }else if ($('#price').val() == "") {
                $("#price").parent().append("<div class='validation'>Please enter price </div>");
                return false;
            } else {
                return true;
            }
        });
        $('#add').click(function () {            
            var days = $('.dynamic_text').find('.count_div').length + 1;
            $.ajax({
                url: "<?php echo base_url(); ?>admin/master/ajax_dynamic_data",
                type: 'POST',
                data: {days:days},
                success: function (data, textStatus, jqXHR) {                          
                       $('.dynamic_text').append(data);
                }
            });

           


        });
        $('#del').click(function () {

            $('.dynamic_text').find('.count_div').last().remove();
        });
    });
</script>

</body>
