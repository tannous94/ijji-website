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
                  <td height="30" class="estilo6"><strong>GAME INFO </strong></td>
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
				<?php
echo '  <font class="estilo1">My Characters:</font>';
        $query = odbc_exec($connect, "SELECT * FROM Character(nolock) WHERE AID = '" . $_SESSION['AID'] . "' AND DeleteFlag = 0 ORDER BY CharNum ASC");
        if ( odbc_num_rows($query) < 1 ) {
        echo '<font face="Arial" color="#ff0000"><br>You have no character yet. Create one</br>';
        } else {

        echo '
        <table width="350" align="center" class="errorbox">
	    <tr>
		<td class="estilo1" align="center">Name</td>
		<td class="estilo1" align="center">Lvl</td>
		<td class="estilo1" align="center">Experience</td>
        <td class="estilo1" align="center">Bounty</td>
        <td class="estilo1" align="center">Kill/Death</td>
	    </tr>';
        $i = 1;
        while ($i <= odbc_num_rows($query) ){
        $chars = odbc_fetch_array($query);
        echo '<tr>
		<td class="estilo1" align="center">' . FormatCharName($chars['CID']). '</td>
		<td class="estilo1" align="center">' . $chars['Level'] . '</td>
		<td class="estilo1" align="center">' . $chars['XP'] . '</td>
        <td class="estilo1" align="center">' . $chars['BP'] . '</td>
		<td class="estilo1" align="center">' . GetKDRatio($chars['KillCount'], $chars['DeathCount']) . '</td>
	    </tr>';
        $i++;
        }
        echo '</table>';
        }
        echo'</br>
     
        <font class="estilo1" align="center">My Clans:<br>
        <table class="errorbox" width="350" align="center">
	    <tr>
        <td align="center" class="estilo1">Clan Picture</td>
        <td align="center" class="estilo1">Clan Name</td>
		<td align="center" class="estilo1">Clan Leader</td>
		<td align="center" class="estilo1">Clan Rank</td>

	    </tr>';
        $query2 = odbc_exec($connect, "SELECT * FROM Character(nolock) WHERE AID = '" . $_SESSION['AID'] . "' ORDER BY CharNum ASC");
        if (odbc_num_rows($query2) > 0){
        while ($chars2 = odbc_fetch_array($query2)){


        $clanq = odbc_exec($connect, "SELECT * FROM ClanMember WHERE CID = '" . $chars2['CID'] . "'");
            if (odbc_num_rows($clanq) != 0){
            $clanq2 = odbc_fetch_array($clanq);
                if($clanq2['Grade'] == 9){
                $rango = "Member  ";
                $admin = "No";
                }elseif($clanq2['Grade'] == 2){
                $rango = "Admin";
                $admin = "No";
                }elseif($clanq2['Grade'] == 1){
                $rango = "Master";
                $clid = $clanq2['CLID'] + 1990;
                $cid = $clanq2['CID'] + 2000;

                }else{
                $rango = "Error";
                }
            $claninfoq = odbc_exec($connect, "SELECT * FROM Clan WHERE CLID = '" . $clanq2['CLID'] . "'");
            $claninfo = odbc_fetch_array($claninfoq);
           
                $emblemurl = '<IMG SRC="img/clan/no_emblem.png" WIDTH=50 HEIGHT=50>';
            
                echo '<tr>
                <td align="center" valign="center">' . $emblemurl . '</td>
                <td align="center" valign="center">' . $claninfo['Name'] . '</td>
		        <td align="center" valign="center">' . FormatCharName($chars2['CID']) . '</td>
		        <td align="center" valign="center">' . $rango . '</td>
             
	           </tr> ';
        }}}
?></td>
          </tr>
          <tr>
            <td height="5" align="center"></td>
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