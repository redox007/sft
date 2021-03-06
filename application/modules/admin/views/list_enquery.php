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
                    <h2>Enquiry List</h2>

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
                                    <th>Enquiry Date</th>
                                    <th>Enquiry By</th>
                                    <th>Action</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($enquiries)) { ?>
                                    <?php foreach ($enquiries as $key => $con) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>
                                            <td><?php echo isset($con->enquery_date) ? $con->enquery_date : ""; ?></td>   
                                            <td><a href="<?php echo base_url('admin/master/view_enquiry') . '/' . encode_url($con->id); ?>"><?php echo $con->start_name." ".$con->first_name." ".$con->last_name; ?></a></td>   
                                            <td>
                                                <a href="<?php echo base_url('admin/master/view_enquiry') . '/' . encode_url($con->id); ?>" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-folder"></i> View
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

                    <?php if (!empty($enquiries)) { ?>
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
