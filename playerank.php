<?php
	require 'header.php';
	
?>
	<!-- ////////////////////////////////////////////// -->

<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center"> 
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

<table width="784" height="100%" border="0" align="center">
  <tbody><tr valign="top">
    <?php
		require 'other/gamestart.php';
	?>
    <td rowspan="2" align="center" valign="top" bgcolor="#FFFFFF" class="Estilo1" width="620" height="100%"><table width="575" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td height="20"></td>
      </tr>
      <tr>
        <td align="left"><img src="img/tit_individualrank.gif" width="150" height="23"></td>
      </tr>
      <tr>
        <td align="center" class="Estilo1" height="25"></td>
      </tr>
      <tr>
        <td align="center"><table width="573" height="45" border="0" align="center" background="img/box_sch.gif" class="Estilo1" style="background-repeat:no-repeat;">
  <tbody><tr>
    <td align="center"><form method="GET" name="indsearch" action="playerank.php">
                                    <input type="hidden" name="gunz" value="playerank">
                                    <select name="type" class="login">
                                    <option value="1">Game ID</option>
                                    </select>
                                    <input type="text" name="name" class="login">
                                    <input type="submit" value="Search" class="login">
					                </form></td>
  </tr>
</tbody></table>
</td>
      </tr>
      <tr>
        <td height="30" align="left"><img src="img/ranking01_sub02_indi.gif" width="150" height="16"></td>
      </tr>
      <tr>
        <td height="30" align="center"><table width="570" border="0" cellpadding="0" cellspacing="0" height="23" background="img/top_li.gif" style="background-repeat:repeat-x;">
          <tr align="center">
            <td width="72" height="23"  align="center" class="Estilo5"> <b>Ranking</b></td>
            <td width="155" height="23"  align="center" class="Estilo5"> <b>Game ID </b></td>
            <td width="61" height="23"align="center" class="Estilo5"> <b>Level</b></td>
            <td width="121" height="21"  align="center" class="Estilo5"> <b>Experience Points </b></td>
            <td width="125" height="23" align="center" class="Estilo5"> <b>Kill/Death %</b></td>
            </tr>
          <tr>
            <td colspan="5" valign="top">
              <table width="570" border="0">
                                                        <?php
														
														$ranking = 1;
                                                        if(isset($_GET['type']) && isset($_GET['name']))
                                                        {
                                                            $search = 1;
                                                            $type = $_GET['type'];
                                                            $name = $_GET['name'];

                                                            if($type == 1)
                                                            {
                                                                $squery = "SELECT CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE Name = '$name' AND (DeleteFlag=0 OR DeleteFlag=NULL)";
                                                                
                                                            }
                                                            else
                                                            {
                                                                $search = 0;
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $search = 0;
                                                        }

                                                        if($search == 0 )
                                                        {
														if (!isset($_GET['page'])) {
															$_GET['page'] = "";
															$ranks = "SELECT TOP 20 CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY XP DESC";
														}
                                                        switch($_GET['page'] )
                                                        {
                                                            case "":
                                                                $ranks = "SELECT TOP 20 CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY XP DESC";
                                                            break;
                                                            case "2":
                                                                $ranks = "SELECT TOP 40 CID, Level, XP, Ranking, KillCount, DeathCount FROM (SELECT ROW_NUMBER() OVER(ORDER BY XP) AS RoNum , CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 20 >= RoNum ORDER BY tbl.XP DESC";
                                                            break;
                                                            case "3":
                                                                $ranks = "SELECT TOP 60 CID, Level, XP, Ranking, KillCount, DeathCount FROM (SELECT ROW_NUMBER() OVER(ORDER BY XP) AS RoNum , CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 40 >= RoNum ORDER BY tbl.XP DESC";
                                                            break;
                                                            case "4":
                                                                $ranks = "SELECT TOP 80 CID, Level, XP, Ranking, KillCount, DeathCount FROM (SELECT ROW_NUMBER() OVER(ORDER BY XP) AS RoNum , CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 60 >= RoNum ORDER BY tbl.XP DESC";
                                                            break;
                                                            case "5":
                                                                $ranks = "SELECT TOP 100 CID, Level, XP, Ranking, KillCount, DeathCount FROM (SELECT ROW_NUMBER() OVER(ORDER BY XP) AS RoNum , CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 80 >= RoNum ORDER BY tbl.XP DESC";
                                                            break;
                                                            default:
                                                                $ranks = "SELECT TOP 20 CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY XP DESC";
                                                            break;
                                                        }
																
															$res = odbc_exec($connect, $ranks);
																
															// this sql query below is in case the above queries made errors 
															
                                                            //$res = odbc_exec($connect, "SELECT TOP 20 CID, Level, XP, Ranking, KillCount, DeathCount FROM Character(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY XP DESC");
														
                                                            }
															
                                                            else
                                                            {
                                                                $res = odbc_exec($connect, $squery);
                                                            }
                                                              if(odbc_num_rows($res) <> 0)
                                                              {
                                                                while($char = odbc_fetch_array($res))
                                                                  {
                                                                  ?>
                <tr  background="img/li_x_01.gif" style="background-repeat:repeat-x; background-position:bottom;">
                  <td width="63" height="20" align="center" class="Estilo5"> 
                    <?php echo $ranking; ?>                </td>
                  <td width="137" align="center" class="Estilo5"><a href="player.php?info=<?php echo $char['CID']; ?>">
                  <font color="#333333"><b><?php echo FormatCharName($char['CID']); ?></b></font>
                  </a></td>
                  <td width="53" align="center" class="Estilo5">
                    <?php echo $char['Level']; ?></td>
                  <td width="107" align="center" class="Estilo5">
                    <?php echo number_format($char['XP'], 0, ",", "."); ?></td>
                  <td width="109" align="center" class="Estilo5">
                    <?php echo GetKDRatio($char['KillCount'], $char['DeathCount']); ?></td>
                </tr>
                <?php
                                                    $ranking++;       
                                                            }
                                                        }else{
                                                        ?>
                <tr>
                  <td height="35" colspan="5" align="center" class="estilo5">- No Data - </td>
                </tr>
                <?php
                                                        }
                                                        ?>
            </table></td>
            </tr>
          <tr>
            <td colspan="5" valign="top" height="10"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="35" align="center" class="login5">          <table width="500" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody><tr>
              <td height="8" align="center" background="img/rank_pgnavi_t.gif" style="background-repeat:repeat-x; background-position:top;"></td>
            </tr>
            <tr>
              <td height="30" align="center" class="estilo5" valign="baseline"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody><tr>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="playerank.php"><font color="#333333">1-20</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="playerank.php?page=2"><font color="#333333">20-40</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="playerank.php?page=3"><font color="#333333">40-60</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="playerank.php?page=4"><font color="#333333">60-80</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="playerank.php?page=5"><font color="#333333">80-100</font></a></td>
                      </tr>
                    </tbody></table></td>
                  </tr>
                </tbody></table>
                </td>
            </tr>
            <tr>
              <td background="img/rank_pgnavi_t.gif" style="background-repeat:repeat-x; background-position:bottom;" height="8"></td>
            </tr>
          </tbody></table>
          </td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td width="160" align="center" valign="top" bgcolor="#004f86" background="img/bg_content_wm.gif" style="background-repeat:no-repeat; background-position:top;" ><table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top" height="2"></td>
      </tr>
      <tr>
        <td align="center" valign="top" ><img src="img/ltit_ranking.gif" width="150" height="42">
          <table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" background="img/lbox01_t.gif" style="background-repeat:no-repeat; background-position:top;" height="6"></td>
            </tr>
            <tr>
              <td align="center" background="img/lbox01_b.gif" style="background-repeat:no-repeat;"><a href="clanrank.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('ClanRank','','img/clanranking_select_on.jpg',1)"><img name="ClanRank" border="0" src="img/clanranking_select.jpg" alt="ClanRank"></a><br>                <a href="playerank.php"><img src="img/playeranking_select_on.jpg" width="130" height="26" border="0"></a><br>
                <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hallfame','','img/hallfame_select_on.jpg',1)"><img name="hallfame" border="0" src="img/hallfame_select.jpg" alt="HallOfFame"></a></td>
            </tr>
            <tr>
              <td align="center" background="img/lbox01_b.gif" style="background-repeat:no-repeat; background-position:bottom" height="6"></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</tbody></table>
</td>
      </tr>
    </tbody></table>
	
		<!-- ////////////////////////////////////////////// -->
 
 <?php
	require 'footer.php';
 ?>