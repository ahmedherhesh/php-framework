<?php

namespace Classes;

require_once 'autoload.php';

use Classes\Connect;

class DB extends Connect
{
     public $table;
     
     public function table($table = null)
     {
          $this->table = $table;
          $this->sql = "SELECT * FROM {$this->table}";
          $this->query = $this->con->prepare($this->sql);
          return $this;
     }

     public function where($condition = [])
     {
          if (count($condition) === 3) {
               $operators = ['>','<','=','!=','>=','<='];
               if(in_array($condition[1],$operators)){
                    $this->sql   = "{$this->sql} WHERE {$condition[0]} {$condition[1]} '{$condition[2]}'";
                    $this->query = $this->con->prepare($this->sql);
               }
          }
          return $this;
     }

     public function orderBy($column = null,$attr = null){
          $this->query = $this->con->prepare("{$this->sql} order by $column $attr");
          return $this;
     }

     public function get()
     {
          $this->query->execute();
          return $this->query->fetchAll(\PDO::FETCH_OBJ);
     }

     public function first()
     {
          $this->query->execute();
          return $this->query->fetch(\PDO::FETCH_OBJ);
     }

}
