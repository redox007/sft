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
                    <h2>Add Partner</h2>
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

                    <ul class="nav nav-tabs bar_tabs">
                        <li class="active"><a data-toggle="tab" href="#General">General</a></li>
                        <li><a data-toggle="tab" href="#Add_award">Award</a></li>
                        <li><a data-toggle="tab" href="#room">Room</a></li>
                        <li><a data-toggle="tab" href="#wellness_plus">Programs</a></li>
                    </ul>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                        <div class="tab-content">
                            <div id="General" class="tab-pane fade in active">
                                <h2>General</h2>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Partner Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="partner_name" name="partner_name"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($partner_details->partner_name) ? $partner_details->partner_name : ""; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wellness Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="wellness_type_id" name="wellness_type_id" class="form-control col-md-7 col-xs-12" >
                                            <option value="">Select</option>
                                            <?php
                                            if (!empty($wellness_type)) {
                                                foreach ($wellness_type as $type) {
                                                    ?>
                                                    <option value="<?php echo $type->id; ?>" <?php echo ($partner_details->wellness_type_id == $type->id) ? "selected" : ""; ?> ><?php echo $type->wellness_type; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="country_id" name="country_id" class="form-control col-md-7 col-xs-12" >
                                            <option value="">Select</option>
                                            <?php
                                            if (!empty($country)) {
                                                foreach ($country as $con) {
                                                    ?>
                                                    <option value="<?php echo $con->id; ?>" <?php echo ($partner_details->country_id == $con->id) ? "selected" : ""; ?>><?php echo $con->code; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Continent <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="continent_id" name="continent_id" class="form-control col-md-7 col-xs-12" >
                                            <option value="">Select</option>
                                            <?php
                                            if (!empty($continent)) {
                                                foreach ($continent as $cont) {
                                                    ?>
                                                    <option value="<?php echo $cont->id; ?>" <?php echo ($partner_details->continent_id == $cont->id) ? "selected" : ""; ?> ><?php echo $cont->continent_name; ?></option>
                                                    <?php
                                                }
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
                                            <?php load_medias(isset($partner_details->partner_logo) ? $partner_details->partner_logo : "", $input_media_id = '#input-media', true); ?>
                                        </div>
                                        <input id="input-media" type="hidden" value="<?php echo $partner_details->partner_logo; ?>" name="media_ids" />
                                        <!-- Large modal -->
                                        <button type="button" class="btn btn-primary media-button" data-input-field="#input-media"  data-preview="#preview" >Media</button>
                                    </div>
                                </div>   
                                
                                
                                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banner Image
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview2">
                                <?php load_medias([$partner_details->banner], $input_media_id = '#input-media2', true); ?>
                            </div>
                                <input id="input-media2" type="hidden" value="<?php echo $partner_details->banner; ?>" name="banner" />
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media2" data-is-multi="true"  data-preview="#preview2" >Media</button>
                            </div>
                        </div>     
    
    
    
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Media
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview1">
                                <?php load_medias($partner_details->media_id, $input_media_id = '#input-media1', true); ?>
                            </div>
                                <input id="input-media1" type="hidden" value="<?php echo $partner_details->media_id; ?>" name="media" />
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media1"  data-preview="#preview1" >Media</button>
                            </div>
                        </div> 
                             
                                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Description 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="short_description" name="short_description"  class="form-control col-md-7 col-xs-12"><?php echo $partner_details->short_description; ?></textarea>                                
                            </div>
                        </div>
                                
                                
                                <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                                    </div>
                                </div>

                            </div>
                            <div id="Add_award" class="tab-pane fade ">
                                <h2>Award</h2>
                                <div class="ln_solid"></div>


                                <input type="button" id="add" value="Add" class="btn btn-dark" />
                                <input type="button" id="del" value="Remove" class="btn btn-danger" />

                                <div class="dynamic_text">
                                    <?php
                                    if (!empty($partner_data)) {
                                        foreach ($partner_data as $partner) {
                                            ?>
                                            <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Award </label><div class="col-md-6 col-sm-6 col-xs-12"><div></div><input type="text" name="award[]" class="form-control col-md-7 col-xs-12" placeholder="Award Name" value="<?php echo $partner->award; ?>"  /><br/></div></div>
                                        <?php }
                                    }
                                    ?>
                                </div> 

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                        <input type="submit" name="submit_award" id="submit_award" class="btn btn-success" value="Submit Award">
                                    </div>
                                </div>

                            </div>
                            <div id="room" class="tab-pane fade ">
                                <h2>Rooms</h2> <div><a href="<?php echo base_url('admin/master/add_room/'.  encode_url($partner_id)); ?>" class="btn btn-primary">Add Room</a></div>
                                <div class="ln_solid"></div>
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <th>Sl.No.</th>
                                                <th>Room Name</th>
                                                <th>Room Name in <?php echo ($selected_lang == 1) ? "English" : "Vietnamese"; ?></th>
                                                <th>Action</th>              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($rooms)) { ?>
    <?php foreach ($rooms as $key => $item) { ?>
                                                    <tr>
                                                        <td><?php echo ($key + 1) . '.' ?></td>
                                                        <td><?php echo isset($item->room_type) ? $item->room_type : ""; ?></td>   
                                                        <td><?php echo isset($item->room_name) ? $item->room_name : ""; ?></td>   
                                                        <td>
                                                            <a href="<?php echo base_url('admin/master/edit_room') . '/' .encode_url($partner_id).'/'. encode_url($item->id); ?>" class="btn btn-info btn-xs">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo '<tr><td colspan="4">No Data Found</td></tr>';
                                            }
                                            ?>                   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="wellness_plus" class="tab-pane fade ">
                                 <h2>Programs</h2> <div><a href="<?php echo base_url('admin/master/add_wellnes_plus/'.  encode_url($partner_id)); ?>" class="btn btn-primary">Add Program</a></div>
 <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>Sl.No.</th>
                                    <th>Code</th>
                                    <th>Wellness  </th> 
                                    <th>Partner Name</th>
                                    <th>Price </th>
                                    <th>Action</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($wellness_plus)) { ?>
                                    <?php foreach ($wellness_plus as $key => $type) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>
                                            <td><?php echo isset($type->code) ? $type->code : ""; ?></td>    
                                            <td><?php echo isset($type->wellness_name) ? $type->wellness_name : ""; ?></td>   
                                            <td><?php echo isset($type->partner_name) ? $type->partner_name : ""; ?></td>   
                                            <td><?php echo isset($type->price) ? $type->price : ""; ?></td>   
                                            <td>
                                                <a href="<?php echo base_url('admin/master/edit_wellness_plus') . '/' .encode_url($partner_id).'/'.encode_url($type->id); ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="6">No Data Found</td></tr>';
                                }
                                ?>                   
                            </tbody>
                        </table>
                    </div>
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
    $(document).ready(function () {

        $('.form-control').focus(function () {
            $('.validation').remove('.validation');
        });
        $('#submit').click(function (e) {
            if ($('#partner_name').val() == "") {
                $("#partner_name").parent().append("<div class='validation'>Please enter partner name</div>");
                return false;
            } else if ($('#wellness_type_id').val() == "") {
                $("#wellness_type_id").parent().append("<div class='validation'>Please select wellness type</div>");
                return false;
            } else if ($('#country_id').val() == "") {
                $("#country_id").parent().append("<div class='validation'>Please select country </div>");
                return false;
            } else if ($('#continent_id').val() == "") {
                $("#continent_id").parent().append("<div class='validation'>Please select continent </div>");
                return false;
            } else {
                return true;
            }
        });


        $('#add').click(function () {

            var days = $('.dynamic_text').find('.form-group').length + 1;

            $('.dynamic_text').append('<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Award </label><div class="col-md-6 col-sm-6 col-xs-12"><div></div><input type="text" name="award[]" class="form-control col-md-7 col-xs-12" placeholder="Award Name"  /><br/></div></div>');


        });
        $('#del').click(function () {

            $('.dynamic_text').find('.form-group').last().remove();
        });
    });
</script>

</body>
