<?
  define("GOOGLE_SERVER_KEY", "AIzaSyCPWUkw3lafKubBZ4Joe4jvQFbcyKJYRIk");
  //define("GOOGLE_SERVER_KEY", "AIzaSyBwaj5C78w4fwxY1bGJRqFXkQvG71t0Vj8");
  function send_fcm($message, $id) {
    $url = 'https://fcm.googleapis.com/fcm/send';

    $headers = array (
    'Authorization: key=' . GOOGLE_SERVER_KEY,
    'Content-Type: application/json'
    );

    $fields = array (
    'data' => array ("message" => $message),
    'notification' => array ("body" => $message)
    );

    if(is_array($id)) {
    $fields['registration_ids'] = $id;
    } else {
    $fields['to'] = $id;
    }

    $fields['priority'] = "high";

    $fields = json_encode ($fields);

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    echo $result = curl_exec ( $ch );
    if ($result === FALSE) {
      die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close ( $ch );
    return $result;
  }
  $phone=$_GET['phone'];

  include("./sql/dbconnect.php");
  $tokens = array();
  $query="SELECT token FROM facechat_token WHERE phone='$phone'";
  if ($result=mysqli_query($con,$query))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
      array_push($tokens,$row[0]);
    }
    // Free result set
    mysqli_free_result($result);
  }
  send_fcm("aaa",$tokens);
?>
