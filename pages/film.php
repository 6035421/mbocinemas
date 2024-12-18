<?php
include("../db/knakworst.php");

$film = null; // Variabele voorbereiden

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $film_id = $_GET['id'];

    try {
        $query = "
            SELECT films.description, films.id, films.name AS film_name, films.image_path, 
                   categories.name AS category_name
            FROM films
            INNER JOIN categories ON films.category_id = categories.id
            WHERE films.id = :id
        ";

        // Bereid de query voor en bind de parameter
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $film_id, PDO::PARAM_INT);
        $stmt->execute();

        // Haal de filmgegevens op
        $film = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Databasefout: " . $e->getMessage();
        exit;
    }
} else {
    echo "<p>Geen geldig film ID opgegeven.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Kijk de nieuwste film bij MBO Cinema's">
    <meta name="keywords" content="Films, series, bioscoop">
    <meta name="author" content="Quinten, Luke">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.png">

    <title>MBO Cinema's - Home</title>
</head>

<body>

    <?php include("../templates/header.php"); ?>

    <main>
        <article class="vertical-scroll">
            <?php if ($film): ?>
                <div class="movie-info">
                    <h1><?= htmlspecialchars($film['film_name']); ?></h1>
                    <img src="<?= htmlspecialchars($film['image_path']); ?>" alt="Film Afbeelding" />
                    <p><strong>Beschrijving:</strong> <?= htmlspecialchars($film['description']); ?></p>
                    <p class="category"><strong>Categorie:</strong> <?= htmlspecialchars($film['category_name']); ?></p>
                    <p class="film-id"><strong>Film ID:</strong> <?= htmlspecialchars($film['id']); ?></p>
                </div>
            <?php else: ?>
                <p>Film niet gevonden.</p>
            <?php endif; ?>
        </article>
    </main>


</body>

</html>