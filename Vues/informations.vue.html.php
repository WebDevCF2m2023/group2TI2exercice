<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations | Livre d'or</title>
</head>
<body>
    <h1>Informations | Livre d'or</h1>
    <div>
        <h2>Laissez un commentaire sur notre site</h2>
        <h3><?php 
        echo $nbInformations>1 ? "$nbInformations commentaires" : "$nbInformations commentaire";
        ?></h3>
        <div>
            <?php
        foreach($informations as $information):
            ?>
        <h4>Posté le <?=$information['thedate']?></h4>
        <p><?=$information['themessage']?></p>
            <?php
        endforeach;
            ?>
        </div>
    </div>
</body>
</html>