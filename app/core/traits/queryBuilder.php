<?php

namespace Core\Traits;



trait  QueryBuilder
{
    protected $whereConditions = [];
    protected $table;
    protected function preConfig()
    {
        if (empty($this->table)) {
            $arr = explode('\\', get_called_class());
            $this->table = strtolower(array_pop($arr)) . 's';
        }
        return   $this;
    }





    protected function prepareData(array $array, $update = false)
    {
        $data = [];
        $collumns = '';
        $values = '';
        foreach ($array as $key => $value) {
            if (in_array($key, $this->fillable)) {
                if ($update) {
                    $values .= "{$key} = :{$key},";
                } else {
                    $collumns .=  "{$key},";
                    $values .= ":{$key},";
                }
                $data[':' . $key] = $value;
            }
          
        }
        $return = (object) ['data' => $data,  'values' => substr($values, 0, -1)];
        if (!$update) {
            $return->collumns = substr($collumns, 0, -1);
        }
        return  $return;
    }


    protected function getSelect()
    {
        $query = "SELECT * FROM {$this->table}";

        $data = []; 
        if(count($this->whereConditions) > 0) {
            $query .= " WHERE ";
            foreach ($this->whereConditions as $key => $value) {
                $query .= " {$value['collumn']} {$value['condition']} {$key} and";
                $data[$key] = $value['value'];
            }
            $query = substr($query, 0, -3);
        }
   
        return (object)['query' => $query, 'data' => $data];
    }
}
