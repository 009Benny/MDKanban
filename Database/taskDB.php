<?php


/*
* description Función que crea las tablas en la activación del plugin
*/
function md_create_tables(){
  global $wpdb;
  $table_name = 'md_task';
  $sql = "CREATE TABLE `".$table_name."` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `date_start` DATE NOT NULL,
  `date_end` DATE NULL,
  `date_mail` DATE NULL,
  `date_end` DATE NULL,
  `cordinator` VARCHAR(45) NOT NULL,
  `collaborators` VARCHAR(45) NULL,
  `status` VARCHAR(20) NOT NULL,
  `description` VARCHAR(250) NULL,
  `media` VARCHAR(150) NULL,
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
function _remove_tables(){
    global $wpdb;
    $table_name = $table_name = 'md_task';
    //sql con el statement de la tabla
    $sql = "DROP table IF EXISTS $table_name";
 $wpdb->query($sql);
}
?>
