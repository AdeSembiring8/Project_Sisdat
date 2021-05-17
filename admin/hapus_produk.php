<?php 

$data = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$_GET[id]'");
$hapus = $data->fetch_assoc();
$foto_produk = $hapus['foto_produk'];

if (file_exists("../gambar_produk/$foto_produk")){
	unlink("../gambar_produk/$foto_produk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk ='$_GET[id]'");
echo "<script>alert('produk terhapus');</script>";
echo "<script> location='index_admin.php?halaman=produk'; </script>";

?>