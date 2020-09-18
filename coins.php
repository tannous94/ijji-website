<?php
	require 'header.php';
	
	if(!isset($_SESSION['AID'])) {
		echo '<script language="javascript">';
		echo 'alert("You must be logged in");';
		echo 'document.location = "index.php"';
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
                  <td height="30" class="estilo6"><strong>BUY G COINS | STEP 1 </strong></td>
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
				<table width="400" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#151515">
  <tbody><tr>
    <td width="135" align="center" class="estilo2"></td>
    <td width="345" height="5" align="center" class="estilo2"></td>
  </tr>
  <tr>
    <td class="estilo2" align="center"></td>
    <td class="estilo2" align="center" height="20"></td>
  </tr>
  <tr>
    <td class="estilo1" align="center"><img src="img/bn_paypal.png" width="99" height="91"></td>
    <td class="estilo1" align="center" height="20"> The payment service PayPal is widely recognized to be quickly and safely. PayPal offers the use of the most popular for its credit card transactions. </td>
  </tr>
  <tr>
    <td class="estilo1" align="center" height="20"></td>
    <td class="estilo1" align="center"></td>
  </tr>
  <tr>
    <td height="20" colspan="2" align="center" class="estilo1"></td>
  </tr>
  <tr>
    <td height="20" colspan="2" align="center" class="estilo1">                                Type the amount of G Coins you want.<br>
                                <form method="POST" action="maintenance.php">
                                <input name="amount" class="login"><br><br>
                                <input type="submit" value="Next Step" class="login">
                            </form></td>
  </tr>
  <tr>
    <td class="estilo2" align="center"></td>
    <td class="estilo2" align="center" height="5"></td>
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
	
<!-- /////////////////////////////////////////////////// -->
    <?php
		require 'other/right.php';
	?>
	
	<!-- ////////////////////////////////////////////// -->
 
 <?php
	require 'footer.php';
 ?>