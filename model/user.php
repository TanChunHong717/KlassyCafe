<?php
class User {
    private $user_id;
    private $email;
    private $password;
    private $name;
    private $mobile_number;

    public function __construct($user_id, $email, $password, $name, $mobile_number)
    {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->mobile_number = $mobile_number;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMobileNumber()
    {
        return $this->mobile_number;
    }

    public function setMobileNumber($mobile_number)
    {
        $this->mobile_number = $mobile_number;
    }
}

?>