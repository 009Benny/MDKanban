<?php
/*  INSERTAR UN USUARIO A LA BASE DE DATOS */
function InsertMDUser(){
  if(isset($_REQUEST)){
    $id_product = $_REQUEST['data'];
    print_r($_REQUEST['data']);
  }
  print_r($_REQUEST);
  die();
}

function PrintUserForm(){
  if(isset($_REQUEST)){
    $id_product = $_REQUEST['data'];
    // print_r($_REQUEST['data']);
  }
  echo "hola";
  die();
}

/* CREA EL FOMULARIO PARA CREAR UN NUEVO USUARIO     */
function MDFormUser(){
  $AddNew = array();
  $html = '';

  //array_push($input, AddLabel('user', 'User')); //usuario, placeholder
  array_push($AddNew, AddLabel('user','Usuario: ')); //name, placeholder
  array_push($AddNew, InputText('user',' Nuevo usuario')); //name, placeholder
  array_push($AddNew, AddLabel('email','Email:')); //name, placeholder
  array_push($AddNew, InputText('email', ' usuario@servidor.com')); //name,placeholder

  $role = AddLabel('role', 'Puesto: ').SelectPuesto();//prueba
  $save = ButtonSubmitForm('Guardar cambios', 'create_user', 'create_user');
  // $save = ButtonId('Guardar cambios', 'create_user');
  array_push($AddNew, TwoColumns($role, $save));
  foreach ($AddNew as $Add){
    $html = $html.$Add;
  }
    //agregar Class user
  $html = FormContainer($html,'create_user','create_user');
  $html = CenterContainer($html);
  $html = ModalContainer($html);
  $html = addDiv('MDKanban', $html);
  return $html;

}

/* GENERA LA TABLA DE USUARIO CON LA BASE DE DATOS */
function TableUsers(){
  $inputs = array();
  $rows = '';
  $html = '';
  $results = '';
  $columns = array('id', 'name', 'email', 'id_role');
  $row = ColumnHeaderContainer('ID')
  .ColumnHeaderContainer('Nombre')
  .ColumnHeaderContainer('Correo')
  .ColumnHeaderContainer('Rol');
  $rows = $rows.RowContainer($row);
  $results = sql_get_columns($columns, 'md_user');
  foreach ($results as $key => $value) {
    $row = ColumnContainer($value->id).
    ColumnContainer($value->name).
    ColumnContainer($value->email).
    ColumnContainer($value->id_role);
    $rows = $rows.RowContainer($row);
  }
  $table = TableContainer($rows, 'table-container', 'table-user');
  $html = $table;
  // $html = CenterContainer($table);
  // $html = ModalContainer($html);
  return $html;
}

 ?>
