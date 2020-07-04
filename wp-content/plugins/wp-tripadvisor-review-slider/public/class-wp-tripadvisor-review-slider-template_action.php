<?php # -*- coding: utf-8 -*-

add_action( 'init', array ( 'WPrev_TA_Plugin_Action', 'init' ) );

class WPrev_TA_Plugin_Action
{
    /**
     * Creates a new instance.
     *
     * @wp-hook init
     * @see    __construct()
     * @return void
     */
    public static function init()
    {
        new self;
    }

    /**
     * Register the action. May do more magic things.
     */
    public function __construct()
    {
        add_action( 'wprev_tripadvisor_plugin_action', array ( $this, 'wptripadvisor_slider_action_print' ), 10, 1 );
    }

    /**
     * Prints out reviews
     *
     * Usage:
     *    <code>do_action( 'wprev_tripadvisor_plugin_action', 1 );</code>
     *	
     * @wp-hook wprev_tripadvisor_plugin_action
     * @param int $templateid
     * @return void
     */
    public function wptripadvisor_slider_action_print( $templateid = 0 )
    {
		$a['tid']=$templateid;
		if($templateid>0){
		//ob_start();
		include plugin_dir_path( __FILE__ ) . 'partials/wp-tripadvisor-review-slider-public-display.php';
		//return ob_get_clean();
		}
    }
}