<?php
defined('ABSPATH') || die();

class AF_Shortcode
{
    public static function articleFilter($attr)
    {
        self::enqueue_assets();
        ob_start();
        return require_once AF_PLUGIN_DIR_PATH . 'public/inc/filter/route.php';
    }

    public static function enqueue_assets()
    {
        wp_enqueue_style('af_bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css");
        wp_enqueue_style('af_custom_style', AF_PLUGIN_URL . "assets/css/style.css");
        wp_enqueue_style('af_datepicker_style', "//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css");

        wp_enqueue_script('af_jquery', "//cdn.jsdelivr.net/jquery/1/jquery.min.js");
        wp_enqueue_script('af_moment', "//cdn.jsdelivr.net/momentjs/latest/moment.min.js");
        wp_enqueue_script('af_datepicker_js', "//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js");
    }

    public static function enqueue_assets_cms()
    {

    }
}
