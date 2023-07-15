<?php 

function fetch_data($dataku){
  $options = array(
    'http' => array(
      'method'  => 'POST',
      'content' => $dataku,
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
  );
  
  $context  = stream_context_create( $options );
  $result = file_get_contents( "http://192.168.100.1/ajax", false, $context );
  
return $result;
}
function get_input($data){
    echo "$data";
    $input_nama = fopen("php://stdin","r");
    $nama = trim(fgets($input_nama));
    return $nama;
}
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
menu:
echo "
There is list command...
>restart
>information
>show_password
>show_ssid
>change_ssid
>change_password
>factory_reset

";
inputku:
$inputku = "";

$inputku = get_input("Command>");


if ($inputku === "restart"){

}elseif($inputku === "information"){
  $input = "1001";
  $dataku = '{"funcNo":'.$input.'}:';
  $dataku2 = '{"funcNo":1015}:';
  $dataku3 = '{"funcNo":1002}:';
  
 echo json_encode(json_decode(fetch_data($dataku)),JSON_PRETTY_PRINT);
 echo "\n";
 echo json_encode(json_decode(fetch_data($dataku2)),JSON_PRETTY_PRINT);
 echo "\n";
 echo json_encode(json_decode(fetch_data($dataku3)),JSON_PRETTY_PRINT);
 
 echo "\n\n";
 }
elseif($inputku === "show_password"){
  $input = "1009";
  $dataku = '{"funcNo":'.$input.'}:';
  
 echo json_encode(json_decode(fetch_data($dataku)),JSON_PRETTY_PRINT);
 echo "\n\n";
}elseif($inputku === "anjay"){
  $ip =   "127.0.0.1";
exec("ping -n 0 $ip", $output, $status);
print_r($output);

}
elseif($inputku === "show_ssid"){
  $input = "1006";
  $dataku = '{"funcNo":'.$input.'}:';
  
 echo json_encode(json_decode(fetch_data($dataku)),JSON_PRETTY_PRINT);
 echo "\n\n";
}elseif($inputku === "change_ssid"){
  $new_ssid = get_input("Masukan SSID BARU : ");
  $dataku = '{"funcNo":1007,"ssid":"'.$new_ssid.'"}:';
  
 echo json_encode(json_decode(fetch_data($dataku)),JSON_PRETTY_PRINT);
 echo "\n\n";
}
elseif($inputku === "change_password"){
  $new_password = get_input("Masukan Password BARU : ");
  $dataku = '{"funcNo":1010,"encryp_type":"4","pwd":"'.$new_password.'"}:';
  
 echo json_encode(json_decode(fetch_data($dataku)),JSON_PRETTY_PRINT);
 echo "\n\n";
}elseif($inputku === "factory_reset"){
  $dataku = '{"funcNo":1014}:';
  
 echo json_encode(json_decode(fetch_data($dataku)),JSON_PRETTY_PRINT);
 echo "\n\n";
}
elseif($inputku === "restart"){
  $dataku = '{"funcNo":1013}:';
  
 echo json_encode(json_decode(fetch_data($dataku)),JSON_PRETTY_PRINT);
 echo "\n\n";
}
elseif($inputku === "menu"){
  GOTO menu;
}


else{
  die("Error not found");
}
GOTO inputku;


?>