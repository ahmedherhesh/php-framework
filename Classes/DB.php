<?php

namespace Classes;
use Classes\Connect;

class DB extends Connect
{
     public $table;
     public $condition;
     public $sql;
     public $query;
     
     public static function run(){
          return new DB();
     }
     // Select table
     public function table($table = null)
     {
          $this->table  = $table;
          $this->sql    = "SELECT * FROM {$this->table}";
          $this->query  = $this->con->prepare($this->sql);
          return $this;
     }

     // Add conditions 
     public function where($condition = [])
     {
          if (count($condition) === 3) {
               $operators = ['>', '<', '=', '!=', '>=', '<='];
               if (in_array($condition[1], $operators)) {
                    if($this->condition){
                         $this->condition   .= "AND {$condition[0]} {$condition[1]} '{$condition[2]}'";
                    }else{
                         $this->condition   = "WHERE {$condition[0]} {$condition[1]} '{$condition[2]}'";
                    }
                    $this->query = $this->con->prepare("{$this->sql} {$this->condition}");
               }
          }
          return $this;
     }

     // Order results
     public function orderBy($column = null, $attr = null)
     {
          $this->query = $this->con->prepare("{$this->sql} {$this->condition} order by $column $attr");
          return $this;
     }

     // Get all recordes
     public function get()
     {
          if ($this->query->execute())
               return $this->query->fetchAll(\PDO::FETCH_OBJ);
     }

     // Get one record
     public function first()
     {
          if ($this->query->execute())
               return $this->query->fetch(\PDO::FETCH_OBJ);
     }

     // Add record
     public function create($requests = [])
     {
          $keys = '';
          $values = '';
          $increment = 1;
          foreach ($requests as $key => $value) {
               if ($increment < count($requests)) {
                    $keys .= $key . ',';
                    $values .= "'" . $value . "'" . ',';
               } else {
                    $keys .= $key;
                    $values .= "'" . $value . "'";
               }
               $increment++;
          }
          $this->sql = "INSERT INTO {$this->table} ({$keys}) VALUES ({$values})";
          $this->query = $this->con->prepare($this->sql);
          if ($this->query->execute()) return true;
     }

     // Update record
     public function update($requests = [])
     {
          $data = '';
          $increment = 1;
          foreach ($requests as $key => $value) {
               if ($increment < count($requests)) {
                    $data .= $key . ' = ' . "'" . $value . "'" . ','; 
               } else {
                    $data .= $key . ' = ' . "'" . $value . "'"; 
               }
               $increment++;
          }
          $this->sql = "UPDATE {$this->table} SET {$data} {$this->condition}";
          $this->query = $this->con->prepare($this->sql);
          if ($this->query->execute()) return true;
     }

     // Delete if condition is true
     public function delete()
     {
          $this->sql = " DELETE FROM {$this->table} {$this->condition}";
          $this->query = $this->con->prepare("{$this->sql}");
          if ($this->query->execute()) return true;
     }
}
