/** Função para criar um objeto XMLHTTPRequest
*/

function CriaRequest() {
	try{
		request = new XMLHttpRequest();        
	}
	catch (IEAtual){
		try{
			request = new ActiveXObject("Msxml2.XMLHTTP");       
		}
		catch(IEAntigo){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");          
			}
			catch(falha){
				request = false;
			}
		}
	}
	
	if (!request){ 
		alert("Seu Navegador não suporta Ajax!");
	}
	else{
		return request;
	}
}



//Teste do botao


$(document).ready(function(){

	$('#btnListar').click(function(){
		//alert("Com 2 reais eu como a mae do kelvin e ainda sobra 2 reais");
		//chamar o metodo
		ContatosConsultar();
	});

	$('#btnCpf').click(function(){
		//alert("Com 2 reais eu como a mae do kelvin e ainda sobra 2 reais");
		//chamar o metodo
		TestaCPF();
	});

});

function TestaCPF() {
    var Soma;
    var Resto;
    Soma = 0;

	var strCPF = $('input[id=txtCPF]').val();

  if (strCPF == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);

	alert ("Soma - "+ Soma);

	Resto = (Soma * 10)%11;
	 alert ("Soma = " + Soma + "\n" + "Resto = " + Resto);

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}


function ContatosConsultar() {

		//alert ('Testando o metodo');
		//Definir variavel e atribuir valor
		//Jquery é uma biblioteca de funções js que interage com o html
		var strnome = $('input[id=txtNome]').val();

		//definir a URN
		var urn = "../contatos/listar/";

		//instanciar
		var xmlreq = CriaRequest();

		//iniciar uma requisição
		xmlreq.open('POST', urn, true);

		//cabeçalho de envio
		xmlreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		//atribui uma função para ser executada  sempre que houver uma mudança de readyState
		//readyState retorna o status do documento, quando este é carregado.
		xmlreq.onreadystatechange = function () {
			
			//verifica se foi concluido com sucesso e a conexão fechada (readyState=4)
			if (xmlreq.readyState == 4) {
				
				//verifica se o arquivo foi encontrado com sucesso
				if (xmlreq.status == 200) {
					alert(xmlreq.responseText);
				}
			}
		};

		//envio dos parametros
		xmlreq.send("txtNome="+strnome+"&HTTP_ACCEPT=application/json");
}


