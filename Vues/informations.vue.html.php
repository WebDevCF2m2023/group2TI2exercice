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


    <h1></h1>

    
    <form action="informationsModel.php" method="post" >
    <div id="themail"><br><br>    
        <label for="nom">Mail</label>
        <input type="text" name="nom" id="nom"><br><br>
    </div>


    
        
   

    <div id="themessage">
        <label for="message">Message</label><br>
        <textarea id="message" name="message" rows="10" cols="30" maxlength="1024"></textarea><br><br>
        
    </div>


   

    <div id="lesubmit">
     <input type="submit" value="envoyer les données"><br><br>
    </div> 
    </form>
    

</body>
</html>