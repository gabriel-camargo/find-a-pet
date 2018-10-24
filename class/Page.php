<?php

namespace FindAPet;

use Rain\Tpl;

class Page{

  private $tpl;

  public function __construct($tpl_dir = "views"){

  	$config = array(
    	"tpl_dir"       => "." . DIRECTORY_SEPARATOR . $tpl_dir . DIRECTORY_SEPARATOR,
    	"cache_dir"     => "." . DIRECTORY_SEPARATOR . "views-cache" . DIRECTORY_SEPARATOR,
    	"debug"         => false // set to false to improve the speed
  	);

  	Tpl::configure( $config );

    $this->tpl = new Tpl;
  }

  public function setTpl($name, $data = array(), $returnHTML = false){
    $this->setData($data);

    return $this->tpl->draw($name, $returnHTML);
  }

  private function setData($data = array()){
    foreach ($data as $key => $value) {
      $this->tpl->assign($key, $value);
    }
  }
}

?>
