<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/MyCSS.css">
</head>

<body>


    <div class="main-container">
        <span class="message">Register yourself</span>
        <span id="second-message">Already have a account? &nbsp; <a href="#" style="color: white; appearance: none;">
                Log in</a></span>

        <div class="form-container">
            <span class="message2">Fill all the fields to create a account!</span>

            <form class="form-main" method="post" >
                <label for="first-name" class="label">First Name</label>
                <input type="text" class="input-name" name="themessage" id="first-name" placeholder="First name">

                <label for="last-name" class="label">E-Mail</label>
                <input type="text" class="input-name" id="last-name" name="themail" placeholder="Email">

                <button id="showPassButton" class="showPassButton" onclick="showPass()">👁</button>
                <label for="user-password" class="label-password">Password</label>
                <input type="password" class="input-password" id="user-password" placeholder="Password">

                <input type="submit" value="Continue" class="confirm-form" id="confirm-form-submit">

                <span class="welcome-name" id="welcomeName"></span>
            </form>
        </div>
    </div>

    <script src="js/main.js"></script>

</body>

</html>
<?php var_dump($_POST);