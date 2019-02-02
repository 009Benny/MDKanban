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

require_once plugin_dir_path( __FILE__ ) . '/Database/taskDB.php';
// require_once plugin_dir_path( __FILE__ ) . '/Shortcodes/task.php';

register_activation_hook( __FILE__, 'md_create_tables' );
// register_deactivation_hook(__FILE__, 'md_remove_tables' );

// add_shortcode('create_task', 'MDFormTask');





?>
