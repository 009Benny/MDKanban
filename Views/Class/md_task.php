<?php
if(!class_exists('MDTask')):
class MDTask{
  private $title;
  private $date_start;
  private $date_end;
  private $coordinator;
  private $collaborators;
  private $status;
  private $description;
  private $media;
  private $reference;

  function __construct($id = ''){
    if(isset($id) && $id!=null){
      $args = array(
        'p' => $id,
        'post_type'  => 'mdtask'
      );
      $query = new WP_Query($args);
      if($query->have_posts()){
        $post = $query->posts;
        foreach ($products as $product) {

        }
      }
    }
  }

  public function getImage(){
    $arrayImage = array(
      'image_id'  => $this->src_id,
      'src'       => $this->src,
      'width'     => $this->width,
      'height'    => $this->height,
      'type'      => $this->type
    );
    return $arrayImage;
  }

}
endif;
?>
