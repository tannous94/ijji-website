<?php
	require 'header.php';
?>
	<!-- ////////////////////////////////////////////// -->
<?php
	require 'other/left.php';
	
	if (isset($_GET['info'])) {
		$cid = $_GET['info'];
		$res = odbc_exec($connect, "SELECT * FROM Character WHERE CID = $cid");
	} else {
		$res = odbc_exec($connect, "SELECT TOP 1 * FROM Character(nolock) WHERE DeleteFlag=0 ORDER BY XP DESC");	
	}
	
    $char = odbc_fetch_array($res);
	//if (!isset($_GET['info'])) {
		$cid = $char['CID'];
	//}

    $res2 = odbc_exec($connect, "SELECT * FROM Character a, Account b WHERE a.AID=b.AID AND CID = $cid");
    $char2 = odbc_fetch_array($res2);
	
    $res3 = odbc_exec($connect, "SELECT * FROM ClanMember WHERE CID = '" . $char['CID'] . "'"); 
	if (odbc_num_rows($res3) > 0) {
		$clan = odbc_fetch_array($res3);
	}
	
	if (isset($clan['CLID'])) {
		$res4 = odbc_exec($connect, "SELECT * FROM Clan WHERE CLID = '" . $clan['CLID'] . "'"); 
		$claninfo = odbc_fetch_array($res4);
	}
	
    odbc_exec($connect, "UPDATE Character SET Views = Views + 1 WHERE CID = $cid");
    
    //$data = explode("/", $char2['RegDate']);
    $mes = "";
    $dia = "";
    $ano = "";
    $data = ( isset($dia) && isset($mes) && isset($ano) ) ? $dia."/".$mes."/".$ano : "";


?>
	
<!-- //////////////////////////////////////////////////// -->
<td width="237" align="center" valign="top"><table width="422" height="724" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center" bgcolor="#2f5374" valign="top"><table width="422" border="0">
          <tbody><tr>
            <td align="left" class="estilo2">
              <table width="415" height="40" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr bgcolor="#000000">
                  <td height="10" colspan="2"></td>
                  </tr>
                <tr>
                  <td class="estilo2" width="27"><img src="img/mini_detail.gif" width="27" height="25"></td>
                  <td height="30" class="estilo6"><strong>PLAYER HOME </strong></td>
                </tr>
              </tbody></table></td>
          </tr>
          <tr>
            <td align="center" class="Estilo1"><table width="400" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td align="center" class="Estilo1" height="25"></td>
              </tr>
              <tr>
                <td align="center" class="Estilo1" height="25">
				  <table width="400" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                      <td align="center">
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0" class="login3">
                          <tbody><tr>
                            <td height="5" class="Estilo1" align="center"></td>
                          </tr>
                          <tr>
                            <td height="35" class="Estilo2" align="center">
                                <?php echo FormatCharName($char['CID']); ?> Information</td>
                          </tr>
                          <tr>
                            <td class="Estilo1" align="center" valign="top"><table width="390" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tbody><tr>
                                <td align="center" valign="top"><table width="190" border="0" align="center">
                                  <tbody><tr>
                                    <td colspan="2" align="center" class="estilo1">Personal Info</td>
                                  </tr>
                                  <tr>
                                    <td width="125" align="left" class="estilo1" height="18"></td>
                                    <td width="135" align="left" class="estilo1"></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Name:</td>
                                    <td align="left" class="estilo1"><?php echo $char2['Name']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">E-Mail:</td>
                                    <td align="left" class="estilo1"><?php echo $char2['Email']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Sex:</td>
                                    <td align="left" class="estilo1"><?php echo $char2['Sex']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Age:</td>
                                    <td align="left" class="estilo1"><?php echo $char2['Age']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Rank:</td>
                                    <td align="left" class="estilo1"><?php
                                                    switch ( $char2['UGradeID'] ){
                                                        case "0";
                                                        $ugradeid = "Member";
                                                        break;
                                                        case "2";
                                                        $ugradeid = "Event Winner";
                                                        break;
                                                        case "104";
                                                        $ugradeid = "Chat Banned";
                                                        break;
                                                        case "252";
                                                        $ugradeid = "GM";
                                                        break;
														case "253";
                                                        $ugradeid = "Banned";
                                                        break;
														case "254";
                                                        $ugradeid = "Developer";
                                                        break;
														case "255";
                                                        $ugradeid = "Administrator";
                                                        break;
                                                    } echo $ugradeid;

                                                        ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Country:</td>
                                    <td align="left" class="estilo1"><?php echo $char2['Country']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">User Number: </td>
                                    <td align="left" class="estilo1"><?php echo $char['AID']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Visit:</td>
                                    <td align="left" class="estilo1"><?php echo $char['Views']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Created: </td>
                                    <td align="left" class="estilo1"><?php echo $char2['RegDate']; ?></td>
                                  </tr>
                                </tbody></table></td>
                                <td align="center" valign="top"><table width="190" border="0" align="center">
                                  <tbody><tr>
                                    <td colspan="2" align="center" class="estilo1">Character Info</td>
                                  </tr>
                                  <tr>
                                    <td width="125" align="left" class="estilo1" height="18"></td>
                                    <td width="135" align="left" class="estilo1"></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Name:</td>
                                    <td align="left" class="estilo1"><?php echo $char['Name']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Level:</td>
                                    <td align="left" class="estilo1"><?php echo $char['Level']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Ranking:</td>
                                    <td align="left" class="estilo1"><?php echo $char['Ranking']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Exp:</td>
                                    <td align="left" class="estilo1"><?php echo number_format($char['XP'],0,'','.'); ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Kill/Death:</td>
                                    <td align="left" class="estilo1"><?php echo GetKDRatio($char['KillCount'], $char['DeathCount']); ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Clan:</td>
                                    <td align="left" class="estilo1"><?php echo (isset($claninfo['Name'])) ? $claninfo['Name'] : "-" ; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Character Number: </td>
                                    <td align="left" class="estilo1"><?php echo $char['CID']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1" height="18">Created: </td>
                                    <td align="left" class="estilo1"><?php echo $char['RegDate']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1" height="18">Last Login: </td>
                                    <td align="left" class="estilo1"><?php echo $char['LastTime']; ?></td>
                                  </tr>
                                </tbody></table></td>
                              </tr>
                            </tbody></table></td>
                          </tr>
</tbody></table>
</td>
                    </tr>
                  </tbody></table></td>
              </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td height="5" align="center"></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody></table></td>
	
	<!-- //////////////////////////////// -->
    <?php
		require 'other/right.php';
	?>
	
	<!-- ////////////////////////////////////////////// -->
 
 <?php
	require 'footer.php';
 ?>