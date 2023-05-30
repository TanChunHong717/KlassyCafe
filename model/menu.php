<?php
class Menu {
    private $menu_id;
    private $menu_name;
    private $description;
    private $category;
    private $price;
    private $menu_image_path;

    public function __construct($menu_id, $menu_name, $description, $category, $price, $menu_image_path)
    {
        $this->menu_id = $menu_id;
        $this->menu_name = $menu_name;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
        $this->menu_image_path = $menu_image_path;
    }

    public function getMenuId()
    {
        return $this->menu_id;
    }

    public function setMenuId($menu_id)
    {
        $this->menu_id = $menu_id;
    }

    public function getMenuName()
    {
        return $this->menu_name;
    }

    public function setMenuName($menu_name)
    {
        $this->menu_name = $menu_name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getMenuImagePath()
    {
        return $this->menu_image_path;
    }

    public function setMenuImagePath($menu_image_path)
    {
        $this->menu_image_path = $menu_image_path;
    }
}
?>