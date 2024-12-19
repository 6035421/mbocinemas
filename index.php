<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Kijk de nieuwste film bij MBO Cinema's">
    <meta name="keywords" content="Films, series, bioscoop">
    <meta name="author" content="Quinten, Luke">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/css.css">
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">

    <title>MBO Cinema's - Home</title>
</head>

<body>

    <?php include("./templates/header.php");
    try {
        // Haal alle films
        $filmsQuery = "
            SELECT films.name AS film_name, films.image_path
            FROM films
            ORDER BY films.id
        ";
        $filmsStmt = $pdo->query($filmsQuery);
        $films = $filmsStmt->fetchAll(PDO::FETCH_ASSOC);

        // Haal alle categorieën
        $categoriesQuery = "
            SELECT name AS category_name, image_path
            FROM categories
            ORDER BY id
        ";
        $categoriesStmt = $pdo->query($categoriesQuery);
        $categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    ?>

    <main>
        <article class="vertical-scroll">
            <h1>Home</h1>

            <!-- Nieuw Section -->
            <div class="section">
                <h2 class="section-title">Nieuw</h2>
                <div class="horizontal-scroll">
                    <?php for ($i = 0; $i < 12; $i++): ?>
                        <div class="grid-item"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Categorie Section -->
            <div class="section">
                <h2 class="section-title">Categorie</h2>
                <div class="horizontal-scroll">
                    <?php for ($i = 0; $i < 12; $i++): ?>
                        <div class="grid-item"></div>
                    <?php endfor; ?>
                </div>
            </div>
        </article>
    </main>

    <script src="./js/index.js"></script>
</body>

</html>