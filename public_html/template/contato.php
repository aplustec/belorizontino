<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BELORIZONTINO - O melhor de BH voc&ecirc; encontra aqui</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12375493-24']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
<div id="header">
  <div id="topo">
    <div id="logo"><a href="index.php"><img src="imagens/logo.png" width="348" height="115" border="0" /></a></div>
    <div id="menu">
         <ul class="menu2">
          <li><a href="index.php" title="Home">HOME</a></li>
          <li><a href="quem-somos.php" title="Quem Somos">QUEM SOMOS</a></li>
          <li><a href="edicoes.php" title="Edições">EDIÇÕES</a></li>
          <li><a href="redacao.php" title="Colunistas">DIRETO DA REDAÇÃO</a></li>
          <li><a href="parceiros.php" title="Parceiros">PARCEIROS</a></li>          
          <li class="current"><a href="contato.php" title="Contato">CONTATO</a></li>
         </ul> 
    
    </div>
  </div>
</div>
<div id="container">
  <div id="col-left">
    <h1>Contato</h1>
<br />
<form id="form1" name="form1" method="post" action="form.php">
  <table width="492" border="0">
    <tr>
      <td width="452" class="label">Nome</td>
    </tr>
    <tr>
      <td><label for="nome"></label>
        <span id="spryNOME">
        <input name="nome" type="text" class="form" id="nome" />
        <span class="textfieldRequiredMsg">Campo vazio</span></span></td>
    </tr>
    <tr>
      <td class="label">E-mail</td>
    </tr>
    <tr>
      <td><label for="email"></label>
        <span id="spryEMAIL">
        <input name="email" type="text" class="form" id="email" />
        <span class="textfieldRequiredMsg">Campo vazio</span></span></td>
    </tr>
    <tr>
      <td class="label">Assunto</td>
    </tr>
    <tr>
      <td><label for="assunto"></label>
        <span id="spryASSUNTO">
        <input name="assunto" type="text" class="form" id="assunto" />
        <span class="textfieldRequiredMsg">Campo vazio</span></span></td>
    </tr>
    <tr>
      <td class="label">Mensagem</td>
    </tr>
    <tr>
      <td><label for="mensagem"></label>
        <span id="spryMENSAGEM">
        <textarea name="mensagem" cols="45" rows="5" class="form2" id="mensagem"></textarea>
        <span class="textareaRequiredMsg">Campo vazio</span></span></td>
    </tr>
    <tr>
      <td><input name="enviar" type="submit" class="bt" id="enviar" value="ENVIAR" /></td>
    </tr>
  </table>
</form>
<span class="copy"><br />
  <br />
  <br />
  <br />
  <br />
  <br />
</span></div>
    <div id="col-right">
    <h1>Expediente</h1>
    <h2>      <strong>Diretor Executivo</strong><br />
      José Milton Bethônico<br />
jmbethonico@belorizontino.com.br
<br />
<br />
<strong>Diretor de Criação</strong><br />
Breno Borges
<br />
breno.borges@belorizontino.com.br
<br />
<br />
<strong>Projeto Gráfico e Diagramação
</strong><br />
Solon Vitor <br />
(31) 9477-0544
<br />
diagramacao@belorizontino.com.br
<br />
<br />
<strong>Editor Responsável
</strong><br />
Fádua Lima
<br />
redacao@belorizontino.com.br
<br />
<br />
<strong>Tiragem </strong><br />
30.000 exemplares
<br />
Distribuição Gratuita
<br />
<strong><br />
Comercial </strong><br />
(31) 3063-0075 / 8204-4249<br />
contato@belorizontino.com.br
    </h2>
  </div>
</div>
<div id="footer">
    <span class="copy">

      JORNAL BELORIZONTINO - <strong>(31) 3063-0075 / contato@belorizontino.com.br</strong><br />
      Copyright - JORNAL BELOHORIZONTINO &copy; 2012. Todos os direitos reservados. </span>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryNOME", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryEMAIL", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryASSUNTO", "none", {validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryMENSAGEM", {validateOn:["blur"]});
</script>
</body>
</html>