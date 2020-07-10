<?php
    /*
     * VC
     */
    vc_add_param("vc_row", array(
        "type" => "dropdown",
        "heading" => esc_html__("Custom Style", 'book-junky'),
        "param_name" => "el_class",
        "value" => array(
            'None' => '',
            'Row Width Bootstrap' => 'width-bootstrap',
            'Row Width Fill' => 'width-fill',
            'Row Width Fill Padding Left' => 'width-fill-left',
            'Row Width Fill Padding Right' => 'width-fill-right',
            'Extra Custom Class 1' => 'row-class1', 
            'Extra Custom Class 2' => 'row-class3', 
            'Extra Custom Class 3' => 'row-class3', 
            'Extra Custom Class 4' => 'row-class3', 
            'Extra Custom Class 5' => 'row-class3', 
        ),   
        "description" => 'Select Extra Custom Class (1->5): You user custom class style css: ( row-class1 to row-class5 )',  
    ));

    vc_add_param('vc_row',array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Row Style', 'book-junky' ),
        'value' => 
            array(
                esc_html__( 'Style Default','book-junky') => 'default',               
                esc_html__( 'Overlay Color','book-junky') => 'over-color',        
                esc_html__( 'Gradient Color','book-junky') => 'gradient-color',        
            ),
        'param_name' => 'overlay_row',
        'group' => esc_html__('Design Options','book-junky'),
    ));

    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "heading" => esc_html__('Color', 'book-junky'),
        "param_name" => "overlay_color",
        'group' => esc_html__('Design Options','book-junky'),
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "over-color"
            )
        ),
    ));

    vc_add_param('vc_row', array(
        'type' => 'checkbox',
        'heading' => esc_html__("Row Visible", 'book-junky'),
        'param_name' => 'row_visible',
        'std' => false,
        'group' => esc_html__('Design Options','book-junky'),
    ));

    vc_add_param('vc_row', array(
        'type' => 'checkbox',
        'heading' => esc_html__("Row Border", 'book-junky'),
        'param_name' => 'row_border',
        'std' => false,
        'group' => esc_html__('Design Options','book-junky'),
    ));

    vc_add_param('vc_row', array(
        "type" => "textfield",
        "heading" => esc_html__("Opacity", "book-junky"),
        "param_name" => "opacity_gradient",
        'group' => esc_html__('Design Options','book-junky'),
        "description" => esc_html__('Default 1','book-junky'),
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "gradient-color",
            )
        ),
    ));

    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "heading" => esc_html__('Color Gradent 1', 'book-junky'),
        "param_name" => "gradient_color1",
        'group' => esc_html__('Design Options','book-junky'),
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "gradient-color",
            )
        ),
    ));

    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "heading" => esc_html__('Color Gradent 2', 'book-junky'),
        "param_name" => "gradient_color2",
        'group' => esc_html__('Design Options','book-junky'),
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "gradient-color",
            )
        ),
    ));
?>