<?php
if(!class_exists('MDTask')):
class MDTask{
  private $id;
  private $title;
  private $date_start;
  private $date_end;
  private $manager = array();
  private $partners = array();
  private $objetives = array();
  private $reference;

  function __construct($id = ''){
    if(isset($id) && $id!=null){

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
