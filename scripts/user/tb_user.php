<?php
// TODO: Metodología singelton -> La variable se instancia sola

class tb_user{
    public function __construct(public $NroBill,public $BillDate,public $fullName){}
    use getInstance;
    public function getNroBill(){
        return $this->NroBill;
    }
    public function getBillDate(){
        return $this->BillDate;
    }
}

?>