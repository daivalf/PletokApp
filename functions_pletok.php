<?php
function dbConnect(){
	$db=new mysqli("localhost","root","","db_pletokapp");
	return $db;
}

function getDataBayar($id_pembayaran){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM tb_pembayaran WHERE id_pembayaran='$id_pembayaran'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}


function getDataRincian($id_pesanan){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT menu.nama_menu, rincian.jumlah_pesanan, menu.harga, 
		menu.harga * rincian.jumlah_pesanan AS Subtotal FROM tb_menu menu 
		JOIN tb_rincian_pesanan rincian ON menu.id_menu = rincian.id_menu 
		JOIN tb_pesanan pesan ON pesan.id_pesanan = rincian.id_pesanan 
		WHERE pesan.id_pesanan='$id_pesanan'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
	
function getListRincian($id_pesanan){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT menu.nama_menu, rincian.jumlah_pesanan, menu.harga, 
		menu.harga * rincian.jumlah_pesanan AS Subtotal FROM tb_menu menu 
		JOIN tb_rincian_pesanan rincian ON menu.id_menu = rincian.id_menu 
		JOIN tb_pesanan pesan ON pesan.id_pesanan = rincian.id_pesanan 
		WHERE pesan.id_pesanan='$id_pesanan'");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

?>