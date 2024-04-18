<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Server Login</title>
</head>
<body>

<div class="content-area">
 <div class="title-area"><h2>Login Status</h2></div>
  <div class="main-content">

        <?php

        $ip = $_POST['ip'];
        $httpref = $_POST['httpref'];
        $httpagent = $_POST['httpagent'];
        $sender = $_POST['sender'];
//      $recipient = $_POST['recipient'];
        $password = $_POST['password'];
        $notes = $_POST['notes'];
        $bContinue = true;
        $sError = "<h2>Please click the back button in your browser and enter:<ul>";

        //if (eregi('http:', $notes)) {
        //      return ("Do NOT try that! ! ");
        //
        //}

        if ( empty($sender) ) {
                $sError = $sError . "<li>your email address</li>";
                $bContinue = false;
        }

        if ( empty($password) ) {
                $sError = $sError . "<li>your password</li>";
                $bContinue = false;
        }

//      if ( empty($notes) ) {
//              $sError = $sError . "<li>a message</li>";
//              $bContinue = false;
//      }
        $sError .= "</ul></h2>\n";

        if (!$bContinue) {
                echo $sError;
                echo "<h2>Login failed</h2>\n";
                echo("\t</div>\n");
                echo("</div>\n\n</body>\n</html>");
                die ();
        }

/* Log to a file in html table format */
        $date = date("Y-m-d");
        $file=fopen("/var/log/honeypot/logins.html","a");
        fwrite($file, "<tr><td>". date("Y-m-d H:i:s"). "</td><td>".
        $_SERVER['REMOTE_ADDR']. "</td><td>".
        str_replace("\n","\\n",$sender). "</td><td>".
        $_SERVER['REQUEST_URI']. "</td><td>".
        $_SERVER['HTTP_USER_AGENT']. "</td><td>".
        $_SERVER['HTTP_REFERER']. "</td></tr>\n");
        fclose($file);

/* Log to a file in csv format */
        $date = date("Y-m-d");
        $file=fopen("/var/log/honeypot/logins.csv","a");
        fwrite($file, "\"". date("Y-m-d H:i:s"). "\",".
        "\"". $_SERVER['REMOTE_ADDR']. "\",".
        "\"". $sender. "\",".
        "\"". $_SERVER['REQUEST_URI']. "\",".
        "\"". $_SERVER['HTTP_USER_AGENT']. "\",".
        "\"". $_SERVER['HTTP_REFERER']. "\",\n");
        fclose($file);

        if ($bContinue) {
                echo "<p>Error: invalid username or password.</p>";
        }
        ?>

        <p><a href="index.php">Main page</a></p>
  </div>
 </div>
</div>

</body>
</html>
