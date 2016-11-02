<?php
require_once "Mail-1.2.0/Mail.php";
 
$from = $_POST['email']; // required
$to = "infoUSA@peproblems.com";
$subject = "PEproblems.com Contact Form Inquiry";

$first_name = $_POST['name']; // required
$last_name = $_POST['city']; // required
$state = $_POST['state']; // required
$telephone = $_POST['phone']; // not required
$comments = $_POST['zip']; // required
$hearabout = $_POST['hearabout']; // required

function clean_string($string) {

  $bad = array("content-type","bcc:","to:","cc:","href");

  return str_replace($bad,"",$string);

} 
 $body = "Please see below for details about the individual reaching out:\n\n";
 
 $body .= "Name: ".clean_string($first_name)."\n";
 
 $body .= "City: ".clean_string($last_name)."\n";
    
 $body .= "State: ".clean_string($state)."\n"; 
 
 $body .= "Email: ".clean_string($from)."\n";
 
 $body .= "Telephone: ".clean_string($telephone)."\n";
 
 $body .= "Zip Code: ".clean_string($comments)."\n";
 
 $body .= "Heard about us through: ".clean_string($hearabout)."\n"; 
 
$host = "ssl://secure.emailsrvr.com";
$username = "infousa@peproblems.com";
$password = "rpb8tsu3";
$port = "465";

 
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));
 
$mail = $smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  ?>
  <!-- include your own success html here -->
 

 
<body style="background-color:rgb(191, 186, 166);">
<div style="width:500px; margin: 0 auto; color:white; font-family: Avenir-Roman, 'helvetica neue'; font-weight:100; margin-top: 80px;"> 
Thank you for providing us your information.  <br />  
<br/>
Your information will be forwarded to the study center nearest to you.  Someone from the study center will contact you directly to answer your questions and provide more information about the trial.  If you are not contacted within one week, please provide your information again.
<br />
<br />
You may also choose to call us at 888-617-5977 or email us at infoUSA@PEproblems.com <br />
<br />
Thank you for your interest and thank you for contacting us. 
<br />
--PEproblems.com
<br />
<a href="http://www.peproblems.com" style="background-color:rgb(67, 191, 191);
padding: 10px 15px 10px 15px;
color:white;
margin-top:20px;
position: relative;
top:20px;
text-decoration:none;
border-radius:4px;
font-size:13px;">Back to PEproblems.com</a>
</div>

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-48465565-1']);
_gaq.push(['_trackPageview', location.pathname + location.search + location.hash]);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 

ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';

var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

</body> 
<?php
}
?>

 
 