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

    <title>MBO Cinema's - Edit Reserveringen</title>
</head>

<body>

    <?php include("../templates/header.php");

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

    if (isset($_POST['filmName'])) {
        $filmNaam = $_POST['filmName'];

        $datum = $_POST['filmDatum'];
        $tijd = $_POST['filmBeginTijd'];
        $duur = $_POST['filmDuur'];

        $icoon = $_POST['filmIcoon'];
        $categorie = array_search($_POST['filmCategorie'], array_column($categories, 'category_name'));

        if ($_GET['type'] == 'add') {
            try {
                $stmt = $pdo->prepare("INSERT INTO films (name, image_path, category_id, datums, tijden, duur) VALUES (:name, :image_path, :category_id, :datums, :tijden, :duur)");
                $stmt->execute(['name' => $filmNaam, 'image_path' => $icoon, 'category_id' => $categorie, 'datums' => $datum, 'tijden' => $tijd, 'duur' => $duur]);
                echo "Film succesvol toegevoegd.";
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    echo "Film bestaat al";
                } else {
                    echo "Er is een fout opgetreden: " . $e->getMessage();
                }
            }
        }
    }
    ?>

    <datalist id="films">
        <?php
        foreach ($films as $film): ?>

            echo `<option><?php echo htmlspecialchars($film['film_name']); ?></option>`;
        <?php endforeach; ?>
    </datalist>

    <datalist id="categories">
        <?php
        foreach ($categories as $cat): ?>

            echo `<option><?php echo htmlspecialchars($cat['category_name']); ?></option>`;
        <?php endforeach; ?>
    </datalist>

    <main class="scroll">
        <section class="column">
            <form class="column" id="filmsForm" method="post">

                <article>
                    <div class="rounded row contact">
                        <div class="rounded contactHighlight">Film: </div>
                        <input type="text" list="films" name="filmName" value="Five Nights At Freddy's">
                    </div>
                </article>

                <hr titleText="Data">
                <article>
                    <div class="rounded row contact">
                        <div class="rounded contactHighlight">Datum: </div>
                        <input type="date" name="filmDatum" value="XO-XO-XO">
                    </div>

                    <div class="rounded row contact">
                        <div class="rounded contactHighlight">Tijd: </div>
                        <input type="time" name="filmBeginTijd" value="XO-XO-XO">
                    </div>

                    <div class="rounded row contact">
                        <div class="rounded contactHighlight">Duur: </div>
                        <input type="time" name="filmDuur" value="XO-XO-XO">
                    </div>
                </article>

                <?php
                if ($_GET['type'] != 'add') {
                    echo '
    <hr titleText="Locatie">
    <article>
        <div class="rounded row contact">
            <div class="rounded contactHighlight">Bioscoop: </div>
            Absolute Cinema
        </div>

        <div class="rounded row contact">
            <div class="rounded contactHighlight">Zaal: </div>
            002
        </div>

        <div class="rounded row contact">
            <div class="rounded contactHighlight">RIj: </div>
            3
        </div>

        <div class="rounded row contact">
            <div class="rounded contactHighlight">Stoelen: </div>
            6 en 9
        </div>
    </article>

    <hr titleText="Status">

    <article>
        <div class="rounded row contact">
            <div class="rounded contactHighlight">Status: </div>
            Betaald
        </div>
    </article>

    <hr titleText="Contact">
    <article>
        <div class="rounded row contact">
            <div class="rounded contactHighlight">Telefoon: </div>
            XO-XOXO-XOXO
        </div>

        <div class="rounded row contact">
            <div class="rounded contactHighlight">E-mail: </div>
            XOXO@XOXO.com
        </div>

        <div class="rounded row contact">
            <div class="rounded contactHighlight">Adress: </div>
            3336 QD, Sassenheim
        </div>
    </article>';
                } else {
                    echo '
    <hr titleText="displayData">
    <article>
        <div class="rounded row contact">
            <div class="rounded contactHighlight">Icoon: </div>
            <input type="url" name="filmIcoon" value="XO-XO-XO">
        </div>
        
        <div class="rounded row contact">
            <div class="rounded contactHighlight">Categorie: </div>
            <input type="text" list="categories" name="filmCategorie" value="Fiction">
        </div>
    </article>';
                }
                ?>


                <button type='submit' id="safe">Opslaan</button>
            </form>
        </section>
    </main>


    <script src="../js/formValidatie.js"></script>
    <script src="../js/formStoring.js"></script>
    <script src="../mbocinemas/js/index.js"></script>
</body>

</html>