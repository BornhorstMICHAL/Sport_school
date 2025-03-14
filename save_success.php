<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school_sports";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Zpracování formulářových dat
$student_name = $_POST['student_name'];
$class = $_POST['class'];
$achievement = $_POST['achievement'];
$event_date = $_POST['event_date'];

// Zpracování nahraného souboru
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/";  // Adresář pro ukládání obrázků
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);  // Vytvoření složky, pokud neexistuje
    }

    $file_tmp = $_FILES["photo"]["tmp_name"];
    $file_name = basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Kontrola, zda je soubor skutečně obrázek
    if (empty($file_tmp) || !file_exists($file_tmp)) {
        die("Chyba: Soubor nebyl správně nahrán.");
    }

    $check = getimagesize($file_tmp);
    if ($check === false) {
        die("Chyba: Soubor není platný obrázek.");
    }

    // Povolené formáty
    $allowed_types = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowed_types)) {
        die("Chyba: Povoleny jsou pouze soubory JPG, JPEG, PNG a GIF.");
    }

    // Přesunutí souboru do složky
    if (move_uploaded_file($file_tmp, $target_file)) {
        $photo_url = $target_file; // Uložení relativní cesty k souboru

        // Uložení do databáze
        $sql = "INSERT INTO achievements (student_name, class, achievement, event_date, photo_url) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $student_name, $class, $achievement, $event_date, $photo_url);
        
        if ($stmt->execute()) {
            echo "Úspěch byl přidán!";
            echo "<br><a href='index.html'>Zpět</a>";
        } else {
            echo "Chyba při zápisu do databáze: " . $stmt->error;
        }
        $stmt->close();
    } else {
        die("Chyba při nahrávání souboru.");
    }
} else {
    die("Chyba: Soubor nebyl nahrán nebo došlo k chybě.");
}

$conn->close();
?>
