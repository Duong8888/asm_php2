<?php

namespace Web;

class Pagination extends db
{

    public $item;
    public $start = 0;
    public $table;
    public $colum;

    public function __construct($table, $colum, $item)
    {
        parent::__construct();
        $this->colum = $colum;
        $this->table = $table;
        $this->item = $item;
    }

    function page($action = true,$colum = '',$value = '')
    {
        if (isset($_GET['pageIndex'])) {
            $pageIndex = ($_GET['pageIndex'] <= 0) ? 1 : $_GET['pageIndex'];
        } else {
            $pageIndex = 1;
        }
        $this->start = $this->item * ($pageIndex - 1);
        if ($action) {
            $query = "SELECT * FROM $this->table LIMIT $this->start,$this->item";
        }else{
            $query = "SELECT * FROM $this->table WHERE $colum = $value LIMIT $this->start,$this->item";
        }
        return $this->getData($query);
    }

    function countPage()
    {
        $query = "SELECT COUNT($this->colum) FROM $this->table";
        return ceil(($this->getData($query, [], false)[0]) / $this->item);
    }
}

