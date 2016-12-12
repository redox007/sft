<div class="">
    <div class="page-title">
        <div class="title_left">

        </div>


    </div>
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Vertical Tabs </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="col-xs-3">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <?php if(!empty($awards)){ foreach($awards as $key=>$award){?>
                        <li <?php if($key==0){ echo 'class="active"'; } ?>><a href="#<?php echo $award->id; ?>" data-toggle="tab"><?php echo $award->award; ?></a>
                        </li>
                        <?php }} ?>
                        
                    </ul>
                </div>

                <div class="col-xs-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                         <?php if(!empty($awards)){ foreach($awards as $key=>$award){ ?>
                        <div class="tab-pane <?php if($key==0){ echo 'active'; } ?> " id="<?php echo $award->id; ?>">
                            
                        </div>
                        <?php }} ?>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>



</div>

<!-- /page content -->


</div>
</div>

</body>
