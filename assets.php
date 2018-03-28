<?php

/**
 * These need to be added to the themes enqueue function
 */
 

    
    $txtdomain = '';
    
    //CSS
	wp_enqueue_style( "$txtdomain-uikit", '//cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/uikit.css', 0, 0, 'screen');
	wp_enqueue_style( "$txtdomain-style-less", get_template_directory_uri().'/style.less', 0, 0, 'screen');
                    
    // SCRIPT
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js', array(), 0, 1);
	wp_enqueue_script( "$txtdomain-uikt", '//cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/uikit.min.js', array('jquery'), 0, 1);

	wp_enqueue_script( "$txtdomain-main", get_template_directory_uri().'/wordpress_support/js/main.js', array('jquery'), 0, 1);
	
	
	if( is_front_page() )
	{
        wp_enqueue_style('slideshow',  '//cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/components/slideshow.min.css');
        wp_enqueue_script('slideshow', '//cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/slideshow.min.js', 0, 0, 1);
        wp_enqueue_script('lightbox',  '//cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/lightbox.min.js', 0, 0, 1);
        wp_enqueue_style('slidenav',   '//cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/components/slidenav.min.css');
  	
	}