<?php

require_once("../databases/BdTurmaConect.php");
require_once("../config/SimpleRest.php");

$page_key = "";

class ContatosRestHandler extends SimpleRest{
    public function ContatosIncluir(){
            if(isset($_POST["txtNome"])) {
                $nome = $_POST["txtNome"];
                $email = $_POST['txtEmail'];
                $fone = $_POST['txtFone'];
                $endereco = $_POST['txtEndereco'];
                $bairro = $_POST['txtBairro'];
                $cidade = $_POST['txtCidade'];
                $uf = $_POST['txtUF'];
                $cep = $_POST['txtCep'];
    
                //Informatar a Stored Procedure e seus parâmetros
                $query= "CALL spIncluirContatos(:pnome,:pendereco,:ptelefone,:pbairro,:pcidade,:puf,:pcep,:pemail)";

                
                //Definir o conjunto d dados
                $array = array(":pnome"=> "{$nome}",
                ":pendereco"=> "{$endereco}",
                ":ptelefone"=> "{$fone}",
                ":pbairro"=> "{$bairro}",
                ":pcidade"=> "{$cidade}",
                ":puf"=> "{$uf}",
                ":pcep"=> "{$cep}",
                ":pemail"=> "{$email}");
    
                // Instanciar a classe BdTurmaConect
    
                $dbController = new BdTurmaConect();
                //Chamar o método
                $rawData = $dbController->executeProcedure($query,$array);
                // Verificar se o retorno está vazio
                if(empty($rawData)) {
                    $statusCode = 404;
                    $rawData = array('sucesso' => 0);
                }
                else {
                    $statusCode = 200;
                    $rawData = array('sucesso' => 1);
                }
                $requestContentType = $_POST['HTTP_ACCEPT'];
                $this->setHttpHeaders($requestContentType, $statusCode);
                $result["RetornoDados"] = $rawData;
    
                if (strpos($requestContentType, 'application/json') !==false) {
                    $response = $this->encodeJson($result);
                    echo $response;
                }
            }
        }
    
        public function ContatosConsultar(){
            if(isset($_POST["txtNome"])) {
                $nome = $_POST["txtNome"];

    
                //Informatar a Stored Procedure e seus parâmetros
                $query= "CALL spConsultarContatos(:pnome)";

                
                //Definir o conjunto d dados
                $array = array(":pnome"=> "{$nome}");
            
    
                // Instanciar a classe BdTurmaConect
    
                $dbController = new BdTurmaConect();
                //Chamar o método
                $rawData = $dbController->executeProcedure($query,$array);
                // Verificar se o retorno está vazio
                if(empty($rawData)) {
                    $statusCode = 404;
                    $rawData = array('sucesso' => 0);
                }
                else {
                    $statusCode = 200;
                    
                }
                $requestContentType = $_POST['HTTP_ACCEPT'];
                $this->setHttpHeaders($requestContentType, $statusCode);
                $result["RetornoDados"] = $rawData;
    
                if (strpos($requestContentType, 'application/json') !==false) {
                    $response = $this->encodeJson($result);
                    echo $response;
                }
            }
        }

    public function encodeJson($responseData)
    {
        $jsonResponse = json_encode($responseData, JSON_UNESCAPED_UNICODE);
        return $jsonResponse;
    }
}

if (isset($_GET["page_key"])) {
    $page_key = $_GET["page_key"];
} else {
    if (isset($_POST["page_key"])) {
        $page_key = $_POST["page_key"];
    }
}

switch ($page_key) {
    case "Incluir":
        $contatos = new ContatosRestHandler();
        $contatos->ContatosIncluir();
        break;

        case "Consultar":
            $contatos = new ContatosRestHandler();
            $contatos->ContatosConsultar();
            break;
}


    
?>