<?php

/*
* Consulta de Campos de la tabla
*/
if(!function_exists('get_columns_task')){
  function get_columns_task($columns, $table_name){
    global $wpdb;
    $result = '';
    if(!empty($columns) && !empty($table_name)){
      $result = $columns;
      if(is_array($columns)){
        $consults = '';
        foreach ($columns as $key => $value) {
          if(!empty($consults)){
            $consults = $consults.', ';
          }
          // $consults = $consults.'`'.$value.'`';
          $consults = $consults.$value;
        }
      }else{
        $consults = $columns;
      }
      $sql = 'SELECT '.$consults.' FROM '.$table_name;
      // $sql = "SELECT * FROM `".$table_name."`";
      $result = $wpdb->get_results($sql);
      print_r($result);
    }
    // $result = $sql;
    return $result;
  }
}



?>
