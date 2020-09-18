<?php
	require 'header.php';

?>
	<!-- ////////////////////////////////////////////// -->

<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center">
<script language="JavaScript" type="text/JavaScript">
<!--
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

//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
        <td align="left"><img src="img/tit_guildranking.gif" width="150" height="23"></td>
      </tr>
      <tr>
        <td align="center" class="Estilo1" height="25"></td>
      </tr>
      <tr>
        <td align="left" class="Estilo1" height="30"><img src="img/guild03_sub02.gif" width="150" height="16"></td>
      </tr>
      <tr>
        <td align="center" class="Estilo1" height="25">
					<table width="573" height="160" border="0" align="center" background="img/rank_bg_best.gif" style="background-position:center; background-repeat:no-repeat;">
    <tbody><tr><td width="133" height="10"></td>
  </tr><tr>
    <td width="143" align="center"><img src="img/clan/no_emblem.png" width="64" height="64" style="border: 1px solid #000000"></td>
    <td width="143" align="center"><img src="img/clan/no_emblem.png" width="64" height="64" style="border: 1px solid #000000"></td>
    <td width="143" align="center"><img src="img/clan/no_emblem.png" width="64" height="64" style="border: 1px solid #000000"></td>
    <td width="143" align="center"><img src="img/clan/no_emblem.png" width="64" height="64" style="border: 1px solid #000000"></td>
  </tr>
  <tr height="12">
    <td class="estilo5"><center><b><font color="#FF9900"><blink>1ST No Data</blink></font></b></center></td>
    <td class="estilo5"><center><b>2ND No Data</b></center></td>
    <td class="estilo5"><center><b>3RD No Data</b></center></td>
	<td class="estilo5"><center><b>4TH No Data</b></center></td>
  </tr>
      <tr><td width="133" height="5"></td>
</tr></tbody></table> </td>
      </tr>
      <tr>
        <td align="center" class="Estilo1" height="15"></td>
      </tr>
      <tr>
        <td align="center"><table width="573" height="45" border="0" align="center" cellpadding="0" cellspacing="0" background="img/box_sch.gif" class="Estilo1" style="background-repeat:no-repeat;">
  <tbody><tr>
    <td align="center"><form method="GET" name="rnksearch" action="clanrank.php">
                                    <input type="hidden" name="gunz" value="clanrank">
                                    <select name="type" class="login">
                                    <option value="1">Clan Name</option>
                                    </select>
                                    <input type="text" name="name" class="login">
                                    <input type="submit" value="Search" class="login">
                </form></td>
  </tr>
