<?php
include 'containers.php';
/*
* Shortcode que crea el formulario para crear tarea
*/
function MDFormTask(){
  $html ='
  <form class="create-task" action="index.html" method="post">
    <input name="title" type="text" placeholder="Title">
    <input name="cordinator" list="cordinator">
      <datalist id="cordinator">
        <option value="Benny Reyes">
        <option value="Alberto Juarez">
        <option value="Nayeli Huerta">
        <option value="Reynaldo Verdugo">
      </datalist>
    <input name="collaborators" list="collaborators">
      <datalist id="cordinator">
        <option value="Benny Reyes">
        <option value="Alberto Juarez">
        <option value="Nayeli Huerta">
        <option value="Reynaldo Verdugo">
      </datalist>
    <select name="status" class="select-status">
      <option value="To-do">Pendiente</option>
      <option value="In-Progress">Progreso</option>
      <option value="Testing/Review">Pruebas</option>
      <option value="Done">Finalizado</option>
    </select>
    <label for="date_mail">Fecha de Recordatorio</label>
    <input name="date_mail" type="date">
    <label for="date_planned">Fecha planeada para terminarlo</label>
    <input name="date_planned" type="date">
    <textarea rows="6" cols "100" placeholder="Describe la tarea"></textarea>
    <input type="file" name="media">
    <input type="text" name="reference" placeholder="htt://example.com">
  </form>
  ';
  $html = CenterContainer($html);
  return $html;
}


?>
