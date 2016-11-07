<div class="modal fade media-box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Media Manager</h4>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Media List</a></li>
                    <li role="presentation"><a href="#media-upload" aria-controls="media-upload" role="tab" data-toggle="tab">Upload Media</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active media-list" id="home">
                        <div class="jFiler-items jFiler-row" id="media-container">
                            <ul class="jFiler-items-list jFiler-items-grid" id="media-list-container">
                                <?php $this->load->view('media_list'); ?>
                            </ul>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="media-upload">
                        <input type="file" name="files" id="filer_input2" multiple="multiple">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="insert-media">Insert As Media</button>
            </div>
        </div>
    </div>
</div>