<?php

/*
* Consulta de Campos de la tabla
*/
function get_columns_task($columns, $table_name){
  if(is_array($columns)){
    $consults = '';
    foreach ($columns as $columns) {
      if(!empty($consults)){
        $cossults = $consults.', ';
      }
      $cossults = $consults.$columns;
    }
  }
  $query = 'SELECT '.$columns.' FROM '.$table_name;
}


?>
