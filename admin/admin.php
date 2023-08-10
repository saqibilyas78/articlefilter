<?php
defined('ABSPATH') || die();

require_once AF_PLUGIN_DIR_PATH . 'admin/inc/AF_Menu.php';

// Add admin menu
add_action('admin_menu', array('AF_Menu', 'create_menu'));
