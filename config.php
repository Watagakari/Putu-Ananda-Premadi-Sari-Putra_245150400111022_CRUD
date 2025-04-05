<?php
$conn = mysqli_connect('localhost:3306', 'root', '271205', 'db_sekolah');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows= [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
    return $rows;
}

function insert($data){
    global $conn;

    if (isset($_POST['submit'])) {
        $nama=htmlspecialchars($data['nama']);
        $nim=htmlspecialchars($data['nim']);
        $universitas=htmlspecialchars($data['universitas']);
        $prodi=htmlspecialchars($data['prodi']);

        $querry = "INSERT INTO pusat_data VALUES ('$nama', '$nim', '$universitas', '$prodi')"; 
        mysqli_query($conn, $querry);

        return mysqli_affected_rows($conn);
      }
}

function delete($nim){
    global $conn;
    mysqli_query($conn, "DELETE FROM pusat_data WHERE nim=$nim");
    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;

        $nama=htmlspecialchars($data['nama']);
        $nim=htmlspecialchars($data['nim']);
        $universitas=htmlspecialchars($data['universitas']);
        $prodi=htmlspecialchars($data['prodi']);

        $querry = "UPDATE pusat_data SET 
                        nama = '$nama',
                        nim = '$nim',
                        universitas = '$universitas',
                        program_studi = '$prodi'
                    WHERE nim = '$nim'"; 
        mysqli_query($conn, $querry);

        return mysqli_affected_rows($conn);
}

?>