<?php
/* MENU MDKANBAN PLUGIN */
function MDKanban_admin_menu()
{
  //add_menu_page(page_title,menu_title,capability,menu_slug, function, icon_url,position)
  add_menu_page('MDMenuKanban','Milenio Tareas','manage_options','MDKanbanPrincipal','MDKanban_admin_menu_function','dashicons-sticky');
  // add_submenu_page('MDKanban_plugin','MDKanban Task','Task','manage_options','MDkanban_task_submenu','MDKanban_task_function');
  // add_submenu_page('MDKanban_plugin','MDKanban Users','Users','manage_options','MDkanban_users_submenu','MDKanban_users_function');
  // add_submenu_page('MDKanban_plugin','MDKanban Roles','Roles','manage_options','MDKanban_roles_submenu','MDKanban_roles_function');
  // add_submenu_page('MDKanban_plugin','MDKanban Status','Status','manage_options','MDkanban_status_submenu','MDKanban_status_function');
  // add_submenu_page('MDKanban_plugin','MDKanban Frecuency','Frecuency','manage_options','MDkanban_frecuency_submenu','MDKanban_frecuency_function');
}

//Pagina Inicial
function MDKanbanIndex(){

}

function MDKanban_admin_menu_function(){
}

function MDKanban_task_function(){
  $action = (isset($_GET['action'])) ? $_GET['action'] : '';
  $table_name = 'md_task';
  $columns = array(
    "id" => "ID",
    "title" => "Nombre",
    'date_start' => "Fecha de Inicio",
    'date_end' => "Fecha de Fin",
    "manager" => "Responsable",
    "collaborators" => "Colaboradores",
    "status" => "Estado",
    "objetives" => "Tareas",
    "reference" => "Referencia",
  );
  echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
  switch ($action) {
    case 'md-edit':
      echo MDFormTask();
      break;

    case 'md-delete':
      echo "Eliminar Pendiente";
      break;

    default:
      md_createTable($table_name, $columns);
      break;
  }
}

function MDKanban_users_function(){
  $action = (isset($_GET['action'])) ? $_GET['action'] : '';
  $table_name = 'md_user';
  $columns = array(
    "id" => "ID",
    "name" => "Nombre",
    "id_role" => "Rol",
    "email" => "Correo electronico",
  );
  echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
  switch ($action) {
    case 'md-edit':
      echo MDFormTask();
      break;

    case 'md-delete':
      echo "Eliminar Pendiente";
      break;

    default:
      md_createTable($table_name, $columns);
      break;
  }
}

function MDKanban_roles_function(){
  $table_name = 'md_role';
  $columns = array(
    "id" => "ID",
    "name" => "Slug",
  );
  echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
  switch ($action) {
    case 'md-edit':
      echo MDFormTask();
      break;

    case 'md-delete':
      echo "Eliminar Pendiente";
      break;

    default:
      md_createTable($table_name, $columns);
      break;
  }
}
function MDKanban_status_function(){
  $table_name = 'md_status';
  $columns = array(
    "id" => "ID",
    "name" => "Slug",
  );
  echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
  switch ($action) {
    case 'md-edit':
      echo MDFormTask();
      break;

    case 'md-delete':
      echo "Eliminar Pendiente";
      break;

    default:
      md_createTable($table_name, $columns);
      break;
  }
}

function MDKanban_frecuency_function(){
  echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
  $table_name = 'md_frecuency';
  $columns = array(
    "id" => "ID",
    "name" => "Slug",
  );
  echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
  switch ($action) {
    case 'md-edit':
      echo MDFormTask();
      break;

    case 'md-delete':
      echo "Eliminar Pendiente";
      break;

    default:
      md_createTable($table_name, $columns);
      break;
  }
}

?>
