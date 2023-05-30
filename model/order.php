<?php 
class Order {
    private $order_id;
    private $user_id;
    private $table_id;
    private $order_amount;
    private $order_date;
    private $status;
    public $order_menu;

    public function __construct($order_id, $user_id, $table_id, $order_amount, $order_date, $status)
    {
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->table_id = $table_id;
        $this->order_amount = $order_amount;
        $this->order_date = $order_date;
        $this->status = $status;
        $this->order_menu = [];
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getTableId()
    {
        return $this->table_id;
    }

    public function setTableId($table_id)
    {
        $this->table_id = $table_id;
    }

    public function getOrderAmount()
    {
        return $this->order_amount;
    }

    public function setOrderAmount($order_amount)
    {
        $this->order_amount = $order_amount;
    }

    public function getOrderDate()
    {
        return $this->order_date;
    }

    public function setOrderDate($order_date)
    {
        $this->order_date = $order_date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}

?>