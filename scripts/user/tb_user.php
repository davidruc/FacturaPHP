<?php
// TODO: Metodología singelton -> La variable se instancia sola

class tb_user{
    public $NroBill;
    public $BillDate;
    public $fullName;
    public function __construct($NroBill, $BillDate, $fullName){
        $this->NroBill = $NroBill;
        $this->BillDate = $BillDate;
        $this->fullName = $fullName;
    }
}


    


?>