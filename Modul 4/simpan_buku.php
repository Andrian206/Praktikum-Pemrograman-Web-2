<?php
extract($_POST);
if($submit=="SIMPAN"){
    $q ="INSERT INTO buku VALUES ('$kode_buku','$judul_buku','$pengarang_buku','$penerbit_buku')" ;
    $r = mysqli_query($db,$q) or die (mysqli_error($db));
    if($r){
        $msg = "Data Buku Berhasil Disimpan";
    }else{
        $msg = "Data Buku Gagal Disimpan";
    }
    echo "$msg <br>";
}
?>