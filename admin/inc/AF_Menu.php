<?php
defined('ABSPATH') || die();

class AF_Menu
{

    public static function create_menu()
    {

        $skills = add_menu_page(esc_html__('Article Filter', 'af-filter'), esc_html__('Article Filter', 'af-filter'), AF_ADMIN_CAPABILITY, AF_MENU_SKILLS, array('AF_Menu', 'af_setting'), 'dashicons-buddicons-groups', 26);
        add_action('admin_print_styles-' . $skills, array('AF_Menu', 'menu_page_assets'));

    }

    public static function menu_page_assets()
    {
        // wp_enqueue_style('customcss', WLPC_PLUGIN_URL . 'assets/css/adminstyle.css');
        // wp_enqueue_style('toastr', WLPC_PLUGIN_URL . 'assets/css/toastr.min.css');
        // wp_enqueue_style('jquery-confirm', WLPC_PLUGIN_URL . 'assets/css/jquery-confirm.min.css');

        // // datatables css
        // wp_enqueue_style('dataTables-bootstrap4', WLPC_PLUGIN_URL . 'assets/css/datatable/dataTables.bootstrap4.min.css');
        // wp_enqueue_style('responsive-bootstrap4', WLPC_PLUGIN_URL . 'assets/css/datatable/responsive.bootstrap4.min.css');
        // wp_enqueue_style('jquery-dataTables', WLPC_PLUGIN_URL . 'assets/css/datatable/jquery.dataTables.min.css');
        // wp_enqueue_style('buttons-bootstrap4', WLPC_PLUGIN_URL . 'assets/css/datatable/buttons.bootstrap4.min.css');

        // // datatable js
        // wp_enqueue_script('jquery-dataTables', WLPC_PLUGIN_URL . 'assets/js/datatable/jquery.dataTables.min.js', array('jquery'), true, true);
        // wp_enqueue_script('dataTables-bootstrap4', WLPC_PLUGIN_URL . 'assets/js/datatable/dataTables.bootstrap4.min.js', array('jquery'), true, true);
        // wp_enqueue_script('dataTables-responsive', WLPC_PLUGIN_URL . 'assets/js/datatable/dataTables.responsive.min.js', array('jquery'), true, true);
        // wp_enqueue_script('responsive-bootstrap4', WLPC_PLUGIN_URL . 'assets/js/datatable/responsive.bootstrap4.min.js', array('jquery'), true, true);

        // // Date picker
        // wp_enqueue_script('jquery-ui-datepicker');
        // wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
        // wp_enqueue_style('jquery-ui');

        // wp_enqueue_script('toastr', WLPC_PLUGIN_URL . 'assets/js/toastr.min.js', array('jquery'), true, true);
        // wp_enqueue_script('jquery-confirm', WLPC_PLUGIN_URL . 'assets/js/jquery-confirm.min.js', array('jquery'), true, true);

        // wp_enqueue_script('wlpc-admin', WLPC_PLUGIN_URL . 'assets/js/wlpc-admin.js', array('jquery', 'jquery-form'), '1.6', true);
        // wp_localize_script('wlpc-admin', 'wlpcadminurl', admin_url());
        // wp_localize_script('wlpc-admin', 'wlpcloadingtext', esc_html__('Loading...', 'lesson-planner-system'));

    }

    public function af_setting()
    {
        require_once AF_PLUGIN_DIR_PATH . 'admin/index.php';
    }
}
