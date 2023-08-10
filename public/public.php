<?php
defined('ABSPATH') || die();

require_once AF_PLUGIN_DIR_PATH . 'includes/helpers/AF_Helper.php';
require_once AF_PLUGIN_DIR_PATH . 'includes/constants.php';
require_once AF_PLUGIN_DIR_PATH . 'public/inc/AF_Shortcode.php';

// Add shortcodes
add_shortcode('article-filter', array('AF_Shortcode', 'articleFilter'));
