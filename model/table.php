<?php 
class Table {
    private $table_id;
    private $table_name;
    private $table_space;
    private $table_image_path;

    public function __construct($table_id, $table_name, $table_space, $table_image_path)
    {
        $this->table_id = $table_id;
        $this->table_name = $table_name;
        $this->table_space = $table_space;
        $this->table_image_path = $table_image_path;
    }

    public function getTableId()
    {
        return $this->table_id;
    }

    public function setTableId($table_id)
    {
        $this->table_id = $table_id;
    }

    public function getTableName()
    {
        return $this->table_name;
    }

    public function setTableName($table_name)
    {
        $this->table_name = $table_name;
    }

    public function getTableSpace()
    {
        return $this->table_space;
    }

    public function setTableSpace($table_space)
    {
        $this->table_space = $table_space;
    }

    public function getTableImagePath()
    {
        return $this->table_image_path;
    }

    public function setTableImagePath($table_image_path)
    {
        $this->table_image_path = $table_image_path;
    }
}
?>