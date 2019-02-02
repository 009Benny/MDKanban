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

  function InputListUsers($name){
    $html = '<input name="'.$name.'" list="'.$name.'" placeholder="Selecciona al usuario"><datalist id="'.$name.'">';
    $args = array(
      'order' => 'ASC'
    );
    $user_query = new WP_User_Query($args);
    foreach ($user_query->get_results() as $user) {
      $meta = get_user_meta($user->ID);
      $name = $meta['first_name'][0].$meta['last_name'][0];
      $html = $html.'<option value="'.$name.'">';
    }
    $html = $html.'</datalist>';
    return $html;
  }

  function SelectStatus(){
    // $html '<select name="status" class="select-status">
    //   <option value="To-do">Pendiente</option>
    //   <option value="In-Progress">Progreso</option>
    //   <option value="Testing/Review">Pruebas</option>
    //   <option value="Done">Finalizado</option>
    // </select>';
    return '$html';
  }

?>
