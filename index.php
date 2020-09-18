<?php
	require 'header.php';
?>
	<!-- ////////////////////////////////////////////// -->
<?php
	require 'other/left.php';
	
	
	
  
  $query = odbc_exec($connect, "SELECT CurrPlayer FROM ServerStatus");
  odbc_fetch_row($query);
  $players = odbc_result($query, 1);

  $query = odbc_exec($connect, "SELECT * FROM ServerStatus(nolock) WHERE Opened != 0");
    while( $data = odbc_fetch_array($query) )
    {
        $ip = $data['IP'];
        $port = $data['Port'];
        $check = @fsockopen($ip, $port, $errno, $errstr, 1);

        if (!$check)
        {
            $status = '<font color="#FF0000">Offline</font>';
        }
        else
        {
            $status = '<font color="#00FF00">Online</font>';
            fclose($check);
        }
	}

?>
	
<!-- //////////////////////////////////////////////////// -->
    <td width="237" align="center" valign="top"><table width="422" height="724" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center">
<table width="422" height="80" border="0" align="center" cellpadding="0" cellspacing="0" background="img/top_middle_banner01.jpg" style=" background-repeat:no-repeat; filter: alpha(opacity=80); -moz-opacity:0.80; opacity:0.80;">
  <tbody><tr>
    <td align="center"><table width="420" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td width="23"></td>
        <td width="55" align="left"><span class="Estilo4"><font color="#FF9900" face="Courier New, Courier, mono"><?php echo $players; ?></font></span></td>
        <td width="8" align="right"></td>
        <td width="218"><font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">PLAYERS ONLINE</font></td>
        <td width="116" rowspan="2"></td>
      </tr>
      <tr>
        <td class="estilo1"></td>
        <td colspan="3" class="estilo1" align="left">Server Status: <?php echo $status; ?> | Rate: 30x</td>
        </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
