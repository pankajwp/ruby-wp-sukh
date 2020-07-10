jQuery(document).ready(function ($) {
    $('.bj-color-title-picker').wpColorPicker();
    var meta_image_frame;
    $('.button_thumbnail').click(function (e) {

        e.preventDefault();
        var title = $(this).data('title');
        var button = $(this).data('button');
        var thumbnail = $(this).parents('.thumbnails');
        var value = thumbnail.find('input.image_id');
        if ($(this).attr('data-multiple') === "true") {
            $config = {
                title: title,
                button: {
                    text: button
                },
                library: {
                    type: 'image'
                },
                multiple: 'toggle'
            }
        } else {
            $config = {
                title: title,
                button: {
                    text: button
                },
                library: {
                    type: 'image'
                }
            }
        }
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media($config);

        meta_image_frame.on('open', function () {

            var selection = meta_image_frame.state().get('selection');
            var ids = value.val().split(',');
            ids.forEach(function (id) {
                attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            });
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var selection = meta_image_frame.state().get('selection');
            var id = new Array();
            var ul = "";
            selection.map(function (media_attachment) {
                media_attachment.toJSON();
                // Sends the attachment URL to our custom image input field.
                if (media_attachment.id != null && media_attachment.id != "") {
                    id.push(media_attachment.id);
                    var sample = $('.thumbnails .sample').clone();
                    sample.find('.image').attr('data-attachment_id', media_attachment.id);

                    sample.find('.picture img').attr('src', media_attachment.attributes.url);
                    ul += sample.html();
                    return false;
                }
            });
            var list = id.toString();
            value.val('');
            value.val(list);
            thumbnail.find('.thumbnails_images').html(ul);
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });

    $(document).on('click', '.remove_button', function (event) {
        event.preventDefault();

        var thumbnail = $(this).parents('.thumbnails');
        var value = thumbnail.find('input.image_id');

        var image = $(this).parents('.image');
        var del_id = image.data('attachment_id').toString();
        var ids = value.val().split(',');
        var index = ids.indexOf(del_id);
        ids.splice(index, 1);
        value.val(ids.toString());
        image.addClass('animated flipOutX');
        setTimeout(function () {
            image.remove();
        }, 800);
    });

    $('.ui-sortable').sortable({
        placeholder: 'placeholderBackground',
        stop: function (event, ui) {
            var ids = [];
            $('.image').each(function () {
                ids.push($(this).data('attachment_id'));
            });
            $('#fr-thumbnails').val(ids.toString());
        }
    });
});