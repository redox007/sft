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
                    <h2>List Partner</h2>

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
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>Sl.No.</th>
                                    <th>Partner Name</th> 
                                    <th>Wellness Type</th>
                                    <th>Country Code</th> 
                                    <th>Action</th>    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($partners)) { ?>
                                    <?php foreach ($partners as $key => $partner) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>
                                            <td><a href="<?php echo base_url('admin/master/view_partner') . '/' . encode_url($partner->id); ?>" ><?php echo isset($partner->partner_name) ? $partner->partner_name : ""; ?></a></td>                                                   
                                            <td><?php echo isset($partner->wellness_type) ? $partner->wellness_type : ""; ?></td>                                                   
                                            <td><?php echo isset($partner->code) ? $partner->code : ""; ?></td>                                                   
                                            <td>
                                                <a href="<?php echo base_url('admin/master/edit_partner') . '/' . encode_url($partner->id); ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <a href="<?php echo base_url('admin/master/view_partner') . '/' . encode_url($partner->id); ?>" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-folder"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="2">No Data Found</td></tr>';
                                }
                                ?>                   
                            </tbody>
                        </table>
                    </div>

                    <?php if (!empty($partners)) { ?>
                        <ul class="pagination">
                            <?php echo $page_link; ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /page content -->


</div>
</div>

</body>
