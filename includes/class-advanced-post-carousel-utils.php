<?php
/*
Author: Marcin Gierada
Author URI: http://www.teastudio.pl/
Author Email: m.gierada@teastudio.pl
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Advanced_Post_Carousel_Utils {

	public static function getPosttypes() {
        return get_post_types(array(
            'public'            => 'true',
            'show_in_nav_menus' => true
        ),  'objects');
    }

    public static function getTooltip( $text = null, $type = 'help' ) {
        if( $text == null ) {
            return null;
        }

        if ( in_array( $type, array('help', 'warning') ) ) {
            switch ($type) {
                case 'warning':
                    $type = 'warning';
                    break;
                case 'help':
                default:
                    $type = 'editor-help';
                    break;
            }
        }
        return '<a href="" title="' . $text . '" class="advanced-post-carousel-tooltip tooltip-' . $type . '"><span class="dashicons dashicons-' . $type . '" title="' . __('Hint') . '"></span></a>';
    }

}