</tbody></table>
</td>
      </tr>
      <tr>
        <td height="30" align="left"><img src="img/ranking01_sub02.gif" width="150" height="16"></td>
      </tr>
      <tr>
        <td height="30" align="center"><table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody><tr align="center" background="img/top_li.gif" style="background-repeat:repeat-x;">
            <td width="37" height="23" align="center" class="Estilo5"><b>Ranking</b></td>
            <td width="54" height="23" align="center" class="Estilo5"><b>Mark</b></td>
            <td width="108" height="23" align="center" class="Estilo5"><b>Clan Name</b></td>
            <td width="79" height="23" align="center" class="Estilo5"><b>Leader</b></td>
            <td width="85" height="23" align="center" class="Estilo5"><b>Win/Lossed %</b></td>
            <td width="59" height="23" align="center" class="Estilo5"><b>Points</b></td>
          </tr>
          <tr>
            <td colspan="6" valign="top">
              <table width="570" border="0" align="center" style="border-collapse: collapse">
                <?php
												
													$ranking = 1;
                                                        if( isset($_GET['type']) && isset($_GET['name']) )
                                                        {
                                                            $search = 1;
                                                            $type = $_GET['type'];
                                                            $name = $_GET['name'];

                                                            if($type == 1)
                                                            {
                                                                $squery = "SELECT * FROM Clan(nolock) WHERE Name = '$name'";
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

														if (!isset($_GET['page'])) {
															$_GET['page'] = "";
															$ranks = "SELECT TOP 20 * FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY Point DESC";
														}
                                                        if( $search == 0 )
                                                        {
                                                            switch( $_GET['page'] )
                                                            {
                                                                case "":
                                                                    $ranks = "SELECT TOP 20 * FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY Point DESC";
                                                                break;
                                                                case "2":
                                                                    $ranks = "SELECT TOP 40 * FROM (SELECT ROW_NUMBER() OVER(ORDER BY Point) AS RoNum,* FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 20 >= RoNum ORDER BY tbl.Point DESC";
                                                                break;
                                                                case "3":
                                                                    $ranks = "SELECT TOP 60 * FROM (SELECT ROW_NUMBER() OVER(ORDER BY Point) AS RoNum,* FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 40 >= RoNum ORDER BY tbl.Point DESC";
                                                                break;
                                                                case "4":
                                                                    $ranks = "SELECT TOP 80 * FROM (SELECT ROW_NUMBER() OVER(ORDER BY Point) AS RoNum,* FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 60 >= RoNum ORDER BY tbl.Point DESC";
                                                                break;
                                                                case "5":
                                                                    $ranks = "SELECT TOP 100 * FROM (SELECT ROW_NUMBER() OVER(ORDER BY Point) AS RoNum,* FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL)) AS tbl WHERE 80 >= RoNum ORDER BY tbl.Point DESC";
                                                                break;
                                                                default:
                                                                    $ranks = "SELECT TOP 20 * FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY Point DESC";
                                                                break;
                                                            }
														
															$res = odbc_exec($connect, $ranks);
																
															// this sql query below is in case the above queries made errors 
															
                                                            //$res = odbc_exec($connect, "SELECT TOP 20 * FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY Point DESC");
                                                        }
                                                        else
                                                        {
                                                            $res = odbc_exec($connect, $squery);
                                                        }
                                                        if(odbc_num_rows($res) <> 0)
                                                        {
                                                            while($clan = odbc_fetch_array($res))
                                                            {

                                                $clanemburl = ($clan['EmblemUrl'] == "") ? "no_emblem.png" : $clan['EmblemUrl'];
                                                     ?>
                <tr>
                  <td colspan="6" align="center" class="Estilo1" height="6"></td>
                  </tr>
                <tr>
                  <td width="57" align="center" class="Estilo5">
                    <?php echo $ranking; ?>
                  </td>
                  <td width="59" align="center" class="Estilo5"><img src="<?php echo ($clan['EmblemUrl'] == "") ? "img/clan/no_emblem.png" : $clan['EmblemUrl']; ?>" width="34" height="30" style="border: 1px solid #000000"></td>
                  <td width="142" align="center" class="Estilo5">
                    <a href="clan.php?info=<?php echo $clan['Name']; ?>"><font color="#505050"><b><?php echo $clan['Name']; ?></b></font></a></td>
                  <td width="101" align="center" class="Estilo5"> <a href="player.php?info=<?php echo $clan['MasterCID']; ?>">
                    <font color="#505050"><?php echo GetCharNameByCID($clan['MasterCID']); ?></font>
                  </a></td>
                  <td width="111" align="center" class="Estilo5"><?php echo $clan['Wins'] . "/" . $clan['Losses']; ?>                    <?php echo GetClanPercent($clan['Wins'], $clan['Losses']); ?>                    </td>
                  <td width="74" align="center" class="Estilo5"><?php echo $clan['Point']; ?></td>
                </tr>
                <?php
                                                            $ranking++;
                                                            }
                                                        }else{
                                                        ?>
                <tr>
                  <td height="35" colspan="6" align="center" class="estilo5">- No Data - </td>
                </tr>
                <?php
                                                        }
                                                        ?>
            </table></td>
          </tr>
          <tr>
            <td colspan="6" valign="top" height="10"></td>
          </tr>
        </tbody></table></td>
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
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="clanrank.php"><font color="#333333">1-20</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="clanrank.php?page=2"><font color="#333333">20-40</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="clanrank.php?page=3"><font color="#333333">40-60</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="clanrank.php?page=4"><font color="#333333">60-80</font></a></td>
                      </tr>
                    </tbody></table></td>
                    <td align="center"><table width="83" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="center" class="estilo5" style="background-repeat:no-repeat; background-position:center; font-weight: bold;" background="img/rank_pgnavi_box.gif" height="8"><a href="clanrank.php?page=5"><font color="#333333">80-100</font></a></td>
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
	 
	<td width="160" align="center" valign="top" bgcolor="#004f86" background="img/bg_content_wm.gif" style="background-repeat:no-repeat; background-position:top;">
	<table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center" valign="top" height="2"></td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="img/ltit_ranking.gif" width="150" height="42">
          <table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody><tr>
              <td align="center" background="img/lbox01_t.gif" style="background-repeat:no-repeat; background-position:top;" height="6"></td>
            </tr>
            <tr>
              <td align="center" background="img/lbox01_b.gif" style="background-repeat:no-repeat;"><a href="clanrank.php"><img src="img/clanranking_select_on.jpg" width="130" height="26" border="0"></a><br>                <a href="playerank.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('PlayerRank','','img/playeranking_select_on.jpg',1)"><img name="PlayerRank" border="0" src="img/playeranking_select.jpg" alt="PlayerRank"></a><br>
                <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('hallfame','','img/hallfame_select_on.jpg',1)"><img name="hallfame" border="0" src="img/hallfame_select.jpg" alt="HallOfFame"></a></td>
            </tr>
            <tr>
              <td align="center" background="img/lbox01_b.gif" style="background-repeat:no-repeat; background-position:bottom" height="6"></td>
            </tr>
          </tbody></table></td>
      </tr>
    </tbody></table>
  </td>
	 </tr>
</tbody></table>
</td>
      </tr>
    </tbody></table>
	
	<!-- ////////////////////////////////////////////// -->
 
 <?php
	require 'footer.php';
 ?>