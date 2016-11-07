/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('body').on('click', '.media-button', function () {
        var is_multi = $(this).data('is-multi');
        var input_field = $(this).data('input-field');
        var preview_div = $(this).data('preview');
        is_multi = is_multi ? is_multi : false;
        var insert_button = $('.media-box').find('#insert-media');
        insert_button.data({
            'is-multi': is_multi,
            'input-field': input_field,
            'preview': preview_div
        });
        $('.media-box').modal('show');
    });
    $('body').on('click', '.media-cross', function (e) {
        e.preventDefault();
        var impd = $(this).data('input-media-id');
        var media_id = $(this).parent().parent().data('media-id');
        if (impd) {
            var d = $(impd).val();
            if (d) {
                var d1 = d.split(',');
                d1.splice(d1.indexOf(media_id.toString()), 1);
                $(impd).val(d1.join(','));
            }
        }
        $(this).parent().parent().remove();
    });
    $('body').on('click', '#media-list-container li', function (e) {
        e.preventDefault();
        $(this).addClass('active');
        if (!$('#insert-media').data('is-multi')) {
            $(this).siblings().removeClass('active');
        }
    });
    $('body').on('click', '#insert-media', function (e) {
        e.preventDefault();
        var ids = [];
        $('#media-list-container li.active').each(function (i, e) {
            ids.push($(e).data('media-id'));
        });
        var input_field = $(this).data('input-field');
        var preview = $(this).data('preview');
        var is_multi = $(this).data('is-multi');
        var id_string = ids.join(',');

        if (is_multi) {
            var v = $(input_field).val();
            if (v) {
                id_string = v.trim() + ',' + id_string;
            }
            $(input_field).val(id_string);
        } else {
            $(input_field).val(id_string);
        }
        if (id_string) {
            console.log('ids', ids);
            $.post(MEDIA_LIST_PATH, {
                medias: id_string,
                input_media_id: input_field,
            }, function (data) {
//            if (is_multi) {
//                $('#preview').append(data.media);
//            } else {
                $(preview).html(data);
                $('#media-list-container li').removeClass('active');
//            }
            });
            $('.media-box').modal('hide');
        }
    });
    $("#filer_input2").filer({
        limit: null,
        maxSize: null,
        extensions: null,
        changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
        showThumbs: true,
        theme: "dragdropbox",
        templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',
            itemAppend: '<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: false,
            canvasImage: true,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
        dragDrop: {
            dragEnter: null,
            dragLeave: null,
            drop: null,
            dragContainer: null,
        },
        uploadFile: {
            url: MEDIA_UPLOAD_PATH,
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            synchron: true,
            beforeSend: function () {
            },
            success: function (data, itemEl, listEl, boxEl, newInputEl, inputEl, id) {
                var parent = itemEl.find(".jFiler-jProgressBar").parent(),
                        new_file_name = data.upload_data.file_name,
                        filerKit = inputEl.prop("jFiler");

                filerKit.files_list[id].name = new_file_name;
                console.log(itemEl);
                itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function () {
                    $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                    setTimeout(function () {
                        itemEl.fadeOut('slow');
                        $('#media-container ul').prepend(data.media);
                    }, 500);
                });
            },
            error: function (el) {
                var parent = el.find(".jFiler-jProgressBar").parent();
                el.find(".jFiler-jProgressBar").fadeOut("slow", function () {
                    $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
                });
            },
            statusCode: null,
            onProgress: null,
            onComplete: null
        },
        files: null,
        addMore: false,
        allowDuplicates: true,
        clipBoardPaste: true,
        excludeName: null,
        beforeRender: null,
        afterRender: null,
        beforeShow: null,
        beforeSelect: null,
        onSelect: null,
        afterShow: null,
        onRemove: function (itemEl, file, id, listEl, boxEl, newInputEl, inputEl) {
            var filerKit = inputEl.prop("jFiler"),
                    file_name = filerKit.files_list[id].name;

            $.post('./php/ajax_remove_file.php', {file: file_name});
        },
        onEmpty: null,
        options: null,
        dialogs: {
            alert: function (text) {
                return alert(text);
            },
            confirm: function (text, callback) {
                confirm(text) ? callback() : null;
            }
        },
        captions: {
            button: "Choose Files",
            feedback: "Choose files To Upload",
            feedback2: "files were chosen",
            drop: "Drop file here to Upload",
            removeConfirmation: "Are you sure you want to remove this file?",
            errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                filesType: "Only Images are allowed to be uploaded.",
                filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
            }
        }
    });

});