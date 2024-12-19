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

    <?php include("../templates/header.php"); ?>

    <main class="scroll">
        <section class="column">
            <form class="column">

                <article>
                    <div class="rounded row contact">
                        <div class="rounded contactHighlight">Film: </div>
                        <input type="text" name="filmName" value="Five Nights At Freddy's">
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
            <input type="file" name="filmIcoon" value="XO-XO-XO">
        </div>
        
        <div class="rounded row contact">
            <div class="rounded contactHighlight">Categorie: </div>
            <input type="text" name="filmCategorie" value="Fiction">
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