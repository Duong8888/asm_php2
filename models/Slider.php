<?php

namespace Web;

class Slider extends db
{
    public function getSlider($action = true, $id = '')
    {
        if ($action) {
            $sql = "SELECT * FROM `slide`";
            return $this->getData($sql);
        } else {
            $sql = "SELECT * FROM `slide` WHERE id = $id";
            return $this->getData($sql, [''], false);
        }
    }

    public function updateSlider($data = [],$img = true)
    {
        if($img){
            $sql = "UPDATE `slide` SET `image`=?,`title`=?,`description`=? WHERE id = ?";
        }else{
            $sql = "UPDATE `slide` SET `title`=?,`description`=? WHERE id = ?";
        }
        $this->getData($sql, $data, 'update');
    }

    public function addSlider($data = [])
    {
        $sql = "INSERT INTO `slide`( `image`, `title`, `description`) VALUES (?,?,?)";
        $this->getData($sql, $data, 'add');
    }
    public function deleteSlider($id){
        $sql = "DELETE FROM `slide` WHERE id = $id";
        $this->getData($sql);
    }
}