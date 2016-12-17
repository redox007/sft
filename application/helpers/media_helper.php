<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function load_media_script() {
    ?>
    <script src="<?php echo base_url(); ?>assets/vendors/jQuery.filer-1.3.0/js/jquery.filer.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/media.js" type="text/javascript"></script>
    <!--The Modal-->
    <?php
    $CI = &get_instance();
    $CI->load->module("Media");
    $CI->media->media_modal();
//    echo Modules::run('media/media_modal');
    ?>
    <!--The Modal End-->
    <?php
}

function load_media_style() {
    ?>
    <script type="text/javascript">
        var MEDIA_UPLOAD_PATH = "<?php echo base_url(); ?>media/upload";
        var MEDIA_LIST_PATH = "<?php echo base_url(); ?>media/list_view_media";
    </script>
    <link href="<?php echo base_url(); ?>assets/vendors/jQuery.filer-1.3.0/css/jquery.filer.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/vendors/jQuery.filer-1.3.0/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/media.css" rel="stylesheet" />
    <?php
}

function generate_image_media_url($media, $size = 'small') {
    $CI = &get_instance();
    $media_sizes = $CI->config->item('media_sizes');
    $w = '';
    $h = '';
    if ($media_sizes && isset($media_sizes[$size])) {
        $w = $media_sizes[$size][0];
        $h = $media_sizes[$size][1];
    }
    $file_name = $media['media_name'];
    if ($w && $h) {
        $file_name = $media['raw_name'] . '-' . $w . 'x' . $h . $media['extension'];
    }
    return base_url() . $media['url'] . '/' . $file_name;
}

function load_medias($ids, $input_media_id = '', $no_cross = false) {
    $ids = is_array($ids) ? implode(',', $ids) : $ids;
    $CI = &get_instance();
    $CI->load->module("media");
    if ($ids) {
        $CI->media->list_view_media($ids, $input_media_id, $no_cross);
    }
}

function media($preview = '', $input_name = 'media', $is_multi = 'false', $name = 'Add Media', $button_class = '') {
    $media_input = 'input-media-' . rand(0000, 9999);
    $media_input_hash = "#" . $media_input;
    $media_preview = 'media-preview-' . rand(0000, 9999);
    $media_preview_hash = "#" . $media_preview;

    if (is_array($preview) && count($preview) > 1) {
        $is_multi = 'true';
        $preview = implode(',', $preview);
    } elseif ($preview AND is_string($preview)) {
        $p = explode(',', $preview);
        if (count($p) > 1) {
            $is_multi = 'true';
        }
    }
    ?>
    <div class="media-preview" id="<?php echo $media_preview; ?>">
        <?php load_medias($preview, "#" . $media_input); ?>
    </div>
    <input id="<?php echo $media_input; ?>" type="hidden" value="<?php echo $preview; ?>" name="<?php echo $input_name; ?>" />
    <!-- Large modal -->
    <button type="button" class="btn btn-primary <?php echo $button_class; ?> media-button" data-input-field="<?php echo $media_input_hash; ?>" data-is-multi="<?php echo $is_multi; ?>" data-preview="<?php echo $media_preview_hash; ?>" ><?php echo $name; ?></button>
    <?php
}
