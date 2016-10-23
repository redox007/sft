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
    <?php
}

function load_media_style() {
    ?>
    <script type="text/javascript">
        var MEDIA_UPLOAD_PATH = "<?php echo base_url(); ?>media/upload";
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
