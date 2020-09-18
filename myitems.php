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
                  <td height="30" class="estilo6"><strong>MY ITEMS </strong></td>
                </tr>
              </tbody></table></td>
          </tr>
          <tr>                
            <td align="center" class="Estilo1"><table width="200" border="0" align="center" class="errorbox">
              <tbody><tr>
                <td><table width="380" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr bgcolor="#333333">
                <td width="126" align="left" class="Estilo1">Name</td>
                <td width="115" align="center" class="Estilo1">Type</td>
                <td width="114" align="right" class="Estilo1">Expire</td>
              </tr>
              <tr>
                <td height="15" colspan="3" align="left" class="Estilo1">&nbsp;</td>
                </tr>
            </tbody></table>                  
                                                    </td>
              </tr>
            </tbody></table>              </td>
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