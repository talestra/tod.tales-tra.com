<?php
$section = !empty($_GET['s']) ? $_GET['s'] : 'principal';
$include_file = sprintf('%s/s/%s.php', dirname(__FILE__), basename($section));
if (!is_file($include_file)) {
die('Not found!');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tales of Destiny en español</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<link type="image/x-icon" href="favicon.ico" rel="icon" />
<script src="jquery.js" type="text/javascript"></script>
<script src="TagsPlugin.js" type="text/javascript"></script>
</head>
<body>
<div id="cabecera1">
  <div id="header_links">
    <div id="logo" class="logo"><a href="?s=principal" title=""></a></div>
    <div id="talestra" class="logo"><a href="http://tales-tra.com" title=""></a></div>
  </div>
  <div id="menu" class="menu">
    <table width="450" border="0">
      <tr>
        <td width="81" align="center"><a href="?s=principal" title="Principal">Principal</a></td>
        <td width="89" align="center"><a href="?s=descargar" title="Descargar">Descargar</a></td>
        <td width="47" align="center"><a href="?s=faq" title="FAQ">FAQ</a></td>
        <td width="81" align="center"><a href="?s=capturas" title="Capturas">Capturas</a></td>
        <td width="48" align="center"><a href="?s=guia" title="Guía">Guía</a></td>
        <td width="78" align="center"><a href="?s=creditos" title="Créditos">Créditos</a></td>
      </tr>
    </table>
  </div>
</div>
<div id="contenido">
  <div id="texto">
    <?php include $include_file; ?>
  </div>
  <div id="contenido-ab1"> </div>
</div>
<div id="pie" class="pie">
  <p><a href="http://blog.tales-tra.com/acerca-de" title="Acerca de Tales Translations">Acerca de Tales Translations</a> | <a href="http://blog.tales-tra.com/contacto" title="Contacto con Tales Translations">Contacto</a> | <a href="http://blog.tales-tra.com/" title="Próximas traducciones de Tales Translations">Próximas traducciones</a> | <a href="http://blog.tales-tra.com/donar" title="Donar a Tales Translations">Acerca de donar</a></p>
</div>
<!-- Start of StatCounter Code --> 
<script type="text/javascript">
var sc_project=6255592; 
var sc_invisible=1; 
var sc_security="4bf8a75c"; 
</script> 
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<noscript>
<div
class="statcounter"><a title="weebly reliable statistics"
href="http://statcounter.com/weebly/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/6255592/0/4bf8a75c/1/"
alt="weebly reliable statistics" ></a></div>
</noscript>
<!-- End of StatCounter Code -->
</body>
</html>