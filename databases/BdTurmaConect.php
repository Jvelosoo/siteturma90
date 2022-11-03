<?php
class BdTurmaConect {
    public $host = "localhost"; //indica o nome do servidor mysql, pode ser pelo ip
    public $user = "root";
    public $password = "";
    public $database = "bdturma90";



    function connectDB(){
        //tratamento de exceções

        try{
            $this->conn= new PDO("mysql:host={$this->host};dbname={$this->database};",
            $this->user,$this->password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));


        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $this->conzn->query('SET NAMES utf8');
}


catch(PDOException $e){
    echo "não foi possivel conecatr ao servidor . \n" . "<br>";
    echo "Mensagem: ".utf8_encode($e->getMessage()) . "\n";
                }
                    }


//Método pára executar instruções usadas nas inserções
//e modificações dos dados
function executeQuery($query){
    try{
        $conn = $this->connectDB();
        $resultado = $this->conn->prepare($query);
        

        if (!$resultado->execute()) {
            $resultado="Não foi possivel executar a instrução";

        }
        else{
            $resultado= array('Sucesso' =>1);
        }
    }

    catch (PDOException $e){
        die( print_r( $e->getMessage() ) );
    }

    return $resultado;
} 


function executeSelectQuery($query){
    try {
        $conn = $this->connectDB();
        $resultado = $this->coon->query($query);
        $resultado -> execute();

        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
           $resultado[] = $linha;
        }

        if (!empty($resultset)) {
            return $resultset;
        }

    } 
    catch (PDOException $e) {
        die( print_r( $e->getMessage() ) );
    }
}


function executeProcedure($query,$array){
    try {
        $resultset=[];
        $conn = $this->connectDB();
        //prepare para a execuçãoo da store procedure
        $stmt = $this->coon-> prepare($query);

        //passagem de parametros
        foreach($array as $key => $value ){
            $stmt->bindValue($key, $value);
        }

        //executar a stored procedure
        $stmt ->execute();

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $resultset[] = $linha;
        }

    } 
    catch (PDOException $e) {
        die( print_r( $e->getMessage() ) );
    }

    return $resultset;
}





}









?>