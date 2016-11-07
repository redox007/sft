


<div class="pv" id="preview">
    <?php load_medias(1, $input_media_id = '#input-media', true); ?>
</div>
<input id="input-media" type="text" value="1" name="media_ids" />
<!-- Large modal -->
<button type="button" class="btn btn-primary media-button" data-input-field="#input-media"  data-preview="#preview" >Media</button>

<div class="pv" id="preview2">
    <?php load_medias([2, 3], $input_media_id = '#input-media2'); ?>
</div>
<input id="input-media2" type="text" value="2,3" name="media_ids" />
<!-- Large modal -->
<button type="button" class="btn btn-primary media-button" data-input-field="#input-media2" data-is-multi="true" data-preview="#preview2" >Media</button>

<?php media([2, 3]); ?>