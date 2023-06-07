<?php 

class tb_seller extends tb_user{
    public function __construct(public $NameSeller){}
    use getInstance;
    public function getNameSeller(){
        return $this->NameSeller;
    }
}