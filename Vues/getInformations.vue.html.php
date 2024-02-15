<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
</body>
</html>