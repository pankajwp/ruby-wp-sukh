<?php

vc_add_param("vc_custom_heading", 
	array(
	    'type' => 'img',
	    'heading' => esc_html__( 'Heading Layout', 'book-junky' ),
	    'value' => 
		    array(
		    	'heading-1' => get_template_directory_uri().'/vc_params/images/heading-1.jpg',
		    	'heading-2' => get_template_directory_uri().'/vc_params/images/heading-2.jpg',
		    	'heading-3' => get_template_directory_uri().'/vc_params/images/heading-3.jpg',
		    ),
	    'param_name' => 'heading_layout',
	    "group" => esc_html__("Template", 'book-junky'),
	    'weight' => 1,
	)
);

vc_add_param("vc_custom_heading", 
	array(
	    "type" => "vc_link",
	    "heading" => esc_html__( 'Link Heading', "book-junky" ),
	    "param_name" => "link_heading",
	    "dependency" => array(
            "element" => "heading_layout",
            "value" => array("heading-2","heading-3"),
        ),
        "group" => esc_html__("Template", 'book-junky'),
	)
);



?>