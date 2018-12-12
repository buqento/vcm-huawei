<?php
$connStr = "host=localhost port=5433 dbname=sdp user=postgres password=postgres";
$conn = pg_connect($connStr);
$reset_table = 'TRUNCATE wbp';
pg_query($conn, $reset_table);

$url = 'http://localhost/api/cibinong/wbps';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_CAINFO, '/path/to/sertifikat')
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$datas = json_decode($result, true);

print_r($datas);
// foreach ($datas as $data) {
// 	$sql ="INSERT INTO wbp (wbpid, name, foto, blok_id, sel_id) VALUES ('".$data['NOMOR_INDUK']."', '".$data['NAMA_LENGKAP']."', '".$data['FOTO_DEPAN']."', ".$data['BLOK_ID'].", ".$data['SEL_ID'].")";
// 	pg_query($conn, $sql);
// }
curl_close($ch)

?>