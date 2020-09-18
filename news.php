<?php
	require 'header.php';
	
	
	if(isset($_GET['id'])) {
		$res = odbc_exec($connect, "SELECT * FROM IndexContent WHERE ICID = '" . $_GET['id'] . "'");
	} else {
		$res = odbc_exec($connect, "SELECT TOP 1 * FROM IndexContent");
	}
	
	$a = odbc_fetch_array($res);
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
                  <td height="30" class="estilo6"><strong>NEWS - UPDATES/ANNOUNCEMENTS</strong></td>
                </tr>
              </tbody></table></td>
          </tr>
          <tr>
            <td align="center" class="Estilo1"><table width="400" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#151515">
              <tbody><tr>
                <td><table width="380" border="0" cellspacing="0" cellpadding="0" align="center">
              <tbody><tr>
                <td height="25" align="center" class="Estilo1"></td>
              </tr><tr>
                <td height="25" align="left" class="Estilo1"><?php echo $a['Title']; ?></td>
              </tr><tr>
                <td height="10" align="center" class="Estilo1"></td>
              </tr><tr>
                <td height="25" align="center" class="Estilo1"><?php echo $a['Text']; ?></td>
              </tr><tr>
                <td height="10" align="center" class="Estilo1"></td>
              </tr><tr>
                <td width="380" height="25" align="right" class="Estilo1">Submitted By <em><b><?php echo $a['User']; ?></b>, <?php echo $a['Date']; ?></em></td>             
            </tr></tbody></table>
			</td>
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