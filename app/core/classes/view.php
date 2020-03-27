<?php

namespace Core\Classes;


class View{

    protected $file;
    private $data;
    function __construct($view_file, $view_data)
    {
        $this->file =  VIEW.$view_file.".phtml";
        $this->data = $view_data;
        if(is_array($view_data)) {
            foreach ($view_data as $key => $value) {
                $this->{$key} = $value;
            }
        }
        $this->render();
    }

  

    public function render() {
        // dd($this->file);
        if(file_exists($this->file)) {
            include $this->file;
        } else {
            throw new \Exception('View file('.$this->file.') not found');
        }
    }

  
  

}