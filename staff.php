<?php
	require 'header.php';
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
                  <td height="30" class="estilo6"><strong>STAFF LIST</strong></td>
                </tr>
              </tbody></table></td>
          </tr>
          <tr>
             <td align="center"><table width="400" height="250" border="0" bgcolor="#151515">
              <tr>
                <td align="center" class="Estilo1"><font color="#FF0000">Admin</font></td>
                <td align="left">
					<?php 
						$get1 = odbc_exec($connect, "SELECT * FROM Account WHERE UGradeID = 255 ORDER BY AID ASC");
						if(odbc_num_rows($get1) <> 0) {
							while($link = odbc_fetch_array($get1)){
								echo '<td class="Estilo1"><font color="white">';
								echo $link['UserID'];
								echo '</font></td>';
							}
						} else {
							echo '<td class="Estilo1"><font color="white">-</font></td>';
						}
					?>
				</td>
              </tr>
              <tr>
                <td align="center" class="Estilo1"><font color="#00FF00">GM</font></td>
                <td align="left">
					<?php 
						$get1 = odbc_exec($connect, "SELECT * FROM Account WHERE UGradeID = 252 ORDER BY AID ASC");
						if(odbc_num_rows($get1) <> 0) {
							while($link = odbc_fetch_array($get1)){
								echo '<td class="Estilo1"><font color="white">';
								echo $link['UserID'];
								echo '</font></td>';
							}
						} else {
							echo '<td class="Estilo1"><font color="white">-</font></td>';
						}
					?>
				</td>
              </tr>
              <tr>
                <td align="center" class="Estilo1"><font color="#0099FF">Developer</font></td>
                <td align="left"><font color="white">
					<?php 
						$get1 = odbc_exec($connect, "SELECT * FROM Account WHERE UGradeID = 254 ORDER BY AID ASC");
						if(odbc_num_rows($get1) <> 0) {
							while($link = odbc_fetch_array($get1)){
								echo '<td class="Estilo1"><font color="white">';
								echo $link['UserID'];
								echo '</font></td>';
							}
						} else {
							echo '<td class="Estilo1"><font color="white">-</font></td>';
						}
					?></font>
				</td>
              </tr>
            </table></td>
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