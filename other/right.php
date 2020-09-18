<?php
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header("Location: ../index.php");
	exit();
 }
?>	

<td width="190" align="center" valign="top"><table width="190" height="724" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#131e26">
      <tbody><tr>
        <td width="190" align="center" valign="top"><table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody><tr>
            <td height="4"></td>
          </tr>
          <tr>
            <td align="center"><?php include "other/userpanel.php"; ?></td>
          </tr>
          <tr>
            <td height="4" align="center"></td>
          </tr>
          <tr>
            <td height="5" align="center"><a href="clanrank.php"><img src="img/clanrank_banner.jpg" width="184" height="65" border="0"></a></td>
          </tr>
          <tr>
            <td height="3" align="center"></td>
          </tr>
          <tr>
            <td height="5" align="center"><a href="playerank.php"><img src="img/playerran_banner.jpg" width="184" height="65" border="0"></a></td>
          </tr>
          <tr>
            <td height="3" align="center"></td>
          </tr>
          <tr>
            <td height="5" align="center"><a href="shop.php"><img src="img/shop_banner.jpg" width="184" height="65" border="0"></a></td>
          </tr>
          <tr>
            <td height="3" align="center"></td>
          </tr>
          <tr>
            <td height="10" align="center">
              <table width="184" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td height="5" colspan="2"></td>
                  </tr>
                <tr>
                  <td><img src="img/mtit_usermade.gif" width="85" height="14"></td>
                  <td align="right"><a href="https://www.youtube.com/"><img src="img/btn_more08.gif" width="25" height="14" border="0"></a></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" class="estilo1">GunZ Demo </td>
                  </tr>
                <tr>
                  <td colspan="2" align="center" class="estilo1" height="3"></td>
                </tr>
              </tbody></table>
              <span class="estilo1">
              <object width="184" height="150">
                <param name="movie" value="http://www.youtube.com/v/32IefrF_bbo&amp;color1=0xb1b1b1&amp;color2=0xcfcfcf&amp;hl=en_US&amp;feature=player_embedded&amp;fs=1">
                <param name="allowFullScreen" value="true">
                <param name="allowScriptAccess" value="always">
                <embed src="http://www.youtube.com/v/32IefrF_bbo&amp;color1=0xb1b1b1&amp;color2=0xcfcfcf&amp;hl=en_US&amp;feature=player_embedded&amp;fs=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="184" height="150">
              </object>
</span></td>
          </tr>
          <tr>
            <td height="10" align="center"></td>
          </tr>
          <tr>
            <td height="5" align="center"><a href="http://www.ventrilo.com/download.php"><img src="img/ventrilo.jpg" width="173" height="51" border="0"></a></td>
          </tr>
          <tr>
            <td height="10" align="center"></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody></table></td>
    <?php
		require 'other/most_right.php';
	?>
  </tr>
</tbody></table>
</td>
      </tr>
    </tbody></table>
	