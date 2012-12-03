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
    <div id="logo"><img src="logo.png" width="230" height="76" border="0" title="P�gina Inicial" /></div>
  </div>
  <div id="navegacao">
    <div id="nav1">
      <ul class="menu2">
        <li><a href="painel.php" title="Home"><b>PAINEL</b></a></li>
        <li class="current"><a href="noticias.php" title="Not�cias"><b>NOT�CIAS</b></a></li>
        <li><a href="edicoes.php" title="Edi��es"><b>EDI��ES</b></a></li>
        <li><a href="banner.php" title="Banner"><b>BANNER</b></a></li>
        <li><a href="comentarios.php" title="Coment�rios"><b>COMENT�RIOS</b></a></li>
        <li><a href="#" title="Blog"><b>SAIR</b></a></li>
      </ul>
    </div>
  </div>
  <div id="destaque">
    <h1>&nbsp;&nbsp;Editar not&iacute;cia</h1>
  </div>
  <div id="notice-edit">
    <div id="video-dir2"><a href="noticias.php" class="up">Voltar</a><br />
      <br />
      <form id="form1" name="form1" method="post" action="">

        <table width="995" border="0">
          <tr>
            <td class="label"><img src="../imagens/colunistas/ambientese.jpg" width="200" height="150" /></td>
          </tr>
          <tr>
            <td height="25" class="label">T&iacute;tulo da not&iacute;cia</td>
          </tr>
          <tr>
            <td><input name="titulo" type="text" class="field" id="titulo" value="Ambiente-se" /> </td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">Autor (a)</td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label"><label for="autor"></label>
            <input name="autor" type="text" class="field" id="autor" value="Jornalista Jo&atilde;o Martins F. Mello" /></td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">E-mail do Autor (a)</td>
          </tr>
          <tr>
            <td><input name="email-autor" type="text" class="field" id="email-autor" value="joaonetojornalista@belorizontino.com.br" /></td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">Trocar magem</td>
          </tr>
          <tr>
            <td><input name="datafile" type="file" size="40">
              <span class="destaque2"><em>200X150px  JPG</em></span></td>
          </tr>
          <tr>
            <td height="25" valign="bottom" class="label">Texto</td>
          </tr>
          <tr>
            <td><textarea name="textarea" cols="45" rows="5" class="area" id="textarea">A Constru��o Civil dominou o mercado atual fazendo com que o crescimento do pa�s continue acelerado. O motivo para tanto investimento � estritamente ligado ao crescimento econ�mico do pa�s e abertura de mercado externo. O Minas investe em sua infraestrutura e em moradia por isso � considerado um estado modelo .

Vislumbrando a melhoria da profiss�o de ENGENHEIRO CIVIL h� 22 anos o estado conta com o IMEC (Instituto Mineiro de Engenharia Civil). Uma entidade de classe localizada dentro do CREA/MG, conselho este forte e respeitado em todo Brasil.

O IMEC uma organiza��o sem fins econ�micos formada por um seleto grupo de Engenheiros atuando em diversas �reas como (empres�rios, professores e funcion�rios de grandes construtoras). Sua busca e incans�vel em defender os direitos, a �tica e a qualidade dos servi�os prestados pelo Engenheiro Civil na sociedade. O instituto conta com 05 cadeiras representativas dentro do Conselho do CREA/MG participando efetivamente das discuss�es resolu��es pol�micas, obras p�blicas, pol�ticas de melhoria em nossa cidade, quest�es jur�dicas que envolva a classe e os diversos �rg�os como CONFEA, Grandes Construtoras, PMBH. SUDECAP, COPASA, e outros pertinentes �s atribui��es legais da Engenharia Civil.

O Instituto de Engenharia Civil proporcionou ao mercado mineiro no m�s de Agosto a D�cima Edi��o do Evento DESTAQUE DA ENGENHARIA 2012, um elegante evento trazendo para a sociedade o reconhecimento das grandes empresas e profissionais do setor da constru��o civil. Um evento que valoriza os profissionais e empresas que fazem desta classe um nome expressivo e de peso na sociedade. O IMEC vem recheado de lutas vividas no passado e almejando sem reservas louvor e gl�rias em um futuro repleto de conquistas.

O intuito do IMEC � qualificar e valorizar o profissional da Engenharia Civil, pois a engenharia faz parte deste meio em um ambiente de constru��es. Principalmente porque � sempre importante lembrar que a Engenharia Civil e sociedade caminham juntas. 
            </textarea></td>
          </tr>
          <tr>
            <td height="45">&nbsp;</td>
          </tr>
          <tr>
            <td><input name="button" type="submit" class="bt-enviar" id="button" value="Atualizar" /></td>
          </tr>
        </table>
        <br />
        <br />
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