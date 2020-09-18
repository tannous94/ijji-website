<?php
	require 'header.php';

	if(!isset($_SESSION['AID'])) {
		echo '<script language="javascript">';
		echo 'alert("You must be logged in");';
		echo 'document.location = "index.php"';
		echo '</script>';
		die();
	}
	
	if(!isset($_GET['id'])) {
		echo '<script language="javascript">';
		echo 'document.location = "shop.php"';
		echo '</script>';
		die();
	}
	
	$res = odbc_exec($connect, "SELECT * FROM CoinsShop WHERE GCIID='" . $_GET['id'] . "'");
	$item = odbc_fetch_array ($res);
	
	$res1 = odbc_exec($connect, "SELECT Coins FROM Account WHERE AID='" . $_SESSION['AID'] . "'");
	$coins = odbc_fetch_array ($res1);
	$after = intval($coins['Coins']) - intval($item['Price']);


	if (isset($_GET['do'])) {
		if ($_GET['do'] == "buy") {
			if ($after >= 0) {
				if ($item['ItemID'] != "") {
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $_SESSION['AID'] . "', '" . $item['ItemID'] . "', GETDATE(), 2160, 1)");
				
					odbc_exec($connect, "UPDATE Account SET Coins='" . $after . "' WHERE AID='" . $_SESSION['AID'] . "'");	
					
				} else {
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $_SESSION['AID'] . "', '" . $item['ItemIDHead'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $_SESSION['AID'] . "', '" . $item['ItemIDChest'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $_SESSION['AID'] . "', '" . $item['ItemIDHands'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $_SESSION['AID'] . "', '" . $item['ItemIDPants'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $_SESSION['AID'] . "', '" . $item['ItemIDFeet'] . "', GETDATE(), 2160, 1)");
					
					odbc_exec($connect, "UPDATE Account SET Coins='" . $after . "' WHERE AID='" . $_SESSION['AID'] . "'");

				}
				
				echo '<script language="javascript">';
				echo 'alert("Item has been purchased");';
				echo 'document.location = "shop.php"';
				echo '</script>';
				die();
				
			} else {
				echo '<script language="javascript">';
				echo 'alert("Not enough G Coins");';
				echo 'document.location = "shop.php"';
				echo '</script>';
				die();
			}
		}
		
		if ($_GET['do'] == "gift") {
			$giftto = $_POST['gift_to'];
			
			if ($giftto == "") {
				echo '<script language="javascript">';
				echo 'alert("Fill in username");';
				echo 'document.location = "item.php?id=' . $item['GCIID'] . '"';
				echo '</script>';
				die();
			}
			
			$res2 = odbc_exec($connect, "SELECT AID FROM Account WHERE UserID='" . $giftto . "'");
			if (odbc_num_rows($res2) < 1) {
				echo '<script language="javascript">';
				echo 'alert("username does not exist");';
				echo 'document.location = "item.php?id=' . $item['GCIID'] . '"';
				echo '</script>';
				die();
			}
						
			if ($after >= 0) {
				
				$aidtogift = odbc_fetch_array ($res2);
				
				
				if ($item['ItemID'] != "") {
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $aidtogift['AID'] . "', '" . $item['ItemID'] . "', GETDATE(), 2160, 1)");
				
					odbc_exec($connect, "UPDATE Account SET Coins='" . $after . "' WHERE AID='" . $_SESSION['AID'] . "'");
	
				} else {
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $aidtogift['AID'] . "', '" . $item['ItemIDHead'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $aidtogift['AID'] . "', '" . $item['ItemIDChest'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $aidtogift['AID'] . "', '" . $item['ItemIDHands'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $aidtogift['AID'] . "', '" . $item['ItemIDPants'] . "', GETDATE(), 2160, 1)");
					odbc_exec($connect, "INSERT INTO AccountItem (AID, ItemID, RentDate, RentHourPeriod, Cnt) VALUES ('" . $aidtogift['AID'] . "', '" . $item['ItemIDFeet'] . "', GETDATE(), 2160, 1)");
					
					odbc_exec($connect, "UPDATE Account SET Coins='" . $after . "' WHERE AID='" . $_SESSION['AID'] . "'");
					
				}
				
				echo '<script language="javascript">';
				echo 'alert("Item has been gifted");';
				echo 'document.location = "shop.php"';
				echo '</script>';
				die();
				
			} else {
				echo '<script language="javascript">';
				echo 'alert("Not enough G Coins");';
				echo 'document.location = "shop.php"';
				echo '</script>';
				die();
			}
		}
	}

?>
	<!-- ////////////////////////////////////////////// -->
	
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center"><style type="text/css">
<!--
.Estilo1 {font-weight: bold}
-->
</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<table width="784" height="100%" border="0" align="center">
  <tbody><tr valign="top">
    <td height="60" align="center" valign="top"><table width="160" height="58" border="0" align="left" cellpadding="0" cellspacing="0" background="img/playlive_bg_subp01a_160px.gif" style="background-position:top; background-repeat:no-repeat; filter: alpha(opacity=80); -moz-opacity:0.80; opacity:0.80;">
      <tbody><tr>
        <td align="center" height="58"></td>
      </tr>
    </tbody></table><a href="download.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('START','','img/ministart02.gif',1)"><img src="img/ministart01.gif" alt="Download" name="START" border="0" style=" float:none; margin-top:5; margin-left:-155; position:absolute;"></a></td>
    <td rowspan="2" align="center" valign="top" bgcolor="#FFFFFF" class="Estilo1" width="620" height="100%">
		<table width="575" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td height="20"></td>
      </tr>
      <tr>
        <td align="left"><img src="img/tit_itemcategory.gif" width="150" height="23"></td>
      </tr>
      <tr>
        <td align="center" class="Estilo1" height="25"></td>
      </tr>
      <tr>
	  
      </tr>
      <tr>
        <td align="center" class="Estilo1" height="25"></td>
      </tr>
	  <tr>
        <td align="center" class="Estilo1" height="25">
		  
<table width="570" height="100%" border="0" cellpadding="0" cellspacing="0" class="login4">
		<tbody><tr>
			<td width="449" height="20" colspan="2"></td>
		</tr>
		<tr>
		
				<td width="208" height="100" align="left" style="padding-left: 20px; padding-bottom: 15px;">
			      <table width="300" border="0">
                    <tbody><tr>
                      <td width="104" rowspan="7" valign="top"><img border="2" src="img/shop/<?php echo $item['WebImg']; ?>" width="100" height="100" style="border-width: 1px; border-style: solid; border-color: #000000;"></td>
                      <td colspan="2" class="estilo8" align="left">
                         <b></b>
                      </td>
                    </tr>
                    <tr>
                      <td width="64" class="estilo5" align="left">Type:</td>
                      <td width="68" class="estilo5" align="right"><?php echo $item['ItemType']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo5" align="left">Sex:</td>
                      <td class="estilo5" align="right"><?php echo $item['Sex']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo5" align="left">Level:</td>
                      <td class="estilo5" align="right"><?php echo $item['ItemLv']; ?></td>
                    </tr>
                    <tr>
                      <td class="estilo5" align="left">Price:</td>
                      <td class="estilo5" align="right"><?php echo $item['Price']; ?></td>
                    </tr>
					
					<tr>
                      <td class="estilo5" align="left">G Coins balance:</td>
                      <td class="estilo5" align="right"><?php echo $coins['Coins']; ?></td>
                    </tr>
					
					<tr>
                      <td class="estilo5" align="left">G Coins after purchase:</td>
                      <td class="estilo5" align="right"><?php echo $after; ?></td>
                    </tr>
	
                    <tr>
                      <td colspan="2" height="20">
					  <form method="POST" id="my_form" action="item.php?id=<?php echo $item['GCIID']; ?>&do=gift">
						<input type="text" name="gift_to" placeholder="Username to gift">
					  
					  </td>
                    </tr>
					<tr>
                      <td colspan="2"><table width="100%" border="0" align="center">
                          <tbody><tr>
                            <td><a href="item.php?id=<?php echo $item['GCIID']; ?>"><img src="img/btn_itmshp_details.gif" width="47" height="19" border="0"></a></td>
                            <td><a href="item.php?id=<?php echo $item['GCIID']; ?>&do=buy"><img src="img/btn_itmshp_buy02.gif" width="47" height="19" border="0"></a></td>
							<td><a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;"><img src="img/btn_itmshp_gift.gif" width="47" height="19" border="0"></a></td></form>
                          </tr>
                      </tbody></table></td>
                    </tr>
                  </tbody></table></td>
			            
			</tr>			<tr>
                        
					</tr>
	</tbody></table></td>
      </tr>
      <tr>
        <td align="right" class="Estilo1" height="25">
			*Note: Every item you purchase or gift will expire after 90 days.
		</td>
      </tr>
      <tr>
        <td align="center" class="Estilo1" height="25"></td>
      </tr>
    </tbody></table>
		</td>
  </tr>
  <tr>
    <td width="160" align="center" valign="top" bgcolor="#004f86" background="img/bg_content_wm.gif" style="background-repeat:no-repeat; background-position:top;"><table width="160" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center" valign="top" height="2"></td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="img/ltit_itemshop.gif" width="150" height="42" border="0">
          <table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody><tr>
              <td align="center" background="img/lbox01_t.gif" style="background-repeat:no-repeat; background-position:top;" height="6"></td>
            </tr>
            <tr>
              <td align="center" background="img/lbox01_b.gif" style="background-repeat:no-repeat;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('EventShop','','img/eventshop_select_on.jpg',1)"><img name="EventShop" border="0" src="img/eventshop_select.jpg" alt="EventShop"></a><br>                
                <a href="shop.php?sub=items" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Category','','img/shop_select_on.jpg',1)">
								<img name="Category" border="0" src="img/shop_select.jpg" alt="Category">
								</a><br>
                <a href="myitems.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MyItems','','img/myitems_select_on.jpg',1)"><img name="MyItems" border="0" src="img/myitems_select.jpg" alt="MyItems"></a></td>
            </tr>
            <tr>
              <td align="center" background="img/lbox01_b.gif" style="background-repeat:no-repeat; background-position:bottom" height="6"></td>
            </tr>
          </tbody></table>
		  <br><img src="img/warning_banner.gif" width="140" height="91"></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table></td>
      </tr>
    </tbody></table>

	<!-- ////////////////////////////////////////////// -->
 
 <?php
	require 'footer.php';
 ?>