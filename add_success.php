<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat úspěch</title>
</head>
<body>
    <h2>Přidat sportovní úspěch</h2>
    <form action="save_success.php" method="post">
        Jméno: <input type="text" name="student_name" required><br>
        Třída: <input type="text" name="class" required><br>
        Úspěch: <textarea name="achievement" required></textarea><br>
        Datum: <input type="date" name="event_date" required><br>
        URL fotografie: <input type="text" name="photo_url" required><br>
        <input type="submit" value="Přidat">
    </form>
</body>
</html>