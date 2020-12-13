<?php

if (isset($_POST['url'])) {

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$code = generateRandomString();

if (isset($_POST['custom'])) {
  $code = $_POST['custom'];
}

while (file_exists('../'.$code)) {
  $code = generateRandomString();
}

$dir = mkdir("../".$code);
$file = fopen("../".$code."/index.php", "w");
fwrite($file, "<?php header('Location: ".$_POST['url']."');");

fclose($file);

echo "http://".$_SERVER['SERVER_NAME']."/".$code;

}

?>

<form action="" method="post">
<input type="text" name="url" placeholder="URL">
<input type="text" name="custom" placeholder="Custom URL (leave blank for auto-generated)">
<input type="submit">
</form>
