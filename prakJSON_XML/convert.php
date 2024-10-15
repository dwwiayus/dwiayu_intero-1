<?php 
// Mendapatkan data dari API JSON
$jsonUrl = "http://localhost/api-json.php";
$jsonData = file_get_contents($jsonUrl);

// Decode JSON menjadi array
$booksArray = json_decode($jsonData, true);

// Membuat XML dari array
$xml = new SimpleXMLElement('<books/>');
foreach ($booksArray as $book) {
    $bookNode = $xml->addChild('book');
    $bookNode->addChild('id', $book['id']);
    $bookNode->addChild('judul', $book['judul']);
    $bookNode->addChild('penulis', $book['penulis']);
    $bookNode->addChild('tahun', $book['tahun']);
}

// Menampilkan hasil XML
header('Content-Type: application/xml');
echo $xml->asXML();
?>
