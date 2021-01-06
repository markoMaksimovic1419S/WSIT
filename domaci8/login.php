<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css" />
    <title>Domaci 8</title>
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION["ulogovan"])){
        echo "OK";
        header("location: korisnici.php");
    }

?>
<div id="sadrzaj">



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <h2>Prijava</h2>

            <p id="lose" style="display: none; color: red; text-align: center;">Proverite podatke</p>
        
            <input required name="email" type="email" placeholder="Unesite email adresu">
            <br><br>

            <input required id="sifra" name="sifra" type="password" placeholder="Unesite sifru"><br><br>

            <input type="submit" value="Prijavi se"><br>
            <a href="index.php">Registrujte se ukoliko nemate imate nalog</a>


    </form>


</div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<script>
    function lose(){
        $("#lose").toggle();
    }





</script>





<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        
        $email = $_POST["email"];
        $sifra = $_POST["sifra"];



        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "dz8";

        $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


        $stmt = $pdo->prepare("SELECT * FROM korisnici WHERE email = :email");
        
        $stmt->execute([
            ':email' => $email,
        ]);
        
        $redovi = $stmt->rowCount();
        echo $redovi;

        if($stmt->rowCount() != 1){
            echo "<script>lose();</script>";
            
        }
        else{
            $korisnik = $stmt->fetch();
            if(!password_verify($sifra, $korisnik['sifra']))
            {   
                echo "<script>lose();</script>";
                
            }
            else{


                $_SESSION["ulogovan"] = true;
                $_SESSION["korisnik"] = $korisnik;
                
                header("location: korisnici.php");



            }
        }

    }

?>


</body>
</html>