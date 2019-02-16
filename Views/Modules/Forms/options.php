<?php
/*
* Formulario de Frecuencias
*/
function MDFormOptions($atts, $content = null){
  $args = shortcode_atts(
    array(
      'type' => '',
    ),
  $atts);
  $html = '';
  $html = CreateTableOptions($args['type']);
  $html = addDiv('MDKanban', $html);
  return $html;
}

function CreateTableOptions($type){
  $inputs = array();
  $rows = '';
  $html = '';
  $results = '';
  $columns = array('id', 'name');
  $row = ColumnHeaderContainer('ID').ColumnHeaderContainer('Nombre');
  $rows = $rows.RowContainer($row);
  $results = sql_get_columns($columns, 'md_'.$type);
  foreach ($results as $key => $value) {
    $row = ColumnContainer($value->id).ColumnContainer($value->name);
    $rows = $rows.RowContainer($row);
  }
  $table = TableContainer($rows, 'table-container', 'table-'.$type);
  $html = $table;
  // $html = CenterContainer($table);
  // $html = ModalContainer($html);
  return $html;
}



?>
