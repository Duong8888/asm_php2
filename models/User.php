<?php

namespace Web;

class User extends db
{
    protected $table = 'user';

    public function getDataUser($action = true,$id = ''){
        if($action){
            $sql = "SELECT * FROM $this->table";
            $this->getData($sql);
        }else{
            $sql = "SELECT * FROM $this->table iduser = $id";
            $this->getData($sql,[],false);
        }
    }

    function addDataUser(){

    }

}