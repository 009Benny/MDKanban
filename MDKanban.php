<?php
/*
* MDKanban
*
* @link              https://milenio.com/
* @since             1.0.0
* @package           MDKanban
*
* @MDKanban
* Plugin Name:       MDKanban
* Plugin URI:        https://github.com/009Benny/MDKanban
* Description:       Plugin de Administracion Kanban para Wordpress
* Version:           1.0
* Author:             © GRUPO MILENIO
* Author URI:        http://www.milenio.com/
* Text Domain:       MDKanban
*/

require_once plugin_dir_path( __FILE__ ) . 'Database/taskDB.php';
require_once plugin_dir_path( __FILE__ ) . 'Database/query.php';
require_once plugin_dir_path( __FILE__ ) . 'Views/Class/md_Table_WP.php';
require_once plugin_dir_path( __FILE__ ) . 'Views/Menu/menu.php';
require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/labels.php';
// require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/Forms/options.php';
// require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/Forms/task.php';
// require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/Forms/user.php';

register_activation_hook( __FILE__, 'md_create_tables' );
// register_deactivation_hook(__FILE__, 'md_remove_tables' );

// add_shortcode('create_task', 'MDFormTask');
// add_shortcode('create_user', 'MDFormUser');
// add_shortcode('create_options', 'MDFormOptions');
// add_shortcode('table_users', 'TableUsers');

/*   AGREGAR CSS     */
function add_kanban_css(){
  wp_register_style( 'MDKanbanStyle', plugin_dir_url( __FILE__ ).'css/main.css', array());
  wp_enqueue_style('MDKanbanStyle');
}
add_action('wp_enqueue_scripts', 'add_kanban_css', 99);
add_action('admin_head', 'add_kanban_css');

/*    AGREGAS JAVASCRIPT    */
function add_MDscript() {
  // wp_enqueue_script('MDKanbanScript',plugin_dir_url( __FILE__ ).'/js/MDShortcodeProduct.js', array('jquery'));
  wp_enqueue_script('MDKanbanInputs',plugin_dir_url( __FILE__ ).'/js/Groups/Inputs.js', array('jquery'));
  wp_localize_script('MDKanbanInputs', 'obj_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'add_MDscript');
add_action('admin_head', 'add_MDscript');

/*     AGREGAR FUNCIONES PHP A AJAX     */
add_action('wp_ajax_InsertMDUser', 'InsertMDUser');
add_action('wp_ajax_PrintUserForm', 'PrintUserForm');
/*DESCOMENTAR SOLO SI CUALQUIERA PUEDE AGREGAR USUARIOS*/
add_action('wp_ajax_nopriv_InsertMDUser', 'InsertMDUser');
add_action('wp_ajax_nopriv_PrintUserForm', 'PrintUserForm');

//Crear menú de administración del plugin MDKanban

add_action('admin_menu','MDKanban_admin_menu');

?>
