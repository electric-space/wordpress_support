<?php 


/**
 * social
 * Usage [social acnt="{instagram}"]
 * Accounts are added in the theme settings page, then select which account you want to print
 */

function social_func($atts) {
    
    
    if( $accounts = get_field('social_accounts', 'option') ):
        
        $args = shortcode_atts( array(
            'acnt' => ''
        ), $atts, 'social' );
        
        		
        $social = explode("\n", $accounts);
        
        
        foreach( array_filter($social) as $link )
        {
            $account = array_filter( explode('/', $link) );
            
            $provider = str_ireplace( array('www.','.com'), '', $account[2]);
            
            $user = $account[3];
            
            if( strstr($args['acnt'], $provider ) ) {
                return '<a href="'.$link.'"  target="_blank">'.$user.'</a>';    
            }   
           
        
        }
        
    endif;
}

add_shortcode('social', 'social_func');






/**
 * Phone shortcode
 * Usage [phone icon="true/false"]
 */    

function phone_func( $atts ) {
    $args = shortcode_atts( array(
        'icon' => ''
    ), $atts, 'phone' );

    $args['icon'] = filter_var( $args['icon'], FILTER_VALIDATE_BOOLEAN );
    
    if( $telephone = get_field('phone_number', 'option') ):
    
    
        if ( $args['icon']   )         
        {
            $icon = '<span class="uk-icon-phone"></span>';
            return $icon.$telephone;
        }
        else
        {
            return $telephone;    
        }
        
    endif;
}

add_shortcode('phone', 'phone_func');



/**
 * email shortcode
 * Usage [email icon="true/false"]
 */    

function email_func( $atts ) {
    $args = shortcode_atts( array(
        'icon' => ''
    ), $atts, 'email' );

    $args['icon'] = filter_var( $args['icon'], FILTER_VALIDATE_BOOLEAN );
    
    if( $email = get_field('email', 'option') );
    
    if ( $args['icon']   )         
    {
        $icon = '<span class="uk-icon-envelope"></span>';
        return '<a href="mailto:'.$email.'">'.$icon.$email.'</a>';
    }
    else
    {
        return '<a href="mailto:'.$email.'">'.$email.'</a>';    
    }
}

add_shortcode( 'email', 'email_func' );



/**
 * column shortcode
 * usage [column align="" width=""]
 * 
 * !!!THIS NEEDS WORK!!!
 *
 */
 
function column_func( $atts, $content = null ) {
    
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    
	extract( shortcode_atts( array(
		'align' => '',
		'width' => ''
	), $atts ) );

	return '<div class="page-column '.$align.'" style="width:'.$width.'px">'.
			do_shortcode($content).
			'</div>';
}

add_shortcode( 'column', 'column_func' );



/**
 * Button shortcode
 * usage: [button text="" page="{page name}" size=""]
 */


function button_func( $atts ){
	
	extract( shortcode_atts( array(
		'text' => '',
		'page' => '',
		'size' => '',
	), $atts ) );

	return '<a href="'.get_bloginfo('url').'/'.$page.'/" class="button '.$size.'">'.$text.'</a>';
	
}

add_shortcode( 'button', 'button_func');



