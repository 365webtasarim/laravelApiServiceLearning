<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="Content-Language" content="TR"/>
<?php
set_time_limit(500);

$servername = "localhost";
$username = "phbeorg_uu";
$password = "AQq1@ycZ4adt";

try {
    $db = new PDO("mysql:host=$servername;dbname=phbeorg_cc", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

require('simple_html_dom.php');
// Create DOM from URL or file
//$data = $db->query("SELECT * FROM hocam_makale where id > 1686")->fetchAll();
$data = $db->query("SELECT * FROM hocam_makale")->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    $html1 = file_get_html($row['url']);
    $html2 = file_get_html($row['url']);
    $basklik = $html2->find('h1', 0)->plaintext;
    $desc = $html2->find('#yazi', 0)->plaintext;
    echo $basklik;
    echo $desc;
    $stmt = $db->prepare("insert into koseyazisi_copy SET title=:title,description=:description,slug=:slug");
    $stmt->execute(array(
        ":title" => html_entity_decode($basklik, ENT_QUOTES, "utf8"),
        ":description" => '<p>'.implode('</p><p>', preg_split('/\R+/', $desc)).'</p>',
        ":slug" => $basklik
    ));
}


?>
