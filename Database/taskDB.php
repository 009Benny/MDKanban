<?php
/*
* Call the create tables
*/
function md_create_tables(){
  create_md_task();
  create_md_user();
  create_md_objective();
}

/*
* Call the deletes tables
*/
function md_remove_tables(){
  remove_md_task('md_task');
  remove_md_task('md_user');
  remove_md_task('md_objective');
}

/*
* Create the md_task en your database
*/
function create_md_objective(){
  global $wpdb;
  $table_name = 'md_objective';
  $sql = "CREATE TABLE `".$table_name."` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(80) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
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
  `rol` VARCHAR(20) NOT NULL,
  `email` VARCHAR(80) NULL,
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
  `type` INT NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `date_start` DATE NOT NULL,
  `date_end` DATE NULL,
  `date_mail` DATE NULL,
  `date_expected` DATE NULL,
  `cordinator` VARCHAR(2) NOT NULL,
  `collaborators` VARCHAR(20) NULL,
  `status` VARCHAR(20) NOT NULL,
  `objectives` VARCHAR(20) NULL,
  `media` VARCHAR(100) NULL,
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
