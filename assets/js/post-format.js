/**
 * Created by FOX on 2/22/2016.
 */
jQuery(document).ready(function($) {
    "use strict";
    $('#post-formats-select').on('click', '.post-format', function () {
        var post_formart = $(this).val();
        get_post_fields(post_formart);
    });

    $(window).on('load', function(){
        setTimeout(function(){
            $('.post-format').each(function(){
                if($(this).prop( "checked" )){
                    get_post_fields($(this).val());
                }
            });
        }, 1000);
    });

    function get_post_fields(_formart){
        switch (_formart){
            case 'video':
                $('#_box__page_post_format_options').css('display', 'block');
                $('#1_section_group').css('display', 'block');
                $('#_box__page_post_format_options').find('table tr').css('display', 'none');
                $('#opt-video-type-select').val($('#opt-video-type-select').val());
                $('#opt-video-type-select').trigger('change');
                $('fieldset[data-id="opt-video-type"]').parents('tr').attr('style', '');
                break;
            case 'gallery':
                $('#1_section_group').css('display', 'block');
                $('#_box__page_post_format_options').css('display', 'block');
                $('#_box__page_post_format_options').find('table tr').css('display', 'none');
                $('fieldset[data-id="opt-gallery"]').parents('tr').attr('style', '');
                break;
            default:
                $('#1_section_group').css('display', 'none');
                $('#0_section_group').find('table tr').css('display', 'block');
        }
    }
});