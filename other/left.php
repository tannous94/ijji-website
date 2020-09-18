<?php
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header("Location: ../index.php");
	exit();
 }
?>	
	
	<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center"><table width="802" height="500" border="0" align="center">
  <tbody><tr>
  
  <!-- /////////////////////////////////////////////////////////// -->
    <td width="100" align="center" valign="top">
      <table width="100" height="10" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td height="10" align="center"></td>
        </tr>
      </tbody></table></td>
    <td width="160" height="26" align="center" valign="top"><table width="160" height="724" border="0" cellpadding="0" cellspacing="0" bgcolor="#004f86">
      <tbody><tr>
        <td width="157" height="496" align="center" valign="top"><table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody><tr>
            <td align="center" height="15"></td>
          </tr>
          <tr>
            <td align="center"><a href="download.php"><img src="img/l_main_sysreqdl.gif" width="150" height="45" border="0"></a></td>
          </tr>
          <tr>
            <td align="center" height="14"></td>
          </tr>
          <tr>
            <td align="center"><a href="rules.php"><img src="img/l_howto_renewal.gif" width="150" height="76" border="0"></a></td>
          </tr>
          <tr>
            <td height="5" align="center"></td>
          </tr>
          <tr>
            <td height="14" align="center"><table width="150" height="112" border="0" cellpadding="0" cellspacing="0" background="img/clan_bg.jpg" style="background-repeat:no-repeat; background-position:center">
  <tbody><tr>
    <td height="24" align="center"><table width="135" height="10" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td height="15"></td>
          <td align="right"><a href="clanrank.php"><img src="img/btn_more08.gif" width="25" height="14" border="0"></a></td>
        </tr>
    </tbody></table></td>
  </tr>

  <tr>
    <td align="center"><table width="130" cellpadding="0" cellspacing="0">
      <tr>
        <td width="12"></td>
        <td width="89"></td>
        <td width="34"></td>
      </tr>
      <?php
	  $res = odbc_exec($connect, "SELECT TOP 5 * FROM Clan WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY POINT DESC");
	  
                                    if (odbc_num_rows($res) == 0) {
                                        ?>
      <tr>
        <td colspan="3" align="center" class="estilo1"><font color="#FFFFFF">- No Data -</font></td>
        </tr>
      <?php
                                    } else {
										while($clan = odbc_fetch_array($res)) {

                                    ?>
      <tr>
        <td width="12" height="16" valign="center"></td>
        <td width="89" height="10" align="left" class="estilo1"><font color="#FFFFFF"><a href="clan.php?info=<?php echo $clan['Name']; ?>">
          <?php echo $clan['Name']; ?>
        </a> </font></td>
        <td width="34" align="right" class="estilo6">
          <font color="#FFFFFF"><?php echo $clan['Point']; ?></font>
        </td>
      </tr>
      <?php 
		}	  
	  }
	  ?>
    </table></td>
  </tr>
  <tr>
    <td align="center" height="5"></td>
  </tr>
</tbody></table>
</td>
          </tr>
          <tr>
            <td height="3" align="center"></td>
          </tr>
          <tr>
            <td height="14" align="center"><table width="150" height="112" border="0" cellpadding="0" cellspacing="0" background="img/player_bg.jpg" style="background-repeat:no-repeat; background-position:center">
  <tbody><tr>
    <td height="24" align="center"><table width="135" height="10" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td height="15"></td>
          <td align="right"><a href="playerank.php"><img src="img/btn_more08.gif" width="25" height="14" border="0"></a></td>
        </tr>
    </tbody></table></td>
  </tr>

  <tr>
    <td align="center"><table width="130" cellpadding="0" cellspacing="0">
      <tr>
        <td width="12"></td>
        <td width="89"></td>
        <td width="34"></td>
      </tr>
      <?php
		$res = odbc_exec($connect, "SELECT TOP 5 * FROM Character WHERE (DeleteFlag=0 OR DeleteFlag=NULL) ORDER BY Level DESC");
                                    if(odbc_num_rows($res) == 0) {
                                        ?>
      <tr>
        <td colspan="3" align="center" class="estilo1"><font color="#FFFFFF">- No Data -</font></td>
        </tr>
      <?php
                                    } else {
										while($player = odbc_fetch_array($res)) {

                                    ?>
      <tr>
        <td width="12" height="16" valign="center"></td>
        <td width="89" height="10" align="left" class="estilo1"><font color="#FFFFFF"><a href="player.php?info=<?php echo $player['CID']; ?>"><?php echo $player['Name']; ?></a></font></td>
        <td width="34" align="right" class="estilo6">
          <font color="#FFFFFF"><?php echo $player['Level']; ?></font>
        </td>
      </tr>
      <?php
		}
	  } 
	  ?>
    </table></td>
  </tr>
  <tr>
    <td align="center" height="5"></td>
  </tr>
</tbody></table>
</td>
          </tr>
          <tr>
            <td height="4" align="center"></td>
          </tr>
          <tr>
            <td height="14" align="center"></td>
          </tr>
          <tr>
            <td height="4" align="center"></td>
          </tr>
          <tr>
            <td height="10" align="center"><a href="#"><img src="img/sign_banner.jpg" width="150" height="50" border="0"></a></td>
          </tr>
          <tr>
            <td height="10" align="center"></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody></table></td>