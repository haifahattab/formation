<?php
    include_once("database.php");
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $passwordverif = $_POST['passwordverif'];
        if(!empty($password) && !empty($passwordverif)){
            if($password == $passwordverif){
                session_start();
                $mail = $_SESSION['email'];
                /*$bdd = new PDO('mysql:host=localhost;dbname=niv2-bdd;charset=utf8', 'root', '');
                $sql = $bdd ->prepare('UPDATE connexions SET password = ? WHERE login = ?');
                $sql -> execute(array($password, $mail));*/
                $database->update('connexions',['password'=>$password],
                ['login'=>$mail]);
                header('Location:login.php');
            }else{
                    echo "Les mots de passe ne sont pas identiques!";
                }
        }else{
                echo "Remplir tous les champs!";
            }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       form{
            margin-left: 40%;
            margin-top: 10%;
        }
    </style>
    
</head>
<body>
    <form method="post" action="#">
    <h3>Initialisation de mot de passe </h3>
        <div class="form-group"> 
            <label for="ipassword">Nouveau mot de passe :</label>
            <input type="text" name="password" id="ipassword">
        </div>
        <div class="form-group">
            <label for="ipasswordverif&">Confirmer le mot de passe :</label>
            <input type="text" name="passwordverif" id="ipasswordverif">
        </div>
        <button name="submit">Valider</button>    
    </form>
 
</body>
</html>