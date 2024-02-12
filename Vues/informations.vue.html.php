<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations</title>
</head>
<body>
    <?php foreach($informations as $information):?>
        <div class="information">
            <p><?=$information["thedate"]?>: <?=$information["themessage"]?></p>
        </div>
    <?php endforeach?>
</body>
</html>