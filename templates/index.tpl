{include file="header.tpl"}

<h1>Herzlich Willkommen auf dem TeamSpeak 3 Web Control von Riek-Media</h1>
<div align="right" style="margin-top:-21px;">
<a class="sitenav" href="index.php">TS3WI</a>
<span class="sitenav"> > </span>
<a class="sitenav" href="index.php?site=home">Startseite</a>
</div>

<hr class="myhr" color="#DDDDDD" />



<table width="100%" border="0">
  <tr valign="top">
    <td style=""><p>Willkommen auf dem TeamSpeak 3 Web Control Panel aus dem Hause Riek-Media. Dies' ist ein Web Control Panel zur Verwaltung von TeamSpeak 3 Servern.  Bitte beachten Sie, dass sich dieses Produkt noch in der Betaphase befindet und Fehler somit nicht ausgeschlossen werden können. Sollten Sie einen Fehler entdecken so zögern Sie nicht uns zu kontaktieren.</p>
<p>Verwalten Sie kinderleicht Ihren Server <a href="http://www.riek-media.com" target="_blank" style="color:red;"><b>Riek-Media</b></a>.
      </p></td>
    </tr>
</table>




{foreach from=$newslist item=newsliste}
<div class="box100">
<table width="100%" border="0">
  <tr valign="top">
    <td width="70%" style="margin:5px;"><a href="#"><h2 align="">{$newsliste.newsTitel}<hr class="myhr" color="#DDDDDD" /></h2></a></td>
    <td width="30%" style="margin:5px;"><a href="#"><h2 align="right">Geschrieben am: {$newsliste.newsData}<hr class="myhr" color="#DDDDDD" /></h2></a></td>
    </tr>
    <tr valign="top">
    <td colspan="2" style=" margin:5px;">{$newsliste.newsText}</td>
    </tr>
  </table>
</div>
{/foreach}


  <div class="clearer"></div>
    
    </td>
  </tr>
</table>

    <div class="alert alert-info">ACHTUNG: Diese Software ist eine Beta und NICHT für den produktiven Einsatz geeignet!!!</div>


</div>


</div>


{include file="footer.tpl"}