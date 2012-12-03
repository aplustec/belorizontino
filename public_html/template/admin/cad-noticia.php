<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel Jornal Belorizontino</title>
<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Terminal+Dosis:400,600' rel='stylesheet' type='text/css'>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/class.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="total">
  <div id="topo">
    <div id="logo"><img src="logo.png" width="230" height="76" border="0" title="Página Inicial" /></div>
  </div>
  <div id="navegacao">
    <div id="nav1">
	  <ul class="menu2">
        <li><a href="painel.php" title="Home"><b>PAINEL</b></a></li>
        <li class="current"><a href="noticias.php" title="Notícias"><b>NOTÍCIAS</b></a></li>
        <li><a href="edicoes.php" title="Edições"><b>EDIÇÕES</b></a></li>
        <li><a href="banner.php" title="Banner"><b>BANNER</b></a></li>
        <li><a href="comentarios.php" title="Comentários"><b>COMENTÁRIOS</b></a></li>
        <li><a href="#" title="Blog"><b>SAIR</b></a></li>
      </ul>
    </div>
  </div>
  <div id="destaque">
    <h1>&nbsp;&nbsp;Cadastrar not&iacute;cia</h1>
  </div>
  <div id="videos">
    <div id="video-dir2"><a href="noticias.php" class="up">Voltar</a><br />
      <br />
      <form id="form1" name="form1" method="post" action="">
        <p>&nbsp;</p>
        <table width="951" border="0">
          <tr>
            <td class="label">T&iacute;tulo da not&iacute;cia</td>
          </tr>
          <tr>
            <td><input name="titulo" type="text" class="field" id="titulo" /> </td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">Autor (a)</td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label"><label for="autor"></label>
            <input name="autor" type="text" class="field" id="autor" /></td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">E-mail do Autor (a)</td>
          </tr>
          <tr>
            <td><input name="email-autor" type="text" class="field" id="email-autor" /></td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">Imagem</td>
          </tr>
          <tr>
            <td><input name="datafile" type="file" size="40">
              <span class="destaque2"><em>200X150px  JPG</em></span></td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">Texto</td>
          </tr>
          <tr>
            <td><textarea name="textarea" cols="45" rows="5" class="area" id="textarea">
</textarea></td>
          </tr>
          <tr>
            <td height="45">&nbsp;</td>
          </tr>
          <tr>
            <td><input name="button" type="submit" class="bt-enviar" id="button" value="Publicar" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<div id="rodape">
<div id="bloco-rodape">
  <div class="direitos" id="copyright">&copy; Copyright 2012 Jornal Belorizontino</div>
</div>
</div>

</body>
</html>