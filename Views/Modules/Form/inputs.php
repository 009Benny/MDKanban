<?php
  function AddLabel($name, $text){
    return '<label for="'.$name.'">'.$text.'</label>';
  }

  function CenterContainer($content){
    return '<div class="center-container">'.$content.'</div>';
  }

  function FormContainer($content, $name, $actionRute = ''){
    return '<form class="'.$name.'" action="'.$actionRute.'" method="post">'.$content.'</form>';
  }

  function InputText($name, $placeholder=''){
    return '<input name="'.$name.'" type="text" placeholder="'.$placeholder.'">';
  }

  function InputTextArea($rows = '4', $cols = '100', $placeholder = 'Escribe aqui ...'){
    return '<textarea rows="'.$rows.'" cols "'.$cols.'" placeholder="'.$placeholder.'"></textarea>';
  }

  function InputDate($name){
    return '<input name="'.$name.'" type="date">';
  }

  function InputFile($name){
    return '<input type="file" name="'.$name.'">';
  }

  function SelectStatus(){
    $html = '<select name="status" class="select-status">
      <option value="To-do">Pendiente</option>
      <option value="In-Progress">Progreso</option>
      <option value="Testing/Review">Pruebas</option>
      <option value="Done">Finalizado</option>
    </select>';
    return $html;
  }

  function SelectType(){
    $html = '<select name="type" class="select-type">
      <option value="1">Proyecto</option>
      <option value="2">Tarea</option>
    </select>';
    return $html;
  }


  function InputList($name, $type, $placeholder = ''){
    $html = '<input name="'.$name.'" list="'.$name.'" placeholder="'.$placeholder.'"><datalist id="'.$name.'">';
    switch ($type) {
      case 'Users':
        $args = array(
          'order' => 'ASC'
        );
        $user_query = new WP_User_Query($args);
        foreach ($user_query->get_results() as $user) {
          $meta = get_user_meta($user->ID);
          $name = $meta['first_name'][0].$meta['last_name'][0];
          $html = $html.'<option value="'.$name.'">';
        }
        break;

      case 'Proyects':
        $html = $html.'<option value="prueba1">';
        $html = $html.'<option value="prueba2">';
        $html = $html.'<option value="prueba3">';
        $html = $html.'<option value="prueba4">';
        $html = $html.'<option value="prueba5">';
        break;

      default:
        break;
    }

    $html = $html.'</datalist>';
    return $html;
  }

?>
