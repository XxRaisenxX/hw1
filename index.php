<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // L'utente è loggato, puoi mostrare il suo nome utente e il pulsante di logout
} else {
    header("location: login.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_cheapshark.css">
    <title>Homepage - Giochi</title>
</head>

<body>
    <header>
        <h1>Benvenuti nella Pagina di Videogiochi</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($username)): ?>
                <p>Benvenuto,
                    <?php echo $username; ?>!
                </p>
                <form action="logout.php" method="POST">
                    <input type="submit" value="Logout">
                </form>
            <?php else: ?>
                <form action="login.php" method="POST">
                    <h2>Accedi!</h2>
                    <!-- Resto del modulo di accesso -->
                    <input type="submit" value="Invia">
                </form>
            <?php endif; ?>
        </ul>
    </nav>

    <section>
        <h2>Ultime Uscite</h2>
        <div class="game-list">
            <?php
            // Codice PHP per ottenere e visualizzare le ultime uscite dei videogiochi
            $ultime_uscite = array(
                array("titolo" => "The Last of Us Part II", "immagine" => "img/the-last-of-us.jpg"),
                array("titolo" => "Cyberpunk 2077", "immagine" => "img/cyberpunk-2077.jpg"),
                array("titolo" => "Assassin's Creed Valhalla", "immagine" => "img/assassins-creed.jpg"),
            );

            foreach ($ultime_uscite as $gioco) {
                echo '<div class="game">';
                echo '<img src="' . $gioco['immagine'] . '" alt="' . $gioco['titolo'] . '">';
                echo '<h3>' . $gioco['titolo'] . '</h3>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <div class="container">
        <div class="colonna_sx">
            <div class="colonna">
                <h1>CheapShark Game Prices</h1>
                <div id="search-container">
                    <label for="title-input">Titolo del gioco:</label>
                    <input type="text" id="title-input" placeholder="Titolo Gioco">
                    <button id="search-btn">Cerca</button>
                </div>
                <div id="game-prices"></div>
            </div>

            <script src="script.js"></script>

            <footer>
                <p>&copy; 2023 Pagina di Videogiochi. Tutti i diritti riservati.</p>
            </footer>
</body>

</html>