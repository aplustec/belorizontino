<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body></body>
</html>
<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$date = date("d/m/Y h:i");

$contato = $nome;
// ****** ATENÇÃO ********
// ABAIXO ESTÁ A CONFIGURAÇÃO DO SEU FORMULÁRIO.
// ****** ATENÇÃO ********

//CABEÇALHO - ONFIGURAÇÕES SOBRE SEUS DADOS E SEU WEBSITE
$nome_do_site="JORNAL BELORIZONTINO";
//$email_para_onde_vai_a_mensagem = "antonio.santos@aplustec.com.br";
$email_para_onde_vai_a_mensagem = "contato@belorizontino.com.br";
$nome_de_quem_recebe_a_mensagem = "Jornal Belorizontino";
$exibir_apos_enviar='sucesso.php';

//MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
//$cabecalho_da_mensagem_original = "From: $contato \r\n";
//$user = strstr($nome, '@', true); // => By Julio Leles
$cabecalho_da_mensagem_original = 'From:'.$contato."\r\n";
$cabecalho_da_mensagem_original.= 'MIME-Version: 1.0'."\r\n";
$cabecalho_da_mensagem_original.= 'Content-type: text/html; charset=iso-8859-1'."\r\n";


//ADICIONA O CABEÇALHO PARA ENVIAR FORMATAÇÃO HTML

$assunto_da_mensagem_original="Contato";


// FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
$configuracao_da_mensagem_original = '
<html>
<head>
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-family: "Arial Narrow";
	color: #666;
	font-weight: normal;
	line-height: 22px;
}
.style3 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	color: #036;
	font-weight: normal;
}

.style2 {
	font-size: 14px;
	font-family: Arial Narrow;
	color: #151515;
}
-->
   </style>
</head>
<body>
<span class="style3">Mensagem enviada através do site</span><br />
<br>

<span class="style1"><b>Nome:   </b></span><span class="style2">'.$nome.' </span><br>
<span class="style1"><b>E-mail:  </b></span><span class="style2">'.$email.'</span><br>
<span class="style1"><b>Assunto:  </b></span><span class="style2">'.$assunto.'</span><br>
<span class="style1"><b>Mensagem:   </b></span><span class="style2">'.$mensagem.'</span><br>

<br>
<span class="style3">'.$date.'</span>
</body>
</html>
';

//CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
// "Re: $assunto"
$assunto_da_mensagem_de_resposta   = "Recebemos seu contato";
$cabecalho_da_mensagem_de_resposta = "From: $nome_do_site <$email_para_onde_vai_a_mensagem> \r\n";
$cabecalho_da_mensagem_de_resposta.= 'MIME-Version: 1.0' . "\r\n";
$cabecalho_da_mensagem_de_resposta.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$configuracao_da_mensagem_de_resposta= "
<html>
<head>
<style type='text/css'>
<!--
.style1 {
	font-size: 13px;
	font-family: Arial, Helvetica, sans-serif;
	color: #666;
}
.style3 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
	color: #369;
	font-weight: bold;
}

.style2 {
	font-size: 15px;
	font-family: Arial Narrow;
	color: #151515;
}
-->
   </style>
</head>
<body>
<img src='http://www.belorizontino.com.br/imagens/logo.png' width='348' height='115'><br><br>
<span class='style1'>Obrigado por entrar em contato com o Jornal Belorizontino.\r\n <br> Aguarde nosso retorno.\r\n <br><br> Atenciosamente,\r\n <br><br> $nome_do_site.<br><b>(31) 3063-0075</b> \r\n </span>
</body>
</html>
";

// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE NÃO ALTERE O SCRIPT PARA QUE O  SISTEMA FINCIONE CORRETAMENTE
// ****** IMPORTANTE ********

//ESSA VARIAVEL DEFINE SE É O USUARIO QUEM DIGITA O ASSUNTO OU SE DEVE ASSUMIR O ASSUNTO DEFINIDO
//POR VOCÊ CASO O USUARIO DEFINA O ASSUNTO PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME
//'assunto' NO FORMULARIO DE ENVIO
$assunto_digitado_pelo_usuario="s";

//ENVIO DA MENSAGEM ORIGINAL
$headers = "$cabecalho_da_mensagem_original";
if ($assunto_digitado_pelo_usuario=="n")
{
$assunto = "$assunto_da_mensagem_original";
};
$seuemail = "$email_para_onde_vai_a_mensagem";
$mensagem = "$configuracao_da_mensagem_original";
mail($seuemail,$assunto,$mensagem,$headers);

//ENVIO DE MENSAGEM DE RESPOSTA AUTOMATICA
$headers = "$cabecalho_da_mensagem_de_resposta";
if ($assunto_digitado_pelo_usuario=="n")
{
$assunto = "$assunto_da_mensagem_de_resposta";
}
else
{
$assunto = "Re: $assunto";
};
$mensagem = "$configuracao_da_mensagem_de_resposta";
mail($email,$assunto,$mensagem,$headers);

echo "<script>window.location='$exibir_apos_enviar'</script>";

?>
