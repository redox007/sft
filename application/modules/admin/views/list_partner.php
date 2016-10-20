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
<div class="row">
    <div class="col-md-12">

        <table class="table table-bordered responsive">
            <thead>
                <tr>
                    <th>Sl.No.</th>
                    <th>Module Name</th>                                        
                    <th>Added By</th>
                    <th>Added Time</th>
                    <th>Status</th>
                    <th>Action</th>              
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($modules)) { ?>
                    <?php foreach ($modules as $key => $module) { ?>
                        <tr>
                            <td><?php echo ($key + 1) . '.' ?></td>
                            <td><?php echo isset($module->module_name) ? $module->module_name : ""; ?></td>                       
                            <td><?php echo ($module->added_by == 1) ? "Admin" : "Institute Admin"; ?></td>
                            <td><?php echo isset($module->added_time) ? $module->added_time : ""; ?></td>
                            <td>
                                <select class="form-control">
                                    <option value="<?php if($module->status == 1){ echo "selected='selected'"; } ?>">Active</option>
                                    <option value="<?php if($module->status === 0){ echo "selected='selected'"; } ?>">Inactive</option>
                                </select>
                             
                            </td>
                            <td>
                                <a href="<?php echo base_url('settings/updateModuleList').'/'.encode_url($module->id);?>" class="btn btn-default btn-sm btn-icon icon-left">
                                    <i class="entypo-pencil"></i>
                                    Edit
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
        <?php if (!empty($module)) { ?>
            <ul class="pagination">
    <?php echo $page_link; ?>
            </ul>
<?php } ?>

    </div>
</div>
