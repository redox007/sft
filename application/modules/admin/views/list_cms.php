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
                    <h2>List Pages</h2>

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
                    <?php }?>
                    <div id="filter_list">
                        <form id="filtorme" action="" method="post">

                            <select name="filtor" id="filtor" class="form-control col-md-7 col-xs-12" style="float: right;width: 10%;margin-bottom: 5px;" onchange="document.getElementById('filtorme').submit();">
                                <option <?php echo 'selected';?> value="all">All</option>
                                <option <?php if($this->input->post('filtor') == 'pages') echo 'selected'; ?> value="pages">Pages</option>
                                <option <?php if($this->input->post('filtor') == 'posts') echo 'selected'; ?> value="posts">Posts</option>
                           </select>
                            <label for="show" style="float: right;width:auto;margin-top: 6px;" class="control-label col-md-3 col-sm-3 col-xs-12">Show</label>

                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>Sl.No.</th>
                                    <th>Title</th>
                                    <th>Page Name</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cms_list)) { ?>
                                    <?php foreach ($cms_list as $key => $cms) { //echo '<pre>';print_r($cms);
                                        $user_name = '--';
                                        if($cms->created_by > 0){
                                            $user_info = get_admin_username($cms->created_by);
                                            if(isset($user_info[0]->user_name))
                                                $user_name = $user_info[0]->user_name;
                                        }?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>
                                            <td><?php echo isset($cms->title) ? $cms->title : ""; ?></td>
                                            <td><?php echo isset($cms->page_name) ? $cms->page_name : ""; ?></td>
                                            <td><?php echo isset($user_name) ?  $user_name : ""; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/master/edit_cms') . '/' . encode_url($cms->cms_page_id); ?>" >
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

                    <?php if (!empty($wow_list)) { ?>
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
