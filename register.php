<?php
	require 'header.php';
	
	if(isset($_SESSION['AID'])) {
		echo '<script language="javascript">';
		echo 'alert("You are already logged in");';
		echo 'document.location = "index.php"';
		echo '</script>';
		die();
	}
	
	
if (isset($_POST['submit'])) {
	
    $user           = $_POST['user'];
    $pass1          = $_POST['pass1'];
    $pass2          = $_POST['pass2'];
    $email          = $_POST['email'];
    $name           = $_POST['name'];
    $age            = $_POST['age'];
	
	if ($user == "" OR $pass1 == "" OR $pass2 == "" OR $email == "" OR $name == "" OR $age == "") {
		echo '<script language="javascript">';
		echo 'alert("Fill in all fields");';
		echo 'document.location = "register.php"';
		echo '</script>';
		die();
	}
	
	if (strlen($pass1) < 6) {
		echo '<script language="javascript">';
		echo 'alert("Password is too short (6 chars min)");';
		echo 'document.location = "register.php"';
		echo '</script>';
		die();
	}
	
	if ($pass1 !== $pass2) {
		echo '<script language="javascript">';
		echo 'alert("Passwords do not match");';
		echo 'document.location = "register.php"';
		echo '</script>';
		die();
	}


    $res = odbc_exec($connect, "SELECT * FROM Account WHERE email = '" . $email . "'");
    if (odbc_num_rows($res) >= 1) {
		echo '<script language="javascript">';
		echo 'alert("E-Mail is already in use");';
		echo 'document.location = "register.php"';
		echo '</script>';
		die();
    }

    $res = odbc_exec($connect, "SELECT * FROM Login WHERE UserID = '" . $user . "'");
    if (odbc_num_rows($res) >= 1) {
		echo '<script language="javascript">';
		echo 'alert("Username already exists");';
		echo 'document.location = "register.php"';
		echo '</script>';
		die();
    }
       
    odbc_exec($connect, "INSERT INTO Account (UserID, Name, Email, Age, UGradeID, PGradeID, RegDate) VALUES ('$user', '$name', '$email', '$age', 0, 0, GETDATE())");
	$res = odbc_exec($connect, "SELECT * FROM Account WHERE UserID = '$user'");
	$usr = odbc_fetch_array($res);
	$aid = $usr['AID'];
    odbc_exec($connect, "INSERT INTO Login (UserID, AID, Password) VALUES ('$user', '$aid', '$pass1')");
	
	echo '<script language="javascript">';
	echo 'alert("Account has been created successfully");';
	echo 'document.location = "register.php"';
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
                  <td height="30" class="estilo6"><strong>REGISTERING NEW ACCOUNT </strong></td>
                </tr>
              </tbody></table></td>
          </tr>
          <tr>
            <td align="center" class="Estilo1">
			<form name="reg" method="POST" action="register.php">
						<table width="400" border="0" align="center">
                            <tbody><tr>
                              <td colspan="2" align="center" class="Estilo1"></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center" bgcolor="#000000" class="Estilo1">Warning: <font color="#FF0000">Never give your password to anyone. A member of Staff will never ask for your password!</font></td>
                            </tr>
                            <tr>
                              <td align="center" class="Estilo1" height="10"></td>
                              <td width="197" align="center" class="Estilo1"></td>
                            </tr>
                            <tr>
                              <td width="193" align="left" class="Estilo1">Username:</td>
                              <td class="Estilo1" align="right"><input name="user" type="text" class="Login" size="20" maxlength="20"></td>
                            </tr>
                            <tr>
                              <td align="left" class="Estilo1">E-Mail:</td>
                              <td class="Estilo1" align="right"><input name="email" type="text" class="Login" id="email2" size="20" maxlength="30"></td>
                            </tr>
                            <tr>
                              <td align="left" class="Estilo1">Password:</td>
                              <td class="Estilo1" align="right"><input name="pass1" type="password" class="Login" id="pass1" size="20" maxlength="20"></td>
                            </tr>
                            <tr>
                              <td align="left" class="Estilo1">Repeat Password: </td>
                              <td class="Estilo1" align="right"><input name="pass2" type="password" class="Login" id="pass2" size="20" maxlength="20"></td>
                            </tr>
                            <tr>
                              <td align="left" class="Estilo1">Name:</td>
                              <td class="Estilo1" align="right"><input name="name" type="text" class="Login" size="20" maxlength="20"></td>
                            </tr>
                            
                            <tr>
                              <td align="left" class="Estilo1">Age:</td>
                              <td class="Estilo1" align="right"><select size="1" name="age" class="Login">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                                  <option value="21">21</option>
                                  <option value="22">22</option>
                                  <option value="23">23</option>
                                  <option value="24">24</option>
                                  <option value="25">25</option>
                                  <option value="26">26</option>
                                  <option value="27">27</option>
                                  <option value="28">28</option>
                                  <option value="29">29</option>
                                  <option value="30">30</option>
                                  <option value="31">31</option>
                                  <option value="32">32</option>
                                  <option value="33">33</option>
                                  <option value="34">34</option>
                                  <option value="35">35</option>
                                  <option value="36">36</option>
                                  <option value="37">37</option>
                                  <option value="38">38</option>
                                  <option value="39">39</option>
                                  <option value="40">40</option>
                                  <option value="41">41</option>
                                  <option value="42">42</option>
                                  <option value="43">43</option>
                                  <option value="44">44</option>
                                  <option value="45">45</option>
                                  <option value="46">46</option>
                                  <option value="47">47</option>
                                  <option value="48">48</option>
                                  <option value="49">49</option>
                                  <option value="50">50</option>
                                  <option value="51">51</option>
                                  <option value="52">52</option>
                                  <option value="53">53</option>
                                  <option value="54">54</option>
                                  <option value="55">55</option>
                                  <option value="56">56</option>
                                  <option value="57">57</option>
                                  <option value="58">58</option>
                                  <option value="59">59</option>
                                  <option value="60">60</option>
                                  <option value="61">61</option>
                                  <option value="62">62</option>
                                  <option value="63">63</option>
                                  <option value="64">64</option>
                                  <option value="65">65</option>
                                  <option value="66">66</option>
                                  <option value="67">67</option>
                                  <option value="68">68</option>
                                  <option value="69">69</option>
                                  <option value="70">70</option>
                                  <option value="71">71</option>
                                  <option value="72">72</option>
                                  <option value="73">73</option>
                                  <option value="74">74</option>
                                  <option value="75">75</option>
                                  <option value="76">76</option>
                                  <option value="77">77</option>
                                  <option value="78">78</option>
                                  <option value="79">79</option>
                                  <option value="80">80</option>
                                  <option value="81">81</option>
                                  <option value="82">82</option>
                                  <option value="83">83</option>
                                  <option value="84">84</option>
                                  <option value="85">85</option>
                                  <option value="86">86</option>
                                  <option value="87">87</option>
                                  <option value="88">88</option>
                                  <option value="89">89</option>
                                  <option value="90">90</option>
                                  <option value="91">91</option>
                                  <option value="92">92</option>
                                  <option value="93">93</option>
                                  <option value="94">94</option>
                                  <option value="95">95</option>
                                  <option value="96">96</option>
                                  <option value="97">97</option>
                                  <option value="98">98</option>
                                  <option value="99">99</option>
                                  <option value="100">100</option>
                              </select></td>
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
                              <td colspan="2" align="left" class="Estilo1" height="10"></td>
                            </tr>
                            
                            <tr>
                              <td colspan="2" align="center" class="Estilo1" height="10"></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center" class="Estilo1"><input type="submit" value="Register" name="submit" class="Login"></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center" class="Estilo1"></td>
                            </tr>
                    </tbody></table>
						</form></td>
          </tr>
          <tr>
            <td align="center" class="Estilo7">Last User: 
				<?php

					$query2 = odbc_exec($connect, "SELECT TOP 1 UserID FROM Account ORDER BY AID DESC");
					$b = odbc_fetch_array($query2);
					$name = $b['UserID'];
					echo "$name";

				?>
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