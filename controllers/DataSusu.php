<?php

require '../models/SusuModel.php';

$susu = new SusuModel();

if(isset($_GET['act'])){
    $act = $_GET['act'];
    if($act == 'edit'){
        $id = $_GET['id'];
        $data = [
            'id_susu' => $_GET['id_susu'],
            'jumlah_volume_susu' => $_POST['jumlah_volume_susu'],
            'tanggal_pengambilan' => $_POST['tanggal_pengambilan'],
            'tanggal_penjualan' => $_POST['tanggal_penjualan'],
            'id_user' => $_POST['id_user'],
        ];
        $susu->update($data);
        if ($susu) {
            header('Location: ../views/pages/pencatatan_susu.php');
        }
    }
    else if($act == 'add'){
        $data = [
            'jumlah_volume_susu' => $_POST['jumlah_volume_susu'],
            'tanggal_pengambilan' => $_POST['tanggal_pengambilan'],
            'tanggal_penjualan' => $_POST['tanggal_penjualan'],
            'id_user' => $_POST['id_user'],
        ];
        $susu->insertNew($data);
        if ($susu) {
            header('Location: ../views/pages/pencatatan_susu.php');
        }
    }
    else if($act == 'delete'){
        $id = $_GET['id'];
        $susu->delete($id);
        if ($susu) {
            header('Location: ../views/pages/pencatatan_susu.php');
        }
    }

}
?>