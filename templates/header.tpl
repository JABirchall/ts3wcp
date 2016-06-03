<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Riek-Media | IT Dienstleistung</title>
<link rel="stylesheet" type="text/css" href="resurces/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="resurces/css/design.css" />
<link rel="stylesheet" type="text/css" href="resurces/css/design2.css" />



<script type="text/javascript" src="resurces/js/jquery.js"></script>

<script type="text/javascript" src="resurces/js/bootstrap.min.js"></script>
<script type="text/javascript" src="resurces/js/bootstrap-tooltip.js"></script>




{literal}
<script type='text/javascript'>
     $(document).ready(function () {
     if ($("[rel=tooltip]").length) {
     $("[rel=tooltip]").tooltip(true);
     }
   });
  </script>
{/literal}


</head>

<body>
<div class="top">
  <div class="site">
    <table width="100%" border="0">
      <tr>
        <td align="left" class="tobnav"><div id="welcome_box">Riek-Media TeamSpeak 3 Web Control</div></td>
        <td align="right" class="tobnav"><div id="welcome_box">Serverzeit: {$time_now}</div></td>
      </tr>
    </table>
  </div>
</div>
<div class="top_logo">
 <div class="site">
 
 <div class="livechat">

 </div>

    <table width="100%" border="0">
      <tr>
        <td width="25%"><a rel="tooltip" data-placement="top" title="TS3WI by Riek-Media.com" href="index.php?site=home"><img src="resurces/img/logo.png" border="0" /></a></td>
        <td width="64%">{if $login==0}<form class="navbar-form pull-right" method="post">
              <input name="user" class="span2" type="text" placeholder="Username">
              <input name="pass" class="span2" type="password" placeholder="Passwort">
              <button name="login" type="submit" class="btn btn-success">Anmelden</button>
            </form>{else}<div align="right" style="color:; font-size:14px; font-weight:bolder">Willkommen zurück, <span align="right" style="color:orange; font-size:14px; font-weight:bolder">{$userName}</span>  <br><span style="color:orange; font-size:10px; font-weight:bolder;">Ihr letzter Login war am {$userLastLogin}</span> </div>{/if}</td>
      </tr>
    </table>
  </div>
</div>



<div class="content site">








{if $login==1}
<table width="100%" border="0">
  <tr>
    <td width="800px"><h3 style="margin-top:-21px; float:left;">
<a class="sitenav" href="index.php">TS3WI</a>
<span class="sitenav"> > </span>
<a class="sitenav" href="index.php" style="text-transform:capitalize;">{$site}</a>
</h3></td>
    <td width="110px">{include file="navA.tpl"}</td>
    {if $site==myproducts and $act==adm and $id!="" and  !$selectedErrors}
    <td width="130px">{include file="navB.tpl"}</td>
    {/if}
  </tr>
</table>

{/if}
{$msg}


      
 
 




<div class="inahlt">






