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
                    <h2>Enquiry Details</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="table-responsive">
					  <div class="panel panel-default">
						<div class="panel-body">
							<div class="panel panel-info">
								<div class="panel-heading">General Information</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3"><strong>Name:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->name) ? $request_for_call_data->name : '---'; ?></div>
										<div class="col-md-3"><strong>Country:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->nicename) ? $request_for_call_data->nicename : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Phone Number:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->phone) ? '(+'.$request_for_call_data->country_code.') '. $request_for_call_data->phone : '---'; ?></div>
										<div class="col-md-3"><strong>Email Address:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->email) ? $request_for_call_data->email : '---'; ?></div>
									</div>
                                                                        <div class="row">
										<div class="col-md-3"><strong>Sex:</strong></div><div class="col-md-3"><?php
                                                                                if(!empty($request_for_call_data->sex)){
                                                                                    if($request_for_call_data->sex == 'F')
                                                                                    echo 'Female';
                                                                                    else if($request_for_call_data->sex == 'M') echo 'Male';
                                                                                    else echo 'Others';
                                                                                }else { echo '---'; }?></div>
										<div class="col-md-3"><strong>Age:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->age) ? $request_for_call_data->age : '---'; ?></div>
									</div>
									<div class="row"><?php
									if(!empty($request_for_call_data->created)){
									    $date = DateTime::createFromFormat('Y-m-d H:i:s', $request_for_call_data->created);
									    $request_for_call_data->created = $date->format('d-m-Y');
									}?>
										<div class="col-md-3"><strong>Enquiry Date:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->created) ? $request_for_call_data->created : '---'; ?></div>
										<div class="col-md-3">&nbsp;</div>
									</div>
								</div>
							</div>
							<div class="panel panel-danger">
								<div class="panel-heading">Other Information</div>
								<div class="panel-body">
									<div class="row"><?php
									if(!empty($request_for_call_data->preffered_call_date)){
									    $date = DateTime::createFromFormat('Y-m-d', $request_for_call_data->preffered_call_date);
									    $request_for_call_data->preffered_call_date = $date->format('d-m-Y');
									}?>
										<div class="col-md-3"><strong>Preffered Call Date:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->preffered_call_date) ? $request_for_call_data->preffered_call_date : '---'; ?></div>
										<div class="col-md-3"><strong>Preffered Call Time:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->preffered_call_time) ? $request_for_call_data->preffered_call_time : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>SkyPe id:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->skype_id) ? $request_for_call_data->skype_id : '---'; ?></div>
										<div class="col-md-3"><strong>Main goals while staying at Kamalaya:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->goal_for_visit) ? $request_for_call_data->goal_for_visit : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Any past / current serious health conditions:</strong></div><div class="col-md-3"><?php echo !empty($request_for_call_data->health_condition) ? $request_for_call_data->health_condition : '---'; ?></div>
									</div>

								</div>
							</div>
						  </div>
						</div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>

<!-- /page content -->


</div>
</div>

</body>
