<?php
include 'labels.php';
/*
* Shortcode que crea el formulario para crear tarea
*/
function MDFormTask(){
  $title = InputText('title', 'Title'); //name,placeholder
  $cordinator = InputListUsers('cordinator');//name campo
  $collaborators = InputListUsers('collaborators');
  $status =
  $html ='
    <label for="date_mail">Fecha de Recordatorio</label>
    <input name="date_mail" type="date">
    <label for="date_planned">Fecha planeada para terminarlo</label>
    <input name="date_planned" type="date">
    <textarea rows="6" cols "100" placeholder="Describe la tarea"></textarea>
    <input type="file" name="media">
    <input type="text" name="reference" placeholder="htt://example.com">

  ';
  $html = FormContainer($html, 'md_task', '');
  $html = CenterContainer($html);
  $html = InputListUsers('prueba');
  return $html;
}


?>
