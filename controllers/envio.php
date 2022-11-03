<?php





// Declaração e atribuição de variáveis
require_once("../functions/funcoes.php");

$nome = $_POST["txtNome"];
$email = $_POST['txtEmail'];
$fone = $_POST['txtFone'];
$endereco = $_POST['txtEndereco'];
$cidade = $_POST['txtCidade'];
$uf = $_POST['txtUF'];
$cep = $_POST['txtCep'];


//Definir o conjunto de dados 
$array = ["nome" => "{$nome}", "cep" => "{$cep}", "Endereço" => "{$endereco}", "Email" => "{$email}", "Fone" => "{$fone}", "Cidade" => "{$cidade}", "UF" => "{$uf}",];

array_push($_SESSION['lista'], $array);






// apresentar o resultado de duas variáveis
//echo "Nome: " . $nome . "<br>";
//echo "Email: " . $email . "<br>";
// Verificar se o campo txtNome foi preenchido
// Se sim, atribuir valores as variáveis 

echo "<br><br><br><br><br>";

if (isset($_POST["btnEnviar"])) {
    echo $nome . " seus dados foram cadastrados com 
   sucesso <br> <br> <br> <br> <br> ";
}






if (isset($_POST["btnListar"])) {
    echo $exibirdados = listar();

    




    // apresentar o resultado de duas variáveis
    echo "Nome: " . $nome . "<br>";
    echo "Email: " . $email . "<br>";
    // Verificar se o campo txtNome foi preenchido
    // Se sim, atribuir valores as variáveis
    if (isset($_POST["txtNome"])) {
        $fone = $_POST['txtFone'];
        $cep = $_POST['txtCep'];
        // apresentar o valor da variável $body
        echo "Cep: " . $cep . "<br>";
    }

    echo "<br>";
    echo "<br>";
    echo "<br>";




    echo "===================================";
    $body = "FALE CONOSCO - TESTE EXIBIÇÃO" . "<br>";
    $body = $body . "===================================" . "<br>";
    $body = $body . "Nome: " . $nome . "<br>";
    $body = $body . "Email: " . $email . "<br>";
    $body = $body . "Telefone: " . $fone . "<br>";
    $body = $body . "===================================" . "<br>";



    // apresentar o valor da variável 
    echo "</br>";
    echo $body;

    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";


    //Chamar a função dia_atual
    $dia = dia_atual();
    echo $dia . "<br>";


    $hora = date('H:i:s');
    echo $hora . "<br>";

    if (($hora >= "00:00:00") && ($hora <= "11:59:59")) {
        echo "Bom dia! <br>";
    } else if (($hora >= "12:00:00") && ($hora <= "17:59:59")) {
        echo "Boa tarde! <br>";
    } else {
        echo "Boa noite! <br>";
    }
}
