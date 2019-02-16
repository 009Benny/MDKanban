<?php
if (! class_exists ('WP_List_Table')){
  require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}
if (! class_exists ('MDKanbanTable')){
  class MDKanbanTable extends WP_List_Table {

    public function md_prepare_items($table_name = '', $columns = ''){
      // ORDENAR FILAS POR
      $params = array();
      $params['orderby'] = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
      $params['order'] = isset($_GET['order']) ? trim($_GET['order']) : "";
      // BUSCAR RESULTADOS
      $params['s'] = isset($_POST['s']) ? trim($_POST['s']) : "";
      //HACER CONSULTA A LA BASE DE DATOS
      $columns_key = array();
      foreach ($columns as $key => $value) {
        array_push($columns_key, $key);
      }
      $results = sql_get_columns($columns_key, $table_name, $params);
      $this->items = $this->transform_result($results);
      //TRAER COLUMNAS
      $columns = $this->md_get_columns($columns);
      //TRAER UN ARRAY CON LAS COLUMNAS QUE SE QUIEREN OCULTAR
      $hidden = $this->get_hidden_columns();
      //TRAER UN ARRAY CON LAS COLUMNAS QUE AL DAR CLIC AL NOMBRE
      //DE LA COLUMNA, CAMBIE DE ORDEN ASCENDENTE, DESCENDENTE, O
      //NORMAL
      $sortable = $this->get_sortable_columns();
      $this->_column_headers = array($columns, $hidden, $sortable);
    }

    public function prepare_items(){
      // ORDENAR FILAS POR
      $orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
      $order = isset($_GET['order']) ? trim($_GET['order']) : "";
      // BUSCAR RESULTADOS
      $search_term = isset($_POST['s']) ? trim($_POST['s']) : "";
      //HACER CONSULTA A LA BASE DE DATOS
      $results = sql_get_columns('*', 'wp_post');
      $this->items = $this->transform_result($results);
      //TRAER COLUMNAS
      $columns = $this->get_columns();
      //TRAER UN ARRAY CON LAS COLUMNAS QUE SE QUIEREN OCULTAR
      $hidden = $this->get_hidden_columns();
      //TRAER UN ARRAY CON LAS COLUMNAS QUE AL DAR CLIC AL NOMBRE
      //DE LA COLUMNA, CAMBIE DE ORDEN ASCENDENTE, DESCENDENTE, O
      //NORMAL
      $sortable = $this->get_sortable_columns();
      $this->_column_headers = array($columns, $hidden, $sortable);
    }
    public function transform_result($all_posts){
      $posts_array = array();
      if (count($all_posts) > 0) {

          foreach ($all_posts as $index => $post) {
            //posibles entradas
            $posts_array[] = array(
                "id" => $post->id,
                "title" => $post->title,
                "date_start" => $post->date_start,
                "date_end" => $post->date_end,
                "manager" => $post->manager,
                "collaborators" => $post->collaborators,
                "status" => $post->status,
                "objetives" => $post->objetives,
                "reference" => $post->reference,
                "name" => $post->name,
                "id_role" => $post->id_role,
                "email" => $post->email,
            );
          }
      }
      return $posts_array;
    }
    //function default
    public function get_columns(){
    }

    public function md_get_columns($columns) {
        $array_columns = array();
        $array_columns['cb'] = '<input type="checkbox"/>';
        foreach ($columns as $key => $value) {
          $array_columns[$key] = $value;
        }
        return $array_columns;
    }

    public function get_bulk_actions(){
      $actions = array(
        'delete' => 'Eliminar',
        'edit'   => 'Edit',
      );
      return $actions;
    }

    public function get_hidden_columns() {
        return array("id");
    }

    public function get_sortable_columns() {
        return array(
            "id" => array("id", true),
            "name" => array("name", false),
            "title" => array("title", false),
        );
    }

    public function column_default($item, $column_name) {
      $params['orderby'] = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
      return $item[$column_name] = (isset($item[$column_name])) ? $item[$column_name] : "NULL";
    }

    function column_cb($item){
      return sprintf(
        '<input type="checkbox" name="type[]" value="%s"/>',$item['ID']
      );
    }

    function column_title($item){
      return $this->md_editOrDelete($item);
    }

    // function column_name($item){
    //   return $this->md_editOrDelete($item);
    // }


    function md_editOrDelete($item){
      $action = array(
        'edit'=>sprintf('<a href="?page=%s&action=%s&post_id=%s">Edit</a>',$_GET['page'], 'md-edit', $item['id']),
        'delete'=>sprintf('<a href="?page=%s&action=%s&post_id=%s">Delete</a>',$_GET['page'], 'md-delete', $item['id']),
      );
      return sprintf('%1$s %2$s', $item['title'],$this->row_actions($action));
    }

  }
}

function md_createTable($table_name, $columns){
  ob_start();
  $owt_table = new MDKanbanTable();
  $owt_table->md_prepare_items($table_name, $columns);
  echo "<form method='post' name='frm_search_post' action='" . $_SERVER['PHP_SELF'] . "?page=owt-list-table'>";
  $owt_table->search_box("Search Post(s)", "search_post_id");
  echo "</form>";

  $owt_table->display();
  $template = ob_get_contents();
  ob_end_clean();
  echo $template;
}
?>
