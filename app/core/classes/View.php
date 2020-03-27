<?php

namespace Core\Classes;
use League\Plates\Engine;
class View{

    protected $file;
    private $data;
    function __construct($view_file, $view_data)
    {
        $this->file =  $view_file;
        $this->data = $view_data;
    }

    public function render() {
        // dd($this->file);
        $templates = new Engine(VIEW);
        return $templates->render($this->file, $this->data);
    }

  
  

}