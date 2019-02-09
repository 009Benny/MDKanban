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
  return $html;
}

function CreateTableOptions($type){
  $inputs = array();
  $html = '';
  $columns = array('id', 'name');
  $results = '';
  $results = get_columns_task($columns, 'md_user');
  // foreach ($results as $key => $value) {
  //   array_push($inputs, '<h1>'.$value.'</h1></br>');
  // }
  if(is_array($results)){
    // foreach ($results as $key => $value) {
    //   $val = (string)$value;
    //   $html = $html.$val;
    // }
  }else {
    $html = $results;
  }
  // $html = FormContainer($html, 'md_task', '');
  // $html = CenterContainer($html);
  // $html = ModalContainer($html);
  // $html = '<h1>'.count($results).'</h1>';
  return $html;
}



?>
