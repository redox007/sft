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
										<div class="col-md-3"><strong>Name:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->first_name) ? $enquiry_data->start_name." ".$enquiry_data->first_name." ".$enquiry_data->last_name : '---'; ?></div>
										<div class="col-md-3"><strong>Country:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->country) ? $enquiry_data->country : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Phone Number:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->phone_number) ? $enquiry_data->phone_number : '---'; ?></div>
										<div class="col-md-3"><strong>Email Address:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->email) ? $enquiry_data->email : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Enquiry Date:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->enquery_date) ? $enquiry_data->enquery_date : '---'; ?></div>
										<div class="col-md-3">&nbsp;</div>
									</div>
								</div>
							</div>
							<div class="panel panel-danger">
								<div class="panel-heading">Travel Information</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3"><strong>Arrival Date:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->arrival_date) ? $enquiry_data->arrival_date : '---'; ?></div>
										<div class="col-md-3"><strong>Departure Date:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->departure_date) ? $enquiry_data->departure_date : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Number of Adults:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->no_of_adult) ? $enquiry_data->no_of_adult : '---'; ?></div>
										<div class="col-md-3"><strong>Number of Children:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->number_of_child) ? $enquiry_data->number_of_child : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Number Of Rooms:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->no_of_room) ? $enquiry_data->no_of_room : '---'; ?></div>
										<div class="col-md-3"><strong>Type Of Room:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->type) ? $enquiry_data->type : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Wellness Type:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->wellness) ? $enquiry_data->wellness : '---'; ?></div>
										<div class="col-md-3"><strong>Additional Comments:</strong></div><div class="col-md-3"><?php echo !empty($enquiry_data->comment) ? $enquiry_data->comment : '---'; ?></div>
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
