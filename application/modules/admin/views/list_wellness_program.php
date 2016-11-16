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
                    <h2>List Wellness Program</h2>

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
                                    <th>Program </th> 
                                    <th>Wellness Program In <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?></th>
                                    <th>Wellness Type </th>
                                    <th>Action</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($wellness_program)) { ?>
                                    <?php foreach ($wellness_program as $key => $type) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>
                                            <td><?php echo isset($type->program) ? $type->program : ""; ?></td>    
                                            <td><?php echo isset($type->program_name) ? $type->program_name : ""; ?></td>   
                                            <td><?php echo isset($type->wellness_type) ? $type->wellness_type : ""; ?></td>   
                                            <td>
                                                <a href="<?php echo base_url('admin/master/edit_wellness_program') . '/' . encode_url($type->id); ?>" >
                                                    <i class="fa fa-edit"></i>

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

                    <?php if (!empty($wellness_program)) { ?>
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
