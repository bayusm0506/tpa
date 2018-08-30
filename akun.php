<?php
if(isset($_SESSION['id_user'])){
?>
    <h1>Akun <?php echo ucwords($_SESSION['nama']);?></h1>

    <p>
    <i>Berisi informasi akun user yang online</i>
    </p>
    
<?php
}else{
	echo '<p>Anda belum login. silahkan <a href="index.php">Login</a></p>';
}
?>

