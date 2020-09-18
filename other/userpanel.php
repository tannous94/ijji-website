<?php

 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header("Location: ../index.php");
	exit();
 }
 
  if (isset($_GET['do']) AND $_GET['do'] == "logout")
{
	session_unset();
	session_destroy();
	
	echo '<script language="javascript">';
	echo 'document.location = "index.php"';
	echo '</script>';
	die();
}

 if (isset($_GET['do']) AND $_GET['do'] == "login")
{

	if (empty($_POST['userid']) OR empty($_POST['pass']))
	{
		echo '<script language="javascript">';
		echo 'alert("Fill in both fields")';
		echo '</script>';
	} else {

		$query1 = odbc_exec($connect, "SELECT * FROM Account WHERE UserID = '" . $_POST['userid'] . "'");
		$count1 = odbc_num_rows($query1);

		if (!$count1 >= 1)
		{
			echo '<script language="javascript">';
			echo 'alert("Username does not exist")';
			echo '</script>';
		} else {
		
			if (!$acc_row = odbc_fetch_array($query1)) {
				echo '<script language="javascript">';
				echo 'alert("Database error")';
				echo '</script>';
			}
			
			$pw1 = $_POST['pass'];
			$query2 = odbc_exec($connect, "SELECT * FROM Login WHERE UserID = '" . $_POST['userid'] . "'");
			$count2 = odbc_num_rows($query2);

			if (!$count2 >= 1)
			{
				echo '<script language="javascript">';
				echo 'alert("Username does not exist")';
				echo '</script>';
			} else {
			
				if (!$row = odbc_fetch_array($query2)) {
					echo '<script language="javascript">';
					echo 'alert("Database error")';
					echo '</script>';
				} else {
					if ($pw1 !== $row['Password']) {
						echo '<script language="javascript">';
						echo 'alert("Incorrect password")';
						echo '</script>';
					} else {
						$_SESSION['AID'] = $row['AID'];
						$_SESSION['UserID'] = $row['UserID'];
						$_SESSION['UGradeID'] = $acc_row['UGradeID'];
						
						echo '<script language="javascript">';
						echo 'document.location = "index.php"';
						echo '</script>';
						die();
					}
				}
			}
		}
	}
}

if(!isset($_SESSION['AID']))
{
?>
<script language="javascript">
function UpdateClan()
{
	var Emblem = document.getElementById("emblem");
	var ClanList = document.getElementById("clanlist");
	var MasterTxt = document.getElementById("clanmaster");
	var ClanLink = document.getElementById("editlink");

	var ClanData = ClanList.value;
	var CData = ClanData.split("-|-");

	MasterTxt.innerHTML = CData[1];
	Emblem.src = "img/clan/no_emblem.png";
	ClanLink.href = "javascript:ShowPanel(" + CData[2] + ");";
}
</script>
<form name="login" method="POST" action="index.php?do=login"><table width="180" height="130" border="0" align="center" cellpadding="0" cellspacing="0" background="img/loginzone_bg.png" style="background-repeat:no-repeat; background-position:center">
<table width="184" height="174" border="0" cellpadding="0" cellspacing="0" background="img/r_signin01_renewal.gif" align="center" style="background-repeat:no-repeat; background-position:center;">
  <tr>
    <td width="180" height="20" align="center" valign="top" class="estilo1"><table width="174" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="35"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="69" align="center" valign="top" class="estilo1"><table width="164" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="90" align="left"><input name="userid" type="text" class="Login2" style=" background-image:url(img/usrnm_bg.jpg); background-repeat:no-repeat" tabindex="1" value="" size="15"></td>
        <td width="50" rowspan="3"></td>
        <td width="54" rowspan="3" align="center"><input name="login" type="image" id="login" src="img/r_signin_btnlogin.gif" align="right" width="54" height="38" border="0"></td>
      </tr>
      <tr>
        <td height="4"></td>
      </tr>
      <tr>
        <td align="left">
          <input name="pass"  type="password" class="Login2" style="background-image:url(img/pw_bg.jpg); background-repeat:no-repeat" tabindex="2" size="15"></td>
      </tr>
      <input type="hidden" name="submit" value="1">
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="estilo1"><table width="150" border="0" align="center">
      <tr>
        <td align="center" class="estilo1" height="1"></td>
      </tr>
      <tr>
        <td align="center" class="estilo1"><a href="maintenance.php">Forgot your password?</a> </td>
      </tr>
      <tr>
        <td align="center" class="estilo1" height="1"></td>
      </tr>
      <tr>
        <td align="center"><a href="register.php"><img src="img/btn_free_signup.gif" width="150" height="25" border="0"></a></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<?php
} else {
	
$res9 = odbc_exec($connect, "SELECT * FROM Login WHERE AID = '" . $_SESSION['AID'] . "'");
$a = odbc_fetch_array($res9);

$res = odbc_exec($connect, "SELECT * FROM Character WHERE AID = '" . $_SESSION['AID'] . "'");
$d = odbc_fetch_array($res);
$items = odbc_num_rows($res9);
if ($d) {
	$res2 = odbc_exec($connect, "SELECT * FROM ClanMember WHERE CID = '" . $d['CID'] . "'");
}
$query2 = odbc_exec($connect, "SELECT Coins FROM Account WHERE AID = '" . $_SESSION['AID'] . "'");
$coins = odbc_fetch_array($query2);
?>
<table width="184" height="245" border="0" align="center" cellpadding="0" cellspacing="0" background="img/r_signin02_renewal.gif" style="background-repeat:no-repeat; background-position:top center;">
  <tr valign="top">
    <td align="center" class="estilo1"><table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="10" align="left" class="estilo7"></td>
      </tr>
      <tr>
        <td align="left" class="estilo7">Hi, <?php echo $_SESSION['UserID']; ?> !!!          </td>
      </tr>
      <tr>
        <td align="left" class="estilo6">(Not <?php echo $_SESSION['UserID']; ?>? <a href="index.php?do=logout">Logout here</a>)</td>
      </tr>
      <tr>
        <td align="right" class="estilo6" height="33" valign="bottom"><a href="clanrank.php"><img src="img/r_btn_more.gif" width="24" height="9" border="0"></a></td>
      </tr>
      <tr>
        <td align="right" class="estilo6" height="4" valign="bottom"></td>
      </tr>
      <tr>
        <td align="right" class="estilo6" height="50">          <?php
                                                    if(CheckIfExistClan($_SESSION['AID']))
                                                    {
                                                ?><table width="160" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse: collapse">
                                          <tr>
                                            <td width="77" align="left"><img id="emblem" src="img/clan/no_emblem.png" width="38" height="38" style="border: 1px #000000"></td>
											<td width="83" align="left" class="estilo6">Leader:<br><div id="clanmaster"></div></td>
                                            <td width="77" height="10" align="left">
                                                <select onchange="UpdateClan()" id="clanlist" size="1" name="selclan" class="Login2">
                                                  <?php
                                                            $re = odbc_exec($connect, "SELECT CID FROM Character(nolock) WHERE AID = '" . $_SESSION['AID'] . "' AND DeleteFlag = 0");
                                                            if( odbc_num_rows($re) > 0 )
                                                            {
                                                            while($char = odbc_fetch_array($re))
                                                            {
                                                                     $queryc = odbc_exec($connect, "SELECT * FROM ClanMember(nolock) WHERE CID = '" . $char['CID'] . "'");
                                                                     if( odbc_num_rows($queryc) > 0 )
                                                                     {
                                                                        $a = odbc_fetch_array($queryc);
                                                                        $b = odbc_fetch_array(odbc_exec($connect, "SELECT * FROM Clan(nolock) WHERE CLID = '" . $a['CLID'] . "' AND DeleteFlag = 0"));

                                                                         $C_Name       = $b['Name'];
                                                                         $C_Master     = GetClanMasterByCLID($a['CLID']);
                                                                         $C_CLID       = $a['CLID'];
                                                                         $C_Emblem     = " img/clan/no_emblem.png";

                                                                         $info = implode("-|-", $_CLAN);

                                                                         if($C_Name <> "")
                                                                            echo "<option value = '$info'>" . $C_Name. "</option>";
                                                                     }
                                                                }
                                                            }
                                                            ?>
                                                </select>                                                </td>
                                            
                                          </tr>
          </table></td>
      </tr>                                        <?php
                                                    } else {
                                                    ?>
                                        <table border="0" cellpadding="0" cellspacing="0" width="160" height="100%">
                                          <tr>
                                            <td height="50" align="center" class="Estilo6">You are not in a clan.<br>
Join one or create your own! </td>
                                          </tr>
                                          <td></td>
                                        </table>
                                        <?php
                                                    }
                                                    ?>
      <tr>
        <td height="25" align="center" class="estilo6"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="estilo1">G Coins: <?php echo $coins['Coins']; ?></td>
       
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="35" align="center" class="estilo6"></td>
      </tr>
      <tr>
        <td height="25" align="center" class="estilo6"><table width="164" height="50" border="0" align="center" cellpadding="0" cellspacing="0" background="img/paneloption.jpg" style="background-repeat:no-repeat; background-position:center;">
            <tr>
              <td align="left"><a href="myprofile.php"><img src="img/blank.gif" width="75" height="16" border="0"></a></td>
              <td align="right"><a href="maintenance.php"><img src="img/blank.gif" width="75" height="16" border="0"></a></td>
            </tr>
            <tr>
              <td align="left"><a href="info.php"><img src="img/blank.gif" width="70" height="16" border="0"></a></td>
              <td align="right"><a href="maintenance.php"><img src="img/blank.gif" width="72" height="16" border="0"></a></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><a href="myitems.php"><img src="img/blank.gif" width="82" height="16" border="0"></a></td>
              </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script language="javascript">
									UpdateClan();
								</script>
<?php
}
?>