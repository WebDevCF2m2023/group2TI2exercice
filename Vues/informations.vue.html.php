<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations</title>
    <link rel="stylesheet" href="/css/MyCSS.css">
</head>
<body>
    <p id="erreur-message"><?=$erreur_message?></p>
    <form action="./" method="post">
        <div class="field">
            <label for="email">email</label>
            <input type="email" name="mail" id="mail">
        </div>
        <div class="field">
            <label for="message">message</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <div class="field">
            <input type="submit" value="envoyer">
        </div>
    </form>
    <div id="messages">
    <?php foreach($informations as $information):?>
        <div class="message">
            <h2><?=$information["thedate"]?></h2>
            <p><?=$information["themessage"]?></p>
        </div>
    <?php endforeach?>
    </div>
</body>
</html>