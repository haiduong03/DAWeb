<?php
class Product
{
    private $name;
    private $detail;
    private $type;
    private $brand;
    private $size;
    private $color;
    private $image;
    private $price;
    private $promotion;

    public function __construct($id, $name, $detail, $brand, $type, $size, $color, $image, $price, $promotion)
    {
        $this->id = $id;
        $this->name = $name;
        $this->detail = $detail;
        $this->type = $type;
        $this->brand = $brand;
        $this->size = $size;
        $this->color = $color;
        $this->image = $image;
        $this->price = $price;
        $this->promotion = $promotion;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_detail()
    {
        return $this->detail;
    }

    public function get_brand()
    {
        return $this->brand;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_size()
    {
        return $this->size;
    }

    public function get_color()
    {
        return $this->color;
    }

    public function get_image()
    {
        return $this->image;
    }

    public function get_price()
    {
        return $this->price;
    }
    public function get_promotion()
    {
        return $this->promotion;
    }
}
