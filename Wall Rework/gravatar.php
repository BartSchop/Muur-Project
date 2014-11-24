<?php
 function getPicture($email){
  $picture = "http://www.patrickvdr.net/images/avatar.png";
  $email = $email;
  $size = 60;
  $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $picture ) . "&s=" . $size;
  return $grav_url;
 }

  function getPicture2($email){
  $picture = "http://www.patrickvdr.net/images/avatar.png";
  $email = $email;
  $size = 40;
  $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $picture ) . "&s=" . $size;
  return $grav_url;
 }
?>