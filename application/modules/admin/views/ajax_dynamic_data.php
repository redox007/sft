<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Itinerary </label>
    <div class="col-md-6 col-sm-6 col-xs-12"><div>

        </div><input type="text" name="Itinerary_title[]" class="form-control col-md-7 col-xs-12" placeholder="Title"  />
        <br/>
        <textarea name="Itinerary[]" class="form-control col-md-7 col-xs-12" placeholder="Day <?php echo $days; ?>"></textarea>
    </div>
</div>
   <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Itinerary Image 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview<?php echo $days; ?>">
                                <?php load_medias("", $input_media_id = '#input-media'.$days, true); ?>
                            </div>
                                <input id="input-media<?php echo $days; ?>" type="hidden" value="" name="itinerary_media[]" class="form-control" />
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary media-button" data-input-field="#input-media<?php echo $days; ?>"  data-preview="#preview<?php echo $days; ?>" >Media</button>
                            </div>
                        </div>  