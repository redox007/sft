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
                    <h2>Edit Best Of Program</h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                        
                        
                        <!-- Start to do list -->
                
                  <div class="x_panel">
                    
                    <div class="x_content">

                      <div class="">
                        <ul class="to_do">
                            <?php 
                            if(!empty($partners)){ 
                                foreach($partners as $x){
                                ?>
                          <li>
                            <p>
                                <input type="checkbox" class="flat" name="partner[]" value="<?php echo $x->id; ?>" <?php echo in_array($x->id, $selected_arr)?"checked":""; ?> > <?php echo $x->partner_name; ?> </p>
                          </li>
                            <?php }} ?>
                        </ul>
                      </div>
                    </div>
                  </div>
              
                <!-- End to do list -->
                        
                        
 <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
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
    
    $(document).ready(function(){   
        
        
    });
</script>
</body>
