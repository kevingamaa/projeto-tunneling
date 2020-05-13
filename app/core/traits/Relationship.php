<?php

namespace Core\Traits;



trait  Relationship
{
    public function belongsTo($class, $foreign_id = '', $id = '')
    {
        
        $obj = new $class;
    }
}
