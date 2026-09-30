<?php
/**
 * Plugin Name:       GS Nepali Date
 * Plugin URI:        https://www.greativesoft.com
 * Description:       Nepali Date By Greative Soft
 * Version:           0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Suman Khadka
 * Author URI:        https://www.greativesoft.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gs-plugin
 */
if ( !function_exists( 'add_action' ) ) {
	exit;
}
define( 'GSNEPALIDATE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( GSNEPALIDATE__PLUGIN_DIR . 'class.nepali-date.php' );

if( ! function_exists( 'get_nepali_post_date' )) {

	function get_nepali_post_date( $post_date ,$cformat='' ) {

		$default_opts = array(
            'active' => array( 'date' => true, 'time' => false ),
            'date_format' => 'd m y, l',
            'custom_date_format' => $cformat
        );

        $default_opts = apply_filters( 'npd_modify_default_opts', $default_opts );
        $opts = get_option( 'npd_opts', $default_opts );
        $post_date = ( !empty( $post_date ) ) ? strtotime( $post_date ) : time();
        $date = new Nepali_Date();
        $nepali_calender = $date->eng_to_nep( date( 'Y', $post_date ), date( 'm', $post_date ), date( 'd', $post_date ), date( 'H', $post_date ), date( 'i', $post_date ) );
        $nepali_year = $date->convert_to_nepali_number( $nepali_calender['year'] );
        $nepali_month = $nepali_calender['nmonth'];
        $nepali_day = $nepali_calender['day'];
        $nepali_date = $date->convert_to_nepali_number( $nepali_calender['date'] );
        $nepali_hour = $date->convert_to_nepali_number( date( 'H', $post_date ));
        $nepali_minute = $date->convert_to_nepali_number( date( 'i', $post_date ) );

        if ( $opts['custom_date_format'] ) {
            $format = $opts['custom_date_format'];
        } else {
            $format = $opts['date_format'];
        }

        $converted_date = str_replace( array( 'l', 'd', 'm', 'y','H','i' ), array( $nepali_day, $nepali_date, $nepali_month, $nepali_year ), $format );
        if ( $opts['active']['time'] ) {
            $converted_date .= ' ' . $nepali_hour . ':' . $nepali_minute;
        }

        return $converted_date;
	}
}

if( ! function_exists( 'get_nepali_today_date' )) {

    function get_nepali_today_date() {

        $default_opts = array(
            'date_format' => ' d m y, l',
            'today_date_format' => ''
        );

        $default_opts = apply_filters( 'npd_modify_default_opts', $default_opts );
        $opts = get_option( 'npd_opts', $default_opts );
        $post_date = time();
        $date = new Nepali_Date();
        $nepali_calender = $date->eng_to_nep( date( 'Y', $post_date ), date( 'm', $post_date ), date( 'd', $post_date ) );
        $nepali_year = $date->convert_to_nepali_number( $nepali_calender['year'] );
        $nepali_month = $nepali_calender['nmonth'];
        $nepali_day = $nepali_calender['day'];
        $nepali_date = $date->convert_to_nepali_number( $nepali_calender['date'] );

        if ( $opts['today_date_format'] ) {
            $format = $opts['today_date_format'];
        } else {
            $format = $opts['date_format'];
        }

        $converted_date = str_replace( array( 'l', 'd', 'm', 'y' ), array( $nepali_day, $nepali_date, $nepali_month, $nepali_year ), $format );

        return $converted_date;
    }
}
if( ! function_exists( 'get_nepali_ago' )) {
    function get_nepali_ago($post_date) {
        //print_r($post_date);
        $agadi=human_time_diff($post_date,current_time( 'U' ));
        $date = new Nepali_Date();

        $agadi=$date->convert_to_nepali_secandmin($agadi);

        $agadi=$date->convert_to_nepali_number($agadi);

        

        return $agadi;
    }
}