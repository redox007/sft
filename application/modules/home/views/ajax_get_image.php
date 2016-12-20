<?php
if (!empty($images)) {
    foreach ($images as $img) {
        $media['url'] = $img->url;
        $media['media_name'] = $img->media_name;
        $media['raw_name'] = $img->raw_name;
        $media['extension'] = $img->extension;
        ?>
        <li class="col-xs-12 col-md-4"><img src="<?php echo generate_image_media_url($media, 'type'); ?>" alt=""></li>
    <?php }
}
?>
