<!DOCTYPE html>
<html>
<head>
    <title>Tabel siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body class="bg-dark">
<div class="container">
    <?php

    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['id_anggota'])) {
        $id_anggota=input($_GET["id_anggota"]);

        $sql="select * from anggota where id_anggota=$id_anggota";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_anggota=htmlspecialchars($_POST["id_anggota"]);
        $nama=input($_POST["nama"]);
        $nis=input($_POST["nis"]);
        $rayon=input($_POST["rayon"]);
        $rombel=input($_POST["rombel"]);
        $no_hp=input($_POST["no_hp"]);

        $sql="update anggota set
			nama='$nama',
			nis='$nis',
			rayon='$rayon',
			rombel='$rombel',
			no_hp='$no_hp'
			where id_anggota=$id_anggota";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2><div class="p-3 mb-2 bg-dark text-white">Update Data</div></h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group text-white">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group text-white">
            <label>NIS:</label>
            <input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>" placeholder="Masukan NIS" required/>

        </div>
        <div class="form-group text-white">
            <label>Rombel:</label>
            <input type="text" name="rombel" class="form-control" value="<?php echo $data['rombel']; ?>" placeholder="Masukan NIS" required/>

        </div>
        <div class="form-group text-white">
            <label>Rayon:</label>
            <input type="text" name="rayon" class="form-control" value="<?php echo $data['rayon']; ?>" placeholder="Masukan Email" required/>
        </div>
        <div class="form-group text-white">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" placeholder="Masukan No HP" required/>
        </div>

        <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>" />

        <button type="submit" name="submit" class="btn btn-danger">Submit</button>
    </form>
</div>
</body>
</html>