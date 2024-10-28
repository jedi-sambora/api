
<?php
header('Access-Control-Allow-Origin: *');

include ("./../lib/koneksi.inc.php"); 
include ("./../lib/adodb5/adodb.inc.php");

// Setup database connection
$db = NewADOConnection('mysqli');
//echo $server.'-'.$user.'-'.$pwd.'-'.$dbx;
//$db->Connect( $server, '$user', $pwd , $dbx);
//if (!$db->Connect('localhost', 'root', '', 'lat1')) {
	if (!$db->Connect($server,$user, $pwd, $dbx)) {
    die('Connection failed: ' . $db->ErrorMsg());
}

$query = "SELECT nik, nama, kd_posisi FROM m_karyawan";
$rs = $db->Execute($query);

$karyawanData = array();

while ($row = $rs->FetchRow()) {
    $karyawanData[] = array(
        'nik' => $row['nik'],
        'nama' => $row['nama'],
        'kd_posisi' => $row['kd_posisi']
    );
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($karyawanData);

?>