<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// získání parametrů obrázku
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Soubor je obrázek - " . $check["mime"] . " s rozlišením " . $check[0] . "x" . $check[1] . "px.";
    $uploadOk = 1;
  } else {
    echo "Soubor není obrázek.";
    $uploadOk = 0;
  }
}

echo "<br>";

// kontrola přípony souboru
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Pouze přípony JPG, JPEG, PNG & GIF souborů jsou povoleny.<br>";
  $uploadOk = 0;
}

// kontrola duplicity názvu souboru ze strany serveru
if (file_exists($target_file)) {
    echo "Soubor již existuje.<br>";
    $uploadOk = 0;
}

// kontrola velikosti souboru
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Soubor je příliš velký.<br>";
  $uploadOk = 0;
}

// finální nahrání, nebo vyspsání chyby
if ($uploadOk == 0) {
  echo "Soubor nebyl nahrán.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo 'Soubor <span style="color: Indigo; font-weight: 600;">'. htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "</span> Byl nahrán.";
  } else {
    echo "Vyskytla se chyba při nahrávání souboru.";
  }
}

?>