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

    <title>MBO Cinema's - <?php echo htmlspecialchars(ucfirst(basename($_SERVER['PHP_SELF'], '.php'))); ?></title>
</head>

<body>

    <?php include("../templates/header.php"); ?>

    <main>
        <div class="privacy">
            <div class="privacy-title">
                <h1>Privacy</h1>
                <hr>
            </div>
            <div class="privacy-item">
                <p>&#x2022; Wij van MBOCinemas nemen uw privacy serieus.</p>
                <p>&#x2022; Wij zullen uw gegevens nooit delen met derden.</p>
                <p>&#x2022; Wij zullen uw gegevens alleen gebruiken voor het doel waarvoor u ze heeft verstrekt.</p>
                <p>&#x2022; Wij zullen uw gegevens niet langer bewaren dan nodig is.</p>
                <p>&#x2022; Wij zullen uw gegevens beveiligen tegen ongeautoriseerde toegang, verlies of diefstal.</p>
                <p>&#x2022; Wij zullen uw gegevens niet gebruiken voor andere doeleinden dan waarvoor u ze heeft verstrekt.</p>
                <p>&#x2022; Wij zullen uw gegevens niet gebruiken voor direct marketing.</p>
            </div>
        </div>
    </main>


    <script src="../mbocinemas/js/index.js"></script>
</body>

</html>