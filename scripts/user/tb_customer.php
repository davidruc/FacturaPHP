<?php

class tb_customer extends tb_user{

    public function __construct(private $idCustomer, public $fullName, private $email, private $address, private $phone){}
    use getInstance;

    public function getIdCustomer(){
        return $this->idCustomer;
    }
    public function setIdCustomer($idCustomer){
        $this->idCustomer -> $idCustomer;
    }

    public function getFullName(){
        return $this->fullName;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getAddress(){
        return $this->address;
    }
    public function setAddress($address){
        $this->address = $address;
    }

    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }

}


?>