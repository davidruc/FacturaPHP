<?php
class client extends connect{
    
    use getInstance;
    function __construct(private $identificacion, public $full_name, public $email, private $adress, private $phone){
        parent::__construct();
 
    }
    public function postClient(){
        $mensaje = [];
        try {
            $query = 'INSERT INTO tb_client(identificacion,full_name,email,adress,phone) VALUES(?,?,?,?,?)';
            $res = $this->conexion->prepare($query);
            $res->execute([
                $this->identificacion,
                $this->full_name,
                $this->email,
                $this->adress,
                $this->phone
            ]);
            $mensaje = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
        } catch(\PDOException $e) {
            $mensaje = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($mensaje);
        }
    }
}
?>  