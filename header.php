<?php
session_start();

 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header("Location: index.php");
	exit();
 }
	
include "secure/config.php";

         
	include "secure/SQLCheck.php";
	include "secure/AntiSQLi.php";
	
include "secure/functions.php";
 
?>

<html>
<head>
<title>ijji - Where Gamers Unite!</title>
<link rel="icon" href="img/favicon.ico" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('img/topbar_navi02_on.gif','img/topbar_navi04_on.gif','img/topbar_navi05_on.gif','img/topbar_navi08_on.gif','img/topbar_navi10_on.gif')">
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td><table width="100%" height="191" border="0" align="center" cellpadding="0" cellspacing="0" style="background-repeat: repeat-x; background-image:url(img/top_bar.jpg); background-position:top;" >
  <tr>
    <td height="13" align="center" valign="top"><table width="788" height="93" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(img/gblhdr_topbnnr_bg.jpg); background-repeat:no-repeat; background-position:center;">
      <tr>
        <td align="center" valign="top"><a href="index.php"><img src="img/ijji_banner.jpg" width="728" height="80" border="0"></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="13" align="center" valign="center"><table width="771" height="45" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="243" valign="bottom" align="left"><a href="index.php"><img src="img/logotype.jpg" width="200" height="40" border="0"></a></td>
        <td width="18" valign="bottom" align="right"></td>
        <td width="526" align="right"><table width="500" height="20" border="0" cellpadding="0" cellspacing="0" background="img/top_select_bar.jpg" style="background-repeat:no-repeat; background-position:center;">
          <tr>
            <td align="right"><a href="coins.php"><img src="img/blank.gif" width="70" height="20" border="0"></a><a href="register.php"><img src="img/blank.gif" width="102" height="20" border="0"></a><a href="myprofile.php"><img src="img/blank.gif" width="72" height="20" border="0"></a><a href="staff.php"><img src="img/blank.gif" width="67" height="20" border="0"></a><a href="#"><img src="img/blank.gif" width="107" height="20" border="0"></a></td>
          </tr>
        </table>          </td>
      </tr>
    </table></td>
  </tr>
  <!-- //Announcement Part -->
  <!-- Top Banner part -->
  <tr>
    <td height="13" align="center" valign="bottom">
		<table width="780" height="41" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(img/bg_topnavbar.gif); background-position:center; background-repeat:no-repeat;">
      <tr>
        <td width="104" align="right" valign="bottom"><a href="index.php"><img src="img/topbar_navi00.gif" width="96" height="31" border="0"></a></td>
        <td width="10"></td>
        <td width="663" valign="bottom"><table width="200" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td><a href="rules.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('guide','','img/topbar_navi02_on.gif',1)"><img src="img/topbar_navi02.gif" alt="GameGuide" name="guide" width="86" height="41" border="0"></a><a href="maintenance.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Forum','','img/topbar_navi04_on.gif',1)"><img src="img/topbar_navi04.gif" alt="Community" name="Forum" width="61" height="41" border="0"></a><a href="playerank.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Ranking','','img/topbar_navi05_on.gif',1)"><img src="img/topbar_navi05.gif" alt="Ranking" name="Ranking" width="71" height="41" border="0"></a><a href="shop.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Shop','','img/topbar_navi08_on.gif',1)"><img src="img/topbar_navi08.gif" alt="ItemShop" name="Shop" width="79" height="41" border="0"></a><a href="https://gunz.fandom.com/wiki/Ijji" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Wiki','','img/topbar_navi10_on.gif',1)"><img src="img/topbar_navi10.gif" alt="GunZWiki" name="Wiki" width="75" height="41" border="0"></a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<!-- //Top Banner part -->
      <table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" style="background-image:url(img/background00.jpg); background-repeat:repeat-x;">
        <tr valign="top">
          <td><table id="rimg" width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(img/header/ijji6.jpg); background-repeat:no-repeat; background-position:top center;">
  <tr>
    <td align="center" height="167" valign="bottom"><table width="780" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right"><table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="160"></td>
            <td width="422" align="center" valign="bottom"></td>
            <td valign="top"><table width="190" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">
				<?php 
				  if(isset($_SESSION['UGradeID']) && $_SESSION['UGradeID'] == 255 ) { 
					?>
                  
                    <a href="admin.php" class="login2">Admin Panel</a>
                  
                  <?php } ?>
                  <!-- Admin and GM Panel Zone -->
                  <!-- //Admin and GM Panel Zone -->
                </td>
              </tr>
              <!-- Event Part -->
              <tr>
                <td align="center"><img src="img/blank.gif" width="190" height="120"></td>
              </tr>
            </table></td>
          </tr>
        </table>
        </td>
      </tr>
    </table></td>
  </tr>
  <!-- //Event Part -->
  
 <!-- Modules Part -->
  <tr>
    <td align="center">