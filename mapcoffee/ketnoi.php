<?php
$db_host = 'localhost'; // hostname
$db_name = 'map'; // databasename
$db_user = 'user_map'; // username
$user_pw = '123456'; // password
$con = mysqli_connect($db_host, $db_user, $user_pw,$db_name);
$completeurl = "test.kml";
$xml = simplexml_load_file($completeurl);
$placemarks = $xml->Document->Folder->Placemark;
for ($i = 0; $i < count($placemarks); $i++) { $coordinates = $placemarks[$i]->ExtendedData->SchemaData->SimpleData[2][0];
$cor_d = $placemarks[$i]->Point->coordinates;
$name = $placemarks[$i]->name;
$coors = explode(",",$cor_d);
$sql = "INSERT INTO diadiem_map (name, diachi, kinhdo, vido, dienthoai, web) VALUES ('$name','$diahchi','{$coors[0]}','{$coors[1]}','$dienthoai' '$web')";
mysqli_query($con,$sql);
}
?>