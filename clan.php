<?php
	require 'header.php';
?>
	<!-- ////////////////////////////////////////////// -->
<?php
	require 'other/left.php';
	
	if (isset($_GET['info'])) {
		$cinfo = $_GET['info'];
		$query = odbc_exec($connect, "SELECT * FROM Clan WHERE Name = '$cinfo' AND DeleteFlag=0");
	} else {
		$query = odbc_exec($connect, "SELECT TOP 1 * FROM Clan(nolock) WHERE DeleteFlag=0 ORDER BY Point DESC");	
	}
	
	$clans = odbc_fetch_array($query);
	$clid = $clans['CLID'];
	
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
                  <td height="30" class="estilo6"><strong>CLAN HOME</strong></td>
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
                      <td align="center"><table width="390" border="0" align="center" class="login2">
                          <tbody><tr>
                            <td height="5" class="Estilo1" align="center"></td>
                          </tr>
                          <tr>
                            <td height="35" class="Estilo2" align="center">
                               Clan, <?php echo $clans['Name']; ?> 
                              Information</td>
                          </tr>
                          <tr>
                            <td class="Estilo1" align="center" valign="top"><table width="390" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tbody><tr>
                                <td align="center" valign="top"><table width="390" border="0" align="center">
                                  <tbody><tr>
                                    <td height="18" colspan="2" align="center" class="estilo1"><img src="img/clan/no_emblem.png" width="64" height="64"></td>
                                  </tr>
                                  <tr>
                                    <td width="125" align="left" class="estilo1" height="18"></td>
                                    <td width="135" align="left" class="estilo1"></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Rank:</td>
                                    <td align="left" class="estilo1"><?php echo $clans['Ranking']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Points:</td>
                                    <td align="left" class="estilo1"><?php echo $clans['Point']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Win:</td>
                                    <td align="left" class="estilo1"><?php echo $clans['Wins']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Losses:</td>
                                    <td align="left" class="estilo1"><?php echo $clans['Losses']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Draw:</td>
                                    <td align="left" class="estilo1"><?php echo $clans['Draws']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Ratio:</td>
                                    <td align="left" class="estilo1"><?php echo Porcentagem($clans['Wins'], $clans['Losses']); ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Created:</td>
                                    <td align="left" class="estilo1"><?php echo $clans['RegDate']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="estilo1">Members:</td>
                                    <td align="left" class="estilo1"><?php
     $c = odbc_fetch_array(odbc_exec($connect, "SELECT COUNT(*) AS total FROM ClanMember WHERE CLID = '$clid'"));
	 echo $c['total']; ?></td>
                                  </tr>
                                </tbody></table></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" height="10"></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"><table width="390" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center" class="estilo1">Character</td>
                                    <td align="center" class="estilo1">Rank</td>
                                    <td align="center" class="estilo1">Joined</td>
                                    <td align="center" class="estilo1">Points</td>
                                  </tr>
      <?php

$query2 = odbc_exec($connect, "SELECT * FROM ClanMember WHERE CLID = $clid");
while($char = odbc_fetch_array($query2)){

switch ($char['Grade']){
    case "9";
       $grade = "Member";
    break;
    case "2";
       $grade = "Administrator";
    break;
    case "1";
       $grade = "Leader";
    break;
}


?>
                                  <tr>
                                    <td align="center" class="estilo1"><?php echo FormatCharName($char['CID']); ?></td>
                                    <td align="center" class="estilo1"><?php echo $grade; ?></td>
                                    <td align="center" class="estilo1"><?php echo $char['RegDate']; ?></td>
                                    <td align="center" class="estilo1"><?php echo $char['ContPoint']; ?></td>
                                  </tr>
								  <?php } ?>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" height="10"></td>
                              </tr>
                            </tbody></table></td>
                          </tr>
</tbody></table></td>
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