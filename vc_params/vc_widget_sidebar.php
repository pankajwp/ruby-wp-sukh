<?php
    /*
     * VC
     */
    vc_add_param("vc_widget_sidebar", array(
        "type" => "dropdown",
        "heading" => esc_html__("Custom Style", 'book-junky'),
        "param_name" => "el_class",
        "value" => array(
            'None' => '',
            'Padding Left' => 'padding-left',
            'Padding Right' => 'padding-right',
            'Extra Custom Class 1' => 'siderbar-class1', 
            'Extra Custom Class 2' => 'siderbar-class3', 
            'Extra Custom Class 3' => 'siderbar-class3', 
            'Extra Custom Class 4' => 'siderbar-class3', 
            'Extra Custom Class 5' => 'siderbar-class3', 
        ),   
        "description" => 'Select Extra Custom Class (1->5): You user custom class style css: ( siderbar-class1 to siderbar-class5 )',  
    ));