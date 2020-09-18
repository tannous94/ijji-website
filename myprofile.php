<?php
	require 'header.php';
	
	if(!isset($_SESSION['AID'])) {
		echo '<script language="javascript">';
		echo 'alert("You must be logged in");';
		echo 'document.location = "index.php"';
		echo '</script>';
		die();
	}
	
	$z_res = odbc_exec($connect, "SELECT * FROM Account WHERE AID = '" . $_SESSION['AID'] . "'");
    $z = odbc_fetch_array($z_res);
	$x_res = odbc_exec($connect, "SELECT * FROM Login WHERE AID = '" . $_SESSION['AID'] . "'");
    $x = odbc_fetch_array($x_res);
	
	$fr['UserID']        = $z['UserID'];
    $fr['Email']         = $z['Email'];
    $fr['Password']      = $x['Password'];
	
	if(isset($_POST['submit'])) {
		
		$email        = $_POST['email'];
		
		if(isset($_POST['C1']) && $_POST['C1'] == "ON") {
			$pass1        = $_POST['pass1'];
			$pass2        = $_POST['pass2'];
			
			if($pass1 == "" OR $pass2 == "") {
				echo '<script language="javascript">';
				echo 'alert("Fill in both passwords");';
				echo 'document.location = "myprofile.php"';
				echo '</script>';
				die();
			} else if(strlen($pass1) < 6) {
				echo '<script language="javascript">';
				echo 'alert("Password is too short (6 chars min)");';
				echo 'document.location = "myprofile.php"';
				echo '</script>';
				die();
			} else if($pass1 !== $pass2) {
				echo '<script language="javascript">';
				echo 'alert("Passwords do not match");';
				echo 'document.location = "myprofile.php"';
				echo '</script>';
				die();
			} else {
				odbc_exec($connect, "UPDATE Login SET Password = '$pass1' WHERE AID = '" . $_SESSION['AID'] . "'");
			}
		}
		
		if ($email == "") {
			echo '<script language="javascript">';
			echo 'alert("Type your email address");';
			echo 'document.location = "myprofile.php"';
			echo '</script>';
			die();
		} else {
			odbc_exec($connect, "UPDATE Account SET Email = '$email' WHERE AID = '" . $_SESSION['AID'] . "'");
		}
		
		echo '<script language="javascript">';
		echo 'alert("Your account has been updated");';
		echo 'document.location = "myprofile.php"';
		echo '</script>';
		die();
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
                  <td height="30" class="estilo6"><strong>MY ACCOUNT PROFILE </strong></td>
                </tr>
              </tbody></table></td>
          </tr>
          <tr>
            <td align="center" class="Estilo1">
												  <form name="profile" method="POST" action="myprofile.php">
						<table width="400" border="0" cellspacing="1" cellpadding="0">
                          <tbody><tr>
                            <td colspan="2" align="center" height="10"></td>
                          </tr>
                          <tr bgcolor="#000000">
                            <td colspan="2" align="center" class="Estilo1">Warning: <font color="#FF0000">Never give your password to anyone. A member of Staff will never ask for your password!</font></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left" class="Estilo1" height="10"></td>
                          </tr>
                          <tr height="30">
                            <td width="188" class="Estilo1" align="left">Username:</td>
                            <td width="182" class="Estilo1" align="right"><font size="2">
                              <?php echo $fr['UserID']; ?>                           </font></td>
                          </tr>
                          <tr height="30">
                            <td class="Estilo1" align="left">E-Mail:</td>
                            <td class="Estilo1" align="right"><input name="email" type="text" class="Login" value="<?php echo $fr['Email']; ?>" size="20" maxlength="30"></td>
                          </tr>
                          <tr height="30">
                            <td class="Estilo1" align="left"></td>
                            <td class="Estilo1" align="right"><input type="checkbox" name="C1" value="ON" onclick="document.profile.pass1.disabled = !document.profile.pass1.disabled; document.profile.pass2.disabled = !document.profile.pass2.disabled; ">
      Edit Password?</td>
                          </tr>
                          <tr height="20">
                            <td class="Estilo1" align="left">Password:</td>
                            <td class="Estilo1" align="right"><input name="pass1" type="password" class="Login" value="<?php echo $fr['Password']; ?>" size="20" maxlength="20" disabled=""></td>
                          </tr>
                          <tr>
                            <td class="Estilo1" align="left">Repeat Password: </td>
                            <td class="Estilo1" align="right"><input name="pass2" type="password" class="Login" value="<?php echo $fr['Password']; ?>" size="20" maxlength="20" disabled=""></td>
                          </tr>
                  
                      <tr>
                      <td colspan="2" align="center" class="Estilo1">
					  <br />
					  <br />
					  <input type="submit" value="Update" name="submit" class="Login">
					  </td>
                      </tr>
                        </tbody></table>
</form>
</td>
          </tr>
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