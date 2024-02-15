<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
    border-radius: 5px;
    margin: 10px auto;
    padding: 20px;
}

.card-header {
    background-color: #f1f1f1;
    padding: 10px;
    text-align: center;
    font-size: 20px;
    color: darkblue;
}

.card-body {
    padding: 10px;
}

.card-body h5 {
    color: darkblue;
    font-size: 18px;
}

.card-body p {
    color: black;
    font-size: 16px;
}
    </style>
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