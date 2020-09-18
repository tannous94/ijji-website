<?php
	require 'header.php';
	
	if(!isset($_SESSION['AID'])) {
		echo '<script language="javascript">';
		echo 'alert("You must be logged in");';
		echo 'document.location = "index.php"';
		echo '</script>';
		die();
	}
	
	if(isset($_SESSION['UGradeID'])) {
		if ($_SESSION['UGradeID'] != 255) {
			echo '<script language="javascript">';
			echo 'alert("Access denied");';
			echo 'document.location = "index.php"';
			echo '</script>';
			die();
		}
	}
	
	//////////////////////////////////////////////////////
	
	// Can add later control for IndexContent table (add updates/announcements)
	// Also control for item shop, add items and such
	//////////////////////////////////////////////////////
	
	$rankerr = "";
	$pwderr = "";
	$renterr = "";
	$coinserr = "";
	$nameerr = "";
	$lvlerr = "";
	$xperr = "";
	$bperr = "";
	$senderr = "";
	$delerr = "";
	
if (isset($_POST['submit'])) {
	
	if ($_POST['user1'] != "" && $_POST['rank'] != "") {
		$query1 = odbc_exec($connect, "SELECT AID FROM Account WHERE UserID = '" . $_POST['user1'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			odbc_exec($connect, "UPDATE Account SET UGradeID='" . $_POST['rank'] . "' WHERE UserID='" . $_POST['user1'] . "'");	
		} else {
			$rankerr = "user rank (user does not exist)";
		}
	}
	
	if ($_POST['user2'] != "" && $_POST['userpass'] != "") {
		$query1 = odbc_exec($connect, "SELECT AID FROM Account WHERE UserID = '" . $_POST['user2'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			odbc_exec($connect, "UPDATE Login SET Password='" . $_POST['userpass'] . "' WHERE UserID='" . $_POST['user2'] . "'");	
		} else {
			$pwderr = "user password (user does not exist)";
		}
	}
	
	if ($_POST['user3'] != "" && $_POST['itemidrent'] != "" && $_POST['hrs'] != "") {
		$query1 = odbc_exec($connect, "SELECT AID FROM Account WHERE UserID = '" . $_POST['user3'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			$row = odbc_fetch_array($query1);
			if(is_numeric($_POST['itemidrent']) && $_POST['itemidrent'] >= 0) {
				odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $row['AID'] . "', '" . $_POST['itemidrent'] . "', GETDATE(), '" . $_POST['hrs'] . "', 1)");
			} else {
				$renterr = "user rent item (invalid input)";
			}
		} else {
			$renterr = "user rent item (user does not exist)";
		}
	} 
	
	if ($_POST['user4'] != "" && $_POST['gcoins'] != "") {
		$query1 = odbc_exec($connect, "SELECT AID FROM Account WHERE UserID = '" . $_POST['user4'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			if(is_numeric($_POST['gcoins']) && $_POST['gcoins'] >= 0) {
				odbc_exec($connect, "UPDATE Account SET Coins='" . $_POST['gcoins'] . "' WHERE UserID='" . $_POST['user4'] . "'");
			} else {
				$coinserr = "user coins (invalid input)";
			}
		} else {
			$coinserr = "user coins (user does not exist)";
		}
	}
	
	if ($_POST['char1'] != "" && $_POST['charname'] != "") {
		$query1 = odbc_exec($connect, "SELECT * FROM Character WHERE Name = '" . $_POST['char1'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			odbc_exec($connect, "UPDATE Character SET Name='" . $_POST['charname'] . "' WHERE Name='" . $_POST['char1'] . "'");
		} else {
			$nameerr = "character name (character does not exist)";
		}
	}
	
	if ($_POST['char2'] != "" && $_POST['charlvl'] != "") {
		$query1 = odbc_exec($connect, "SELECT * FROM Character WHERE Name = '" . $_POST['char2'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			if(is_numeric($_POST['charlvl']) && $_POST['charlvl'] >= 0 && $_POST['charlvl'] < 100) {
				odbc_exec($connect, "UPDATE Character SET Level='" . $_POST['charlvl'] . "' WHERE Name='" . $_POST['char2'] . "'");
			} else {
				$lvlerr = "character level (invalid input)";
			}
		} else {
			$lvlerr = "character level (character does not exist)";
		}
	}
	
	if ($_POST['char3'] != "" && $_POST['charxp'] != "") {
		$query1 = odbc_exec($connect, "SELECT * FROM Character WHERE Name = '" . $_POST['char3'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			if(is_numeric($_POST['charxp']) && $_POST['charxp'] >= 0) {
				odbc_exec($connect, "UPDATE Character SET XP='" . $_POST['charxp'] . "' WHERE Name='" . $_POST['char3'] . "'");
			} else {
				$xperr = "character exp (invalid input)";
			}
		} else {
			$xperr = "character exp (character does not exist)";
		}
	}
	
	if ($_POST['char4'] != "" && $_POST['charbp'] != "") {
		$query1 = odbc_exec($connect, "SELECT * FROM Character WHERE Name = '" . $_POST['char4'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			if(is_numeric($_POST['charbp']) && $_POST['charbp'] >= 0) {
				odbc_exec($connect, "UPDATE Character SET BP='" . $_POST['charbp'] . "' WHERE Name='" . $_POST['char4'] . "'");
			} else {
				$bperr = "character bounty (invalid input)";
			}
		} else {
			$bperr = "character bounty (character does not exist)";
		}
	}
	
	if ($_POST['char5'] != "" && $_POST['itemid1'] != "") {
		$query1 = odbc_exec($connect, "SELECT * FROM Character WHERE Name = '" . $_POST['char5'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			$row = odbc_fetch_array($query1);
			if(is_numeric($_POST['itemid1']) && $_POST['itemid1'] >= 0) {
				odbc_exec($connect, "INSERT INTO CharacterItem (CID, ItemID, RegDate) VALUES ('" . $row['CID'] . "', '" . $_POST['itemid1'] . "', GETDATE())");
			} else {
				$senderr = "character send item (invalid input)";
			}
		} else {
			$senderr = "character send item (character does not exist)";
		}
	}
	
	if ($_POST['char6'] != "" && $_POST['itemid2'] != "") {
		$query1 = odbc_exec($connect, "SELECT * FROM Character WHERE Name = '" . $_POST['char6'] . "'");
		$count1 = odbc_num_rows($query1);
		
		if ($count1 >= 1)
		{
			$row = odbc_fetch_array($query1);
			if(is_numeric($_POST['itemid2']) && $_POST['itemid2'] >= 0) {
				odbc_exec($connect, "DELETE FROM CharacterItem WHERE CID = '" . $row['CID'] . "' AND ItemID = '" . $_POST['itemid2'] . "'");
			} else {
				$delerr = "character delete item (invalid input)";
			}
		} else {
			$delerr = "character delete item (character does not exist)";
		}
	}
	
	
}
	
	
?>
	<!-- ////////////////////////////////////////////// -->
<?php
	require 'other/left.php';
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
                  <td height="30" class="estilo6"><strong>ADMIN CONTROL PANEL </strong></td>
                </tr>
              </tbody></table></td>
          </tr>
          <tr>
            <td align="center" class="Estilo1">
			<form name="reg" method="POST" action="admin.php">
						<table width="400" border="0" align="center">
                            <tbody><tr>
                              <td colspan="2" align="center" class="Estilo1"></td>
                            </tr>
                          
                            <tr>
                              <td align="center" class="Estilo1" height="10"></td>
                              <td width="197" align="center" class="Estilo1"></td>
							  <td align="center" class="Estilo1" height="10"></td>
                              <td width="197" align="center" class="Estilo1"></td>
                            </tr>
                            <tr>
                              <td width="50" align="left" class="Estilo1">UserID:</td>
                              <td class="Estilo1" align="left"><input name="user1" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="200" align="left" class="Estilo1">Set rank to:</td>
                              <td class="Estilo1" align="left">
								  <select name="rank" class="Login">
									  <option value="">Select...</option>
									  <option value="0">Normal</option>
									  <option value="2">Jjang</option>
									  <option value="253">Banned</option>
									  <option value="254">GM (254)</option>
								  </select>
							  </td>
                            </tr>
                            <tr>
                              <td width="700" align="left" class="Estilo1">UserID:</td>
                              <td class="Estilo1" align="left"><input name="user2" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="3000" align="left" class="Estilo1">Set password to:</td>
                              <td class="Estilo1" align="left"><input name="userpass" type="text" class="Login" size="10" maxlength="20"></td>
                            </tr>
							
							<tr>
                              <td width="50" align="left" class="Estilo1">UserID:</td>
                              <td class="Estilo1" align="left"><input name="user3" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Send to storage this itemID:</td>
                              <td class="Estilo1" align="left" width="400"><input name="itemidrent" type="text" class="Login" size="8" maxlength="20">
							  <select name="hrs" class="Login">
									  <option value="">Days...</option>
									  <option value="168">7 days</option>
									  <option value="720">30 days</option>
									  <option value="2160">90 days</option>
								</select>
							  </td>
                            </tr>
							
							<tr>
                              <td width="50" align="left" class="Estilo1">UserID:</td>
                              <td class="Estilo1" align="left"><input name="user4" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Set G Coins to:</td>
                              <td class="Estilo1" align="left"><input name="gcoins" type="text" class="Login" size="8" maxlength="20"></td>
                            </tr>
                            <tr>
                              <td colspan="4" align="left" class="Estilo1"><hr /></td>
                             
                            </tr>
                            <tr>
                              <td width="50" align="left" class="Estilo1">Char name:</td>
                              <td class="Estilo1" align="left"><input name="char1" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Set new name to:</td>
                              <td class="Estilo1" align="left"><input name="charname" type="text" class="Login" size="8" maxlength="20"></td>
                            </tr>
                            <tr>
                              <td width="50" align="left" class="Estilo1">Char name:</td>
                              <td class="Estilo1" align="left"><input name="char2" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Set level to:</td>
                              <td class="Estilo1" align="left"><input name="charlvl" type="text" class="Login" size="8" maxlength="20"></td>
                            </tr>
                            
                            <tr>
                              <td width="50" align="left" class="Estilo1">Char name:</td>
                              <td class="Estilo1" align="left"><input name="char3" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Set EXP to:</td>
                              <td class="Estilo1" align="left"><input name="charxp" type="text" class="Login" size="8" maxlength="20"></td>
                            </tr>
							
							<tr>
                              <td width="50" align="left" class="Estilo1">Char name:</td>
                              <td class="Estilo1" align="left"><input name="char4" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Set bounty to:</td>
                              <td class="Estilo1" align="left"><input name="charbp" type="text" class="Login" size="8" maxlength="20"></td>
                            </tr>
							
							<tr>
                              <td width="50" align="left" class="Estilo1">Char name:</td>
                              <td class="Estilo1" align="left"><input name="char5" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Send to equipment this itemID:</td>
                              <td class="Estilo1" align="left"><input name="itemid1" type="text" class="Login" size="8" maxlength="20"></td>
                            </tr>
							
							<tr>
                              <td width="50" align="left" class="Estilo1">Char name:</td>
                              <td class="Estilo1" align="left"><input name="char6" type="text" class="Login" size="8" maxlength="20"></td>
							  <td width="250" align="left" class="Estilo1">Delete from equipment this itemID:</td>
                              <td class="Estilo1" align="left"><input name="itemid2" type="text" class="Login" size="8" maxlength="20"></td>
                            </tr>
	
                            <tr>
                              <td colspan="2" align="left" class="Estilo1" height="10"></td>
                            </tr>
                            
                            <tr>
                              <td colspan="2" align="left" class="Estilo1" height="10"></td>
                            </tr>
                            <tr>
                              <td align="left" class="Estilo1" height="18"></td>
                              <td class="Estilo1" align="right"></td>
                            </tr>
                            
                            
                            <tr>
                              <td colspan="4" align="left" class="Estilo1" height="10"></td>
                            </tr>
                            
                            <tr>
                              <td colspan="4" align="center" class="Estilo1" height="10"></td>
                            </tr>
                            <tr>
                              <td colspan="4" align="center" class="Estilo1"><input type="submit" value="Commit changes" name="submit" class="Login"></td>
                            </tr>
                            <tr>
                              <td colspan="4" align="center" class="Estilo1"></td>
                            </tr>
                    </tbody></table>
						</form></td>
          </tr>
    <?php

		if (!(empty($rankerr) && empty($pwderr) && empty($renterr) && empty($coinserr) && empty($nameerr) && empty($lvlerr) && empty($xperr) && empty($bperr) && empty($senderr) && empty($delerr))) {
		
	?>
		<tr>
			
            <td align="center" class="Estilo7">Error List: 
			<br />
				<?php				
					if (!empty($rankerr))
						echo '<font color="red" size="2px">' . $rankerr . '</font><br />';
					if (!empty($pwderr))
						echo '<font color="red" size="2px">' . $pwderr . '</font><br />';
					if (!empty($renterr))
						echo '<font color="red" size="2px">' . $renterr . '</font><br />';
					if (!empty($coinserr))
						echo '<font color="red" size="2px">' . $coinserr . '</font><br />';
					if (!empty($nameerr))
						echo '<font color="red" size="2px">' . $nameerr . '</font><br />';
					if (!empty($lvlerr))
						echo '<font color="red" size="2px">' . $lvlerr . '</font><br />';
					if (!empty($xperr))
						echo '<font color="red" size="2px">' . $xperr . '</font><br />';
					if (!empty($bperr))
						echo '<font color="red" size="2px">' . $bperr . '</font><br />';
					if (!empty($senderr))
						echo '<font color="red" size="2px">' . $senderr . '</font><br />';
					if (!empty($delerr))
						echo '<font color="red" size="2px">' . $delerr . '</font><br />';
				?>
			</td>
          </tr>
		  
		  <?php
		}
		  ?>
	  
          <tr>
            <td height="5" align="center"></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody></table></td>
	
<!-- /////////////////////////////////////////////////// -->
    <?php
		require 'other/right.php';
	?>
	
	<!-- ////////////////////////////////////////////// -->
 
 <?php
	require 'footer.php';
 ?>