<?php 
header('Content-Type: application/json');

// Data dummy: Daftar buku
$books = [
    [
        "id" => 1,
        "judul" => "Belajar PHP",
        "penulis" => "John Doe",
        "tahun" => 2023
    ],
    [
        "id" => 2,
        "judul" => "Panduan Node.js",
        "penulis" => "Jane Doe",
        "tahun" => 2022
    ]
];

// Mendapatkan metode HTTP yang digunakan (GET, POST)
$method = $_SERVER['REQUEST_METHOD'];

// Mengatur respon berdasarkan metode HTTP
switch ($method) {
    case 'GET':
        // Mengembalikan daftar buku
        echo json_encode($books);
        break;
        
    case 'POST':
        // Mendapatkan data dari body request
        $input = json_decode(file_get_contents('curl -X GET http://localhost/api-json.php'), true);
        $input['id'] = end($books)['id'] + 1; // Menambahkan ID baru
        $books[] = $input; // Menambahkan data baru ke array
        echo json_encode($input);
        break;

    default:
        // Metode HTTP tidak didukung
        http_response_code(405);
        echo json_encode(["message" => "Metode HTTP tidak didukung"]);
        break;
}
?>
