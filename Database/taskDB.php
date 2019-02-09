<?php
/*
* Call the create tables
*/
function md_create_tables(){
  // TABLAS PRINCIPALES
  create_md_task();
  create_md_user();
  create_md_objetive();
  // TABLAS FORANEAS
  create_task_managers();
  create_task_objective();
  create_task_collaborators();
  // TABLAS DE OPCIONES
  create_info_container('md_role');
  create_info_container('md_frecuency');
  create_info_container('md_status');
}

/*
* Call the deletes tables
*/
function md_remove_tables(){
  // TABLAS PRINCIPALES
  remove_table('md_task');
  remove_table('md_user');
  remove_table('md_objetive');
  // TABLAS FORANEAS
  remove_table('md_frecuency');
  remove_table('md_role');
  remove_table('md_status');
  //TABLAS DE OPCIONES
  remove_table('md_task_collaborators');
  remove_table('md_task_managers');
  remove_table('md_task_objective');
  remove_table('md_objective');

}

/*          INFO-CONTAINERS TABLES          */

/*
* Create the md_role en your database
*/
function create_info_container($table_name){
  global $wpdb;
  $sql = "CREATE TABLE `".$table_name."` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}

/*          FOREGIN KEY TABLES          */

/*
* CREATE FOREGIN KEY
*/
function create_foreign_key(){
  global $wpdb;
  $table_name = 'md_task_managers';
  $sql = "ALTER TABLE `".$table_name."` ADD CONSTRAINT FK_PersonOrder";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}


/*
* Create the task-managers en your database
*/
function create_task_managers(){
  global $wpdb;
  $table_name = 'md_fk_managers';
  $sql = "CREATE TABLE `".$table_name."` (
  `id_task` INT NOT NULL,
  `id_user` INT NOT NULL,
  FOREIGN KEY (`id_task`) REFERENCES `md_task`(`id`),
  FOREIGN KEY (`id_user`) REFERENCES `md_user`(`id`));
  ";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}

/*
* Create the task-collaborators en your database
*/
function create_task_collaborators(){
  global $wpdb;
  $table_name = 'md_fk_collaborators';
  $sql = "CREATE TABLE `".$table_name."` (
  `id_task` INT NOT NULL,
  `id_user` INT NOT NULL,
  FOREIGN KEY (`id_task`) REFERENCES `md_task`(`id`),
  FOREIGN KEY (`id_user`) REFERENCES `md_user`(`id`));
  ";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}

/*
* Create the task-objective en your database
*/
function create_task_objective(){
  global $wpdb;
  $table_name = 'md_fk_objective';
  $sql = "CREATE TABLE `".$table_name."` (
  `id_task` INT NOT NULL,
  `id_objetive` INT NOT NULL,
  FOREIGN KEY (`id_task`) REFERENCES `md_task`(`id`),
  FOREIGN KEY (`id_objetive`) REFERENCES `md_objetive`(`id`));
  ";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}

/*         TABLAS PRINCIPALES          */

/*
* Create the md_task en your database
*/
function create_md_objetive(){
  global $wpdb;
  $table_name = 'md_objetive';
  $sql = "CREATE TABLE `".$table_name."` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_frecuency` INT NOT NULL,
  `title` VARCHAR(80) NOT NULL,
  `description` VARCHAR(255) NULL,
  `date_expected` DATE NULL,
  `id_status` INT NOT NULL,
  PRIMARY KEY (`id`));";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}


/*
* Create the md_task en your database
*/
function create_md_user(){
  global $wpdb;
  $table_name = 'md_user';
  $sql = "CREATE TABLE `".$table_name."` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `id_role` VARCHAR(3) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id`));";
  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}

/*
* Create the md_task en your database
*/
function create_md_task(){
  global $wpdb;
  $table_name = 'md_task';
  $sql = "CREATE TABLE `".$table_name."` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `date_start` DATE NOT NULL,
  `date_end` DATE NULL,
  -- `manager` VARCHAR(2) NOT NULL,
  -- `collaborators` VARCHAR(20) NULL,
  -- `status` VARCHAR(20) NOT NULL,
  -- `objetives` VARCHAR(20) NULL,
  `reference` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));";

  //upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //creamos la tabla
  dbDelta($sql);
}


/*
* @description Función que se ejecuta al desactivar el plugin
*/
function remove_table($table_name){
    global $wpdb;
    //sql con el statement de la tabla
    $sql = "DROP table IF EXISTS $table_name";
    $wpdb->query($sql);
}
?>
