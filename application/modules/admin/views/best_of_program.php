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
                    <h2>Best Of Programs</h2>

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
                                    <th>Award</th> 
                                    <th>Number Of Partner</th>
                                    <th>Action</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($awards)) { ?>
                                    <?php foreach ($awards as $key => $item) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>
                                            <td><?php echo isset($item->award) ? $item->award : ""; ?></td>   
                                            <td><?php echo isset($item->total_partner) ? $item->total_partner : ""; ?></td>   
                                            <td>
                                                <a href="<?php echo base_url('admin/master/edit_best_of_program') . '/' . encode_url($item->id); ?>" class="btn btn-info btn-xs">
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

                    <?php if (!empty($countries)) { ?>
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
