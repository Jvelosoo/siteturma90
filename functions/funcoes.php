<?php

//Iniciar uma session
session_start();

//Se a session nap existir, sera criada
if (empty($_SESSION['lista'])) {
    $_SESSION['lista'] = [];
}

function listar(){

    echo "Espelho de Array - Apresentação didática <br>";
    echo "============================================ <br>";
    print_r($_SESSION['lista']);
    echo "<br><br>";


    $qtderegistro =count($_SESSION['lista']);
    echo "Quantidade de registros no array =" . $qtderegistro;
    echo "<br><br>";

    echo "Tabela com dados <br>";
    echo "================================ ". "<br>";
    echo "<br>";

    $tabela = "<table border='1'>
                <thead>
                    <tr>
                        <th>Nome </th>
                        <th>Cep </th>
                        <th>Email </th>
                        <th>Fone </th>
                        <th>Cidade </th>
                        <th>UF </th>
                    </tr>
                </thad>
                </tbody>";

    $retorno = $tabela;

    foreach ($_SESSION['lista'] as $linhadoarray){
        $retorno.= "<tr>";
        foreach ($linhadoarray as $coluna => $conteudocoluna){
            $retorno .= "<td>" . $conteudocoluna . "</td>";
        }
        $retorno .= "</tr>";
    }
    
$retorno .= "</tbody> </table>";
return $retorno;
}




// Verificar o dia da semana
//http://www.linhadecodigo.com.br/artigo/3565/trabalhando-com-funcoes-em-php.asp

function dia_atual(){
    date_default_timezone_set('America/Sao_paulo');
    $hoje = getdate();
    //return $hoje;
    // print_r($hoje);

    switch($hoje["wday"]) {
        case 0:
            return "Domingo";
            break;
        case 1:
            return "Segunda";
            break;
        case 2:
            return "Terça";
            break;
        case 3:
            return "Quarta";
            break;
        case 4:
            return "Quinta";
            break;
        case 5:
            return "Sexta";
            break;
        case 6:
            return "Sábado";
            break;
    }
}













?>