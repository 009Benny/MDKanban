<?php
/* Shortcode que crea el formulario para crear un nuevo usuario*/

function MDFormUser(){
  $AddNew = array();
  $html = '';

  //array_push($input, AddLabel('user', 'User')); //usuario, placeholder
  array_push($AddNew, AddLabel('user','Usuario: ')); //name, placeholder
  array_push($AddNew, InputText('user',' Nuevo usuario')); //name, placeholder
  array_push($AddNew, AddLabel('email','Email:')); //name, placeholder
  array_push($AddNew, InputText('email', ' usuario@servidor.com')); //name,placeholder

  $role = AddLabel('role', 'Puesto: ').SelectPuesto();//prueba
  $save = ButtonSubmitForm('Guardar cambios', 'button-save');
  array_push($AddNew, TwoColumns($role, $save));
  foreach ($AddNew as $Add){
    $html = $html.$Add;
  }
    //agregar Class user
  $html = FormContainer($html,'','');
  $html = CenterContainer($html);
  $html = ModalContainer($html);
  return $html;

}
 ?>
