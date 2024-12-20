<?php
include("./db/knakworst.php");

try {
    // Haal alle films
    $filmsQuery = "
        SELECT films.id, films.name AS film_name, films.image_path
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

    <?php include("./templates/header.php"); ?>

    <main>
        <article class="vertical-scroll">
            <h1>Home</h1>

            <!-- Nieuw Section -->
            <section class="section">
                <h2 class="section-title">Nieuw</h2>
                <div class="horizontal-scroll">
                    <?php if (!empty($films)): ?>
                        <?php foreach ($films as $film): ?>
                            <div class="grid-item">
                                <div class="grid-item-image">
                                    <a href="/pages/film.php?id=<?php echo htmlspecialchars($film['id']); ?>">
                                        <img src="<?php echo htmlspecialchars($film['image_path']); ?>"
                                            alt="<?php echo htmlspecialchars($film['film_name']); ?>">
                                        <div class="grid-item-title"><?php echo htmlspecialchars($film['film_name']); ?></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No films available.</p>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Categorie Section -->
            <div class="section">
                <h2 class="section-title">Categorie</h2>
                <div class="horizontal-scroll">
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <div class="grid-item">
                                <div class="grid-item-image">
                                    <img src="<?php echo htmlspecialchars($category['image_path']); ?>"
                                        alt="<?php echo htmlspecialchars($category['category_name']); ?>">
                                    <div class="grid-item-title"><?php echo htmlspecialchars($category['category_name']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No categories available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </article>
    </main>

    <script src="./js/script.js"></script>
</body>

</html>