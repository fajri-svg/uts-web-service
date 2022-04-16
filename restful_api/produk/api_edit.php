<?php
    require_once('../config/koneksi_db.php');
    $data = json_decode(file_get_contents("php://input"));

    if ($data->id!=null){
        $id = $data->id;
        $nama_produk = $data->nama_produk;
        $harga = $data->harga;
        $tipe_produk = $data->tipe_produk;
        $stok = $data->stok;

        $sql = $conn -> prepare("UPDATE laptop SET nama_produk=?, tipe_produk=?, harga=?, stok=? WHERE id=?");
        $sql -> bind_param('ssddd', $nama_produk, $tipe_produk, $harga, $stok, $id);
        $sql -> execute();
        if ($sql){
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        }else{
            echo json_encode(array('RESPONSE' => 'FAILED'));
        }
    }else{
        echo "GAGAL";
    }
?>