<?php
set_time_limit(500);
$servername = "localhost";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$servername;dbname=haydarbas", $username, $password);
    $db->exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


require('simple_html_dom.php');
// Create DOM from URL or file
$data = $db->query("SELECT * FROM hocam_makale where id >1061")->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    $html1 = file_get_html($row['url']);
    $html2 = file_get_html($row['url']);
    $tarih =$row['tarih'];
    $basklik=$html2->find('h1', 0)->plaintext;
    $desc=$html2->find('#yazi', 0);
    echo $basklik;
    echo $desc;
    $stmt = $db->prepare("insert into kose_yazilari SET title=:title,description=:description,slug=:slug,created_at=:created_at");
    $stmt->execute(array(
        ":title" => html_entity_decode($basklik, ENT_QUOTES,"UTF-8"),
        ":description" => $desc,
        ":slug" => $basklik,
        ":created_at" => $tarih,

    ));
}


?>
