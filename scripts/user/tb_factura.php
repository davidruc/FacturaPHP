<?php

class tb_factura {

    public function __construct(private $codeProduct, public $nameProduct, public $acount, public $unitValue){}
    use getInstance;

    public function getNameProduct(){
        return $this->nameProduct;
    }
    public function getCodeProduct(){
        return $this->codeProduct;
    }
    public function setCodeProduct($codeProduct){
        $this->codeProduct = $codeProduct;
    }
    public function getAcount(){
        return $this->acount;
    }
    public function getUnitValue(){
        return $this->unitValue;
    }
}


?>