<?php
include 'inputs.php';
/*
* Shortcode que crea el formulario para crear tarea
*/
function MDFormTask(){
  $inputs = array();
  $html = '';
  array_push($inputs, AddLabel('title', 'Title:'));//name, placeholder
  array_push($inputs, InputText('title', 'Title'));//name, placeholder
  array_push($inputs, AddLabel('type', 'Tipo:'));//name, placeholder
  array_push($inputs, SelectType());
  array_push($inputs, AddLabel('proyects', 'Proyecto:'));//name, placeholder
  array_push($inputs, InputList('proyects', 'Proyects', 'Selecciona el proyecto'));//name
  array_push($inputs, AddLabel('cordinator', 'Coordinador:'));//name, placeholder
  array_push($inputs, InputList('cordinator', 'Users', 'Selecciona al usuario'));//name
  array_push($inputs, AddLabel('collaborators', 'Colaboradores:'));//name, placeholder
  array_push($inputs, InputList('collaborators', 'Users', 'Selecciona al usuario'));//name
  array_push($inputs, AddLabel('status', 'Status: '));//name, placeholder
  array_push($inputs, SelectStatus());
  array_push($inputs, AddLabel('date_mail', 'Fecha de Recordatorio'));//name, placeholder
  array_push($inputs, InputDate('date_mail'));//name
  array_push($inputs, AddLabel('date_planned', 'Fecha planeada para terminarlo'));
  array_push($inputs, InputDate('date_planned'));
  array_push($inputs, InputTextArea('6','100', 'Escibe los objetivos'));//rows, column, placeholder
  array_push($inputs, InputFile('media'));//name
  array_push($inputs, InputText('reference', 'htt://example.com'));//name, placeholder
  foreach ($inputs as $input) {
    $html = $html.$input;
  }
  $html = FormContainer($html, 'md_task', '');
  $html = CenterContainer($html);
  return $html;
}


?>