<a href="download.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('START','','img/gamestart02.gif',1)"><img src="img/gamestart01.gif" alt="Download" name="START" border="0" style=" float:none; margin-top:-66; margin-left:48; position:absolute;"></a></td>
      </tr>
      <tr>
        <td align="center" height="5"></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#2f5374" valign="top"><table width="422" border="0">
          <tbody><tr>
            <td align="center"><table width="415" height="150" border="0" align="center" cellpadding="0" cellspacing="0" background="img/top_news_bg.jpg" style="background-repeat:no-repeat; background-position:center;">
              <tbody><tr>
                <td class="estilo1" align="center" valign="bottom"><table width="195" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right"><a href="news.php"><img src="mininew/gunz_0728.gif" width="191" height="40" border="0"></a></td>
                  </tr>
                </table>
				<?php
					// You must have 4 of Type 1 at least in IndexContent in order for this not to make any errors
					// So go ahead and insert them :D
					$res = odbc_exec($connect, "SELECT TOP 4 * FROM IndexContent WHERE Type = '1' ORDER BY ICID DESC");
					while($n = odbc_fetch_array ($res)) {
				?>
				<table width="190" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="15"></td>
                    <td width="180" height="18" class="estilo1"><span class="menu"><a href="news.php?id=<?php echo $n['ICID']; ?>">
                      <?php echo $n['Title']; ?>
                    </a></span></td>
                  </tr>
                </table>                      <?php } ?> </td>
                
				
				<td class="estilo1" align="center" valign="bottom">
                  <table width="195" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left"><a href="news.php"><img src="mininew/gunz_banner_191_40.jpg" width="191" height="40" border="0"></a></td>
                    </tr>
                  </table>
					<?php
						// You must have 4 of Type 2 at least in IndexContent in order for this not to make any errors
						// So go ahead and insert them :D
						$res = odbc_exec($connect, "SELECT TOP 4 * FROM IndexContent WHERE Type = '2' ORDER BY ICID DESC");
						while($n = odbc_fetch_array($res)) {
					?>                  
                  <table width="190" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="15"></td>
                    <td width="180" height="18" class="estilo1"><span class="menu"><a href="news.php?id=<?php echo $n['ICID']; ?>">
                            <?php echo $n['Title']; ?>
                          </a></span></td>
                  </tr>
                </table>                      <?php } ?></td>
				
				
              </tr>
              <tr>
                <td height="10" colspan="2" align="center" valign="bottom" class="estilo1"></td>
                </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td align="left"><img src="img/mc_tit_prfeatures.gif" width="200" height="28"></td>
          </tr>
          <tr>
            <td align="center"><table width="415" height="100%" style="border-width: 1px; border-style: solid; border-color:#001340;">
			<?php
			
				$res = odbc_exec($connect, "SELECT TOP 4 * FROM CoinsShop ORDER BY GCIID ASC");
				
				// You must have 4 items at least in CoinsShop in order for this not to make any errors
				// So go ahead and insert them :D
				if (odbc_num_rows($res) >= 4) {
					$n1 = odbc_fetch_array ($res);
					$n2 = odbc_fetch_array ($res);
					$n3 = odbc_fetch_array ($res);
					$n4 = odbc_fetch_array ($res);
				}
				
			?>
              <tbody><tr>
                                <td width="449" height="100" align="center">
                  <table width="200" border="0">
                    <tbody><tr>
                      <td width="68" rowspan="5" valign="top"><a href="item.php?id=<?php echo $n1['GCIID']; ?>"><img border="2" src="img/shop/<?php echo $n1['WebImg']; ?>" width="64" height="64" style="border-width: 1px; border-style: solid; border-color: #000000;"></a></td>
                      <td colspan="2" class="estilo1" align="left"><b>
                        
                      </b> </td>
                    </tr>
                    <tr>
                      <td width="71" class="estilo1" align="left">Type:</td>
                      <td width="47" class="estilo1" align="left"><?php echo $n1['ItemType']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Sex:</td>
                      <td class="estilo1" align="left"><?php echo $n1['Sex']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Level:</td>
                      <td class="estilo1" align="left"><?php echo $n1['ItemLv']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Price:</td>
                      <td class="estilo1" align="left"><?php echo $n1['Price']; ?></td>
                    </tr>
                  </tbody></table></td>
                                <td width="449" height="100" align="center">
                  <table width="200" border="0">
                    <tbody><tr>
                      <td width="68" rowspan="5" valign="top"><a href="item.php?id=<?php echo $n2['GCIID']; ?>"><img border="2" src="img/shop/<?php echo $n2['WebImg']; ?>" width="64" height="64" style="border-width: 1px; border-style: solid; border-color: #000000;"></a></td>
                      <td colspan="2" class="estilo1" align="left"><b>
                       
                      </b> </td>
                    </tr>
                    <tr>
                      <td width="71" class="estilo1" align="left">Type:</td>
                      <td width="47" class="estilo1" align="left"><?php echo $n2['ItemType']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Sex:</td>
                      <td class="estilo1" align="left"><?php echo $n2['Sex']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Level:</td>
                      <td class="estilo1" align="left"><?php echo $n2['ItemLv']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Price:</td>
                      <td class="estilo1" align="left"><?php echo $n2['Price']; ?></td>
                    </tr>
                  </tbody></table></td>
                </tr>                <tr><td width="449" align="center">
                  <table width="200" border="0">
                    <tbody><tr>
                      <td width="68" rowspan="5" valign="top"><a href="item.php?id=<?php echo $n3['GCIID']; ?>"><img border="2" src="img/shop/<?php echo $n3['WebImg']; ?>" width="64" height="64" style="border-width: 1px; border-style: solid; border-color: #000000;"></a></td>
                      <td colspan="2" class="estilo1" align="left"><b>
                      
                      </b> </td>
                    </tr>
                    <tr>
                      <td width="71" class="estilo1" align="left">Type:</td>
                      <td width="47" class="estilo1" align="left"><?php echo $n3['ItemType']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Sex:</td>
                      <td class="estilo1" align="left"><?php echo $n3['Sex']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Level:</td>
                      <td class="estilo1" align="left"><?php echo $n3['ItemLv']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Price:</td>
                      <td class="estilo1" align="left"><?php echo $n3['Price']; ?></td>
                    </tr>
                  </tbody></table></td>
                                <td width="449" height="100" align="center">
                  <table width="200" border="0">
                    <tbody><tr>
                      <td width="68" rowspan="5" valign="top"><a href="item.php?id=<?php echo $n4['GCIID']; ?>"><img border="2" src="img/shop/<?php echo $n4['WebImg']; ?>" width="64" height="64" style="border-width: 1px; border-style: solid; border-color: #000000;"></a></td>
                      <td colspan="2" class="estilo1" align="left"><b>
                        
                      </b> </td>
                    </tr>
                    <tr>
                      <td width="71" class="estilo1" align="left">Type:</td>
                      <td width="47" class="estilo1" align="left"><?php echo $n4['ItemType']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Sex:</td>
                      <td class="estilo1" align="left"><?php echo $n4['Sex']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Level:</td>
                      <td class="estilo1" align="left"><?php echo $n4['ItemLv']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo1" align="left">Price:</td>
                      <td class="estilo1" align="left"><?php echo $n4['Price']; ?></td>
                    </tr>
                  </tbody></table></td>
                              </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td height="10" align="center"></td>
          </tr>
          <tr>
            <td align="center"><img src="img/mc_controls_pic.gif" width="402" height="187"></td>
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