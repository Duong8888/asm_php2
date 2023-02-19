<?php

namespace Web;

class User extends db
{
    protected $table = 'user';

    public function getDataUser($action = true, $id = '')
    {
        if ($action) {
            $sql = "SELECT * FROM $this->table";
            return $this->getData($sql);
        } else {
            $sql = "SELECT * FROM $this->table WHERE iduser = $id";
            return $this->getData($sql, [], false);
        }
    }

    public function addDataUser($data = [])
    {
        $sql = "INSERT INTO $this->table(`user_name`, `full_name`, `pass`, `email`, `phone`, `address`, `position`, `avatar`) VALUES (:user_name, :full_name, :pass, :email, :phone, :address, :position, :avatar)";
        $this->getData($sql, $data, 'add');
    }

    public function deleteDataUser($id)
    {
        $sql = "DELETE FROM $this->table WHERE iduser = $id";
        $this->getData($sql);
    }

    public function updateDataUser($data, $action = true)
    {
        if ($action) {
            $sql = "UPDATE $this->table SET `user_name`=:user_name,`full_name`=:full_name,`pass`=:pass,`email`=:email,`phone`=:phone,`address`=:address,`position`=:position,`avatar`=:avatar WHERE iduser = :iduser";
        } else {
            $sql = "UPDATE $this->table SET `user_name`=:user_name,`full_name`=:full_name,`pass`=:pass,`email`=:email,`phone`=:phone,`address`=:address,`position`=:position WHERE iduser = :iduser";
        }
        $this->getData($sql, $data, 'update');
    }

    public function checkInfo($colum, $value, $id = '')
    {
        $sql = "SELECT * FROM `user` WHERE $colum = $value";
        if (strlen($id) != 0) {
            $sql = "SELECT * FROM `user` WHERE $colum = $value AND iduser = $id";
        }
        return $this->getData($sql);
    }

}