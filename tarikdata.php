
<!-- 
// $url = 'https://jsonplaceholder.typicode.com/posts';

// //inisialisasi curl
// $ch = curl_init();

// //set opsi curl untuk mengambil url, dengan metode GET
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

// //eksekusi curl dan simpan respon
// $response = curl_exec($ch);
// //tutup curl
// curl_close($ch);

// //ubah respon dari json menjadi array 
// $data = json_decode($response, true);

// print_r($data); -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Posts</title>
</head>
<body>
    <h1>Data Posts</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
                // Inisialisasi URL dan pengaturan CURL
                $url = 'http://jsonplaceholder.typicode.com/posts';
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                
                // Ubah respon JSON menjadi array
                $data = json_decode($response, true);

                // Loop untuk menampilkan data dalam tabel
                foreach ($data as $post) {
                    echo "<tr>";
                    echo "<td>" . $post['id'] . "</td>";
                    echo "<td>" . $post['title'] . "</td>";
                    echo "<td>" . $post['body'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>