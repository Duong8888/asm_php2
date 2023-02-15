<?php

namespace Web;

class Category extends db
{
    protected $table = 'categories';

    public function getCategory($action = 'true',$id = ''){
        if($action){
            $sql = "SELECT * FROM $this->table";
            return $this->getData($sql);
        }else{
            $sql = "SELECT * FROM $this->table WHERE iddm = $id";
            return $this->getData($sql,[''],false);
        }
    }

    public function addDataCategory($data = []){
        $sql = "INSERT INTO `categories`(`categories_name`, `image`) VALUES (:categories_name,:image)";
        return $this->getData($sql,$data,'add');
    }

    public function deleteDataCategory($id){
        $sql = "DELETE FROM `categories` WHERE iddm = $id";
        return $this->getData($sql);
    }

}