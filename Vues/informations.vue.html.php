<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/MyCSS.css">
</head>
<body>
<?php
        foreach ($informations as $commentaire) {
            ?>
            <div class="card">
                <div class="card-header">
                <p>
  <?php echo $commentaire['thedate']; ?> | <?php echo htmlspecialchars($commentaire['themessage']); ?> | <?php echo htmlspecialchars($commentaire['themail']); ?>
</p>
                </div>
                <div class="card-body">
                    <h5><?php echo $commentaire['thedate']; ?></h5>
                    <p><?php echo $commentaire['themail']; ?></p>
                    <p><?php echo $commentaire['themessage']; ?></p>
                    
                </div>
            </div>
            <?php
        }
        ?>
    <h1>Formulaire de contact</h1>
    <form action="" method="post">
        <div>
            <div id="lenom">
                <label for="nom">Nom</label>
                <input type="email" name="themail" id="nom">
            </div>

            

        <div>
            <div id="lemessage">
                <label for="msg">Message</label>
                <textarea name="themessage" id="msg" cols="30" rows="5" maxlength="1024"></textarea>
            </div>
        </div>
        <div id="envoi">
            <input type="submit" value="Envoyer les données">
        </div>
    </form>
</body>
</html>
<?php var_dump($_POST);