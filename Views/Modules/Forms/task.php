<?php
/*
* Shortcode que crea el formulario para crear tarea
*/
function MDFormTask(){
  $inputs = array();
  $html = '';
  array_push($inputs, AddLabel('title', 'Title:'));//name, placeholder
  array_push($inputs, InputText('title', 'Title'));//name, placeholder
  $cordinator = AddLabel('cordinator', 'Coordinador:').InputList('cordinator', 'Users', 'Selecciona al usuario');
  $collaborators = AddLabel('collaborators', 'Colaboradores:').InputList('collaborators', 'Users', 'Selecciona al usuario');
  array_push($inputs, TwoColumns($cordinator, $collaborators));
  array_push($inputs, AddLabel('', 'Descripción: '));//name, placeholder
  array_push($inputs, InputTextArea('6','100', 'Escibe los objetivos'));//rows, column, placeholder
  $remember = AddLabel('date_mail', 'Fecha de Recordatorio').InputDate('date_mail');
  $expected = AddLabel('date_planned', 'Fecha planeada para terminarlo').InputDate('date_planned');
  array_push($inputs, TwoColumns($remember, $expected));
  array_push($inputs, AddLabel('reference', 'Link del proyecto(opcional)'));//name, placeholder
  array_push($inputs, InputText('reference', 'htt://example.com'));//name, placeholder
  $status = AddLabel('status', 'Status: ').SelectStatus();
  $save = ButtonId('Guardar cambios', 'task');
  array_push($inputs, TwoColumns($status, $save));
  foreach ($inputs as $input) {
    $html = $html.$input;
  }
  $html = FormContainer($html, 'md_task', '');
  $html = CenterContainer($html);
  $html = addDiv('MDKanban', $html);
  return $html;
}


?>
