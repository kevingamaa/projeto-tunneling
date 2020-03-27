<?php

namespace Core\Classes;

use Core\Traits\QueryBuilder;
use stdClass;

class Model
{
    use QueryBuilder;
    protected $connection;
    protected $schema;



    protected $fillable = [];
    protected $hidden = [];

    function __construct()
    {
       
        $this->preConfig();
    }

    

    public function where($collumn, $condition, $value = '') 
    {   
        $this->whereConditions  = [];
 
        if(is_array($collumn))
        {
            foreach ($condition as $key) {
                if(count($key) == 3) 
                {
                    $this->whereConditions[':'.$key[0]] = ['collumn' => $key[0], 'condition' => $key[1], 'value' => $key[2]];
                } else {
                    $this->whereConditions[':'.$key[0]] = ['collumn' => $key[0], 'condition' => '=', 'value' => $key[1]];
                }
                
            }
        } else {
           
            if(empty($value))
            {
                $this->whereConditions[':'.$collumn] = ['collumn'=> $collumn, 'condition' => '=', 'value' => $condition];
            } else{
                $this->whereConditions[':'.$collumn] = ['collumn'=> $collumn, 'condition' => $condition, 'value' => $value];
            }
        }   

        return $this;
    }


    
    public function create(array $array)
    {
        $db = new DB();
        $create = $this->prepareData($array);
        return  $db->table($this->table)->create( $create);
    }


    public function find(Int $id)
    {
        $db = new DB();
        return $db->table($this->table)
        ->class(get_called_class())
        ->defineHidden($this->hidden)
        ->find($id);
    }

    public function update(array $array) 
    {
        $db = new DB();
        $db->id = $this->id;
        $update = $this->prepareData($array, true);
        return  $db->table($this->table)->class(get_called_class())->update($update);
    }

    public function delete()
    {
        $db = new DB();
        $db->id = $this->id;
        return  $db->table($this->table)->delete();
    }
    public function get()
    {
        $select = $this->getSelect();
        $db = new DB();
        return  $db->table($this->table)
        ->class(get_called_class())
        ->defineHidden($this->hidden)
        ->select($select);
    }

    public function first(){
        $data = $this->get() ;
        return array_shift($data );
    }
}
