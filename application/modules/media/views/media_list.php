
<?php foreach ($medias as $media) { ?>
    <li class="jFiler-item" data-jfiler-index="7" style="" data-media-id="<?php echo $media['id']; ?>" data-preview-url="<?php echo generate_image_media_url($media, 'media_thumb'); ?>">
        <div class="jFiler-item-container">
            <div class="jFiler-item-inner">
                <div class="jFiler-item-thumb">
                    <div class="jFiler-item-status"></div>
                    <div class="jFiler-item-thumb-overlay">
                        <div class="jFiler-item-info">
                            <div style="display:table-cell;vertical-align: middle;">
                                <span class="jFiler-item-title">
                                    <b title="dark_sleek_form_shape_shadow_46432_3840x2400.jpg">
                                        <?php echo $media['media_name']; ?>
                                    </b>
                                </span> 
                                <span class="jFiler-item-others"><?php echo number_format((float) ($media['size'] / (1024 * 1024)), 2, '.', ''); ?> MB</span> 
                            </div>
                        </div>
                    </div>
                    <div class="jFiler-item-thumb-image">
                        <img src="<?php echo generate_image_media_url($media, 'media_thumb'); ?>" />
                    </div>
                </div>
                <div class="jFiler-item-assets jFiler-row">
                </div>
            </div>
        </div>
    </li>
<?php } ?>
