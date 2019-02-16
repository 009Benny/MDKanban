<?php

/*
* Consulta de Campos de la tabla
*/
if(!function_exists('sql_get_columns')){
  function sql_get_columns($columns = '', $table_name = '', $parameters = ''){
    global $wpdb;
    $result = '';
    $paramsVal = false;
    foreach ($parameters as $key => $value) {
      if(!empty($value)){
        $paramsVal = true;
        break;
      }
    }
    if(!empty($columns) && !empty($table_name)){
      if(is_array($columns)){
        $consults = '';
        foreach ($columns as $key => $value) {
          if(!empty($consults)){
            $consults = $consults.', ';
          }
          $consults = $consults.$value;
        }
      }else{
        $consults = $columns;
      }
      $sql = 'SELECT '.$consults.' FROM '.$table_name;
      if ($paramsVal == true) {
        $options = '';
        $options = md_transform_parameters($parameters);
        $sql = $sql.' '.$options;
      }
      $result = $wpdb->get_results($sql);
    }
    // echo json_encode($result);
    return $result;
  }
}

if(!function_exists('sql_insert_values')){
  function sql_insert_values($rows, $table_name){
    global $wpdb;
    $result = '';
    if(!empty($rows) && !empty($table_name) && is_array($rows)){
      $fields = '';
      $values = '';
      foreach ($rows as $key => $value) {
        if(!empty($fields)){
          $fields = $fields.', ';
          $values = $values.', ';
        }
        $fields = $fields.$key;
        $fields = $fields.'`'.$values.'`';
      }
      $sql = 'INSERT INTO '.$table_name.' ('.$fields.') VALUES ('.$values.')';
      // $result = $wpdb->get_results($sql);
      echo $sql;
    }
    return $result;
  }
}

if(!function_exists('md_transform_params')){
  function md_transform_parameters($params){
    $options = '';
    if(is_array($params)){
      foreach ($params as $key => $value) {
        switch ($key) {
          case 'orderby':
          $case = 'ORDER BY '.$value;
          if (isset($params['order'])) {
            $case = $case.' '.$params['order'];
          }
            break;
          default:
            $case = '';
            break;
        }
        $options = $options.' '.$case;
      }
    }
    return $options;
  }
}

?>
