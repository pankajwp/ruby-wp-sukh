<?php
    /*
     * VC
     */
    vc_add_param("vc_column", array(
        "type" => "dropdown",
        "heading" => esc_html__("Custom Style", 'book-junky'),
        "param_name" => "el_class",
        "value" => array(
            'None' => '',
            'Column Padding Left' => 'column-left',
            'Column Padding Right' => 'column-right',
            'Column Menu Shortcode Left' => 'column-sc-left',
            'Column Menu Shortcode Right' => 'column-sc-right',
            'Column Content Shortcode Left' => 'column-ct-left',
            'Column Content Shortcode Right' => 'column-ct-right',
            'Column Content Width Fill' => 'column-fill',
            'Column Widget Left' => 'column-wg-left',
            'Column Widget Right' => 'column-wg-right',
            'Column Content Left' => 'column-cont-left',
            'Column Content Right' => 'column-cont-right',
            'Extra Custom Class 1' => 'row-class1', 
            'Extra Custom Class 2' => 'row-class3', 
            'Extra Custom Class 3' => 'row-class3', 
            'Extra Custom Class 4' => 'row-class3', 
            'Extra Custom Class 5' => 'row-class3', 
        ),   
        "description" => 'Select Extra Custom Class (1->5): You user custom class style css: ( row-class1 to row-class5 )',  
    ));
?>