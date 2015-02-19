<?PHP

require_once 'sdk/facebook.php'; //Facebook.php
require_once 'connect.php'; //connection to mySQL

define("APPLICATION_ID",""); //your application ID
define("APPLICATION_SECRET",""); //your application secret key
define("ACCESSTOKEN",""); //C type Generated Access Token. see: Generate_Access_Token.txt


$Facebook = new Facebook(array(
  'appId'  => APPLICATION_ID,
  'secret' => APPLICATION_SECRET
));



$Facebook->setFileUploadSupport(true);
$Facebook->setAccessToken(ACCESSTOKEN);

$PageID = ""; //Your Facebook Page Numeric ID


$getPost=mysql_query("SELECT postID, Message, Picture FROM post WHERE postID=1 LIMIT 1");





$PostID = mysql_result($getPost, 0, "PostID");
$Message = mysql_result($getPost, 0, "Message");
$Picture = mysql_result($getPost, 0, "Picture");
$link="http://www.example.com";
 

$Args = array('message' => $Message,'link'=>$link,'picture'=>$Picture,"access_token" => ACCESSTOKEN);


try {

$result = $Facebook->api("/".$PageID."/feed","post",$Args);

} catch (Exception $e) {

  echo 'Caught exception: ',  $e->getMessage(), "\n";

 }

		






?>
