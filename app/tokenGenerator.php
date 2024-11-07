<?php
  function tokenG($leng = 10) : string {
    $array = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $token = '';

    for ($i=0; $i < $leng; $i++) { 
        $token .= $array[rand(0,35)];
    }

    return $token;
  }

  $global_token = tokenG();
?>