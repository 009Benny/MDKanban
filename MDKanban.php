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
require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/labels.php';
require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/Forms/options.php';
require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/Forms/task.php';
require_once plugin_dir_path( __FILE__ ) . 'Views/Modules/Forms/user.php';
require_once plugin_dir_path( __FILE__ ) . 'Database/query.php';

register_activation_hook( __FILE__, 'md_create_tables' );
register_deactivation_hook(__FILE__, 'md_remove_tables' );

add_shortcode('create_task', 'MDFormTask');
add_shortcode('create_user', 'MDFormUser');
add_shortcode('create_options', 'MDFormOptions');

//Agregar css
function add_kanban_css(){
  wp_register_style( 'MDKanban', plugin_dir_url( __FILE__ ).'css/main.css', array());
  wp_enqueue_style('MDKanban');
}
add_action('wp_enqueue_scripts', 'add_kanban_css');



?>
