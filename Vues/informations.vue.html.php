<!-- Vues/informations.vue.html.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations</title>
    <link rel="stylesheet" href="../public/css/MyCSS.css">
</head>
<body>
    <div class="container">
        <h1>Informations</h1>
        <ul>
            <?php foreach($informations as $info): ?>
                <li><?php echo $info['themail']; ?> - <?php echo $info['themessage']; ?></li>
            <?php endforeach; ?>
        </ul>
        <h2>Ajouter un nouvel article</h2>
        <form action="../public/index.php" method="post">
            <input type="hidden" name="action" value="addInformation">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required></textarea><br>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>