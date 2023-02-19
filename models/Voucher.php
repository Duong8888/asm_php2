<?php

namespace Web;

class Voucher extends db
{
    public function addVoucher($data = [])
    {
        $sql = "INSERT INTO `voucher`(`quantity`, `discount`, `content`, `conditionVoucher`, `exp_date`) VALUES (?,?,100,?,?)";
        $this->getData($sql, $data, 'add');
    }

    public function getVoucher($action = true, $id = '')
    {
        if ($action) {
            $sql = "SELECT * FROM `voucher`";
            return $this->getData($sql);
        } else {
            $sql = "SELECT * FROM `voucher` WHERE idvc = $id";
            return $this->getData($sql, [], false);
        }
    }

    public function deleteVoucher($id)
    {
        $sql = "DELETE FROM `voucher` WHERE idvc = $id";
        $this->getData($sql);
    }

    public function updateVoucher($data = [])
    {
        $sql = "UPDATE `voucher` SET `quantity`=?,`discount`=?,`content`=?,`conditionVoucher`='100',`exp_date`=? WHERE idvc = ?";
        $this->getData($sql, $data, 'update');
    }
}