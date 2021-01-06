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
        header("location: korisnici.php");
        exit;
    }
?>


<div id="sadrzaj">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2>Registracija</h2>

        <p id="upotreba" style="display: none; color: red; text-align: center;">Ova email adresa je  u upotrebi</p>
        <input required name="email" type="email" placeholder="Unesite email adresu">
        <br><br>

        <input minlength="5" required id="sifra" name="sifra" type="password" placeholder="Unesite sifru"><br><br>

        <input minlength="5" required id="ponovi" name="ponovi" type="password" placeholder="Potvrdite sifru"><br><br>

        <input name="broj_telefona" type="text" placeholder="Broj telefona"><br><br>

        <input name="adresa" type="text" placeholder="Adresa"><br><br>

        <p>Pol</p>

        <p>
        <input required type="radio" name="pol" value="M">M


        <input required type="radio" name="pol" value="Z">Z
        </p>

    

        <p>
            <input type="checkbox" name="aadmin" value="admin"><br>ADMIN
        
        </p>

        <p id="lose" style="display: none; color: red; text-align: center;">Podaci u crvenim poljima nisu dobro uneti</p>
        <br>    
        <input type="submit" value="Registruj se"><br>
        <a href="login.php">Prijavite se ukoliko imate nalog</a>

    
    </form>

</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

    function losMail(podatak){
        $("input[name='"+ podatak +"']").css("border","1px solid red");
        $("#lose").css("display","block");
    }

    function dobraVrednostTekst(podatak, vrednost){
        $("input[name='"+ podatak +"']").val(""+ vrednost +"");
    }

    function dobraVrednostPol(vrednost){
        $("input[name='pol'][value='"+vrednost+"']").attr('checked', 'checked');
    }

    function dobraVrednostAdmin(vrednost){
        $("input[name='aadmin']").prop( "checked", vrednost );
    }
    function mail_postoji(){
        $("input[name='email']").css("border","1px solid red");
        $("#upotreba").toggle();
    }
    
    
    
 
</script>

<script>

        $("#ponovi").keyup(function() {
            if($("#ponovi").val() == $("#sifra").val()){
                $("#ponovi").css("border","2px solid green");
                $("#sifra").css("border","2px solid green");
                $("#ponovi").css("background-color","transparent");
            }
            else{
                $("#ponovi").css("border","2px solid red");
                $("#sifra").css("border","2px solid red");
                $("#ponovi").css("background-color","red");

            }
        
        });
        
        $("#sifra").keyup(function() {
            if($("#ponovi").val() == $("#sifra").val()){
                $("#ponovi").css("border","2px solid green");
                $("#sifra").css("border","2px solid green");
                $("#ponovi").css("background-color","transparent");
            }
            else{
                $("#ponovi").css("border","2px solid red");
                $("#sifra").css("border","2px solid red");
                $("#ponovi").css("background-color","red");

            }
        
        });

</script>


<?php
$broj_telefona = "";
$aadmin = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dobro = TRUE;

    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $dobro = FALSE;
        echo "<script>losMail('email');</script>";
      }
      else{
          
        echo "<script>dobraVrednostTekst('email', '$email');</script>";
      }


    $sifra = $_POST["sifra"];
    
    $ponovi = $_POST["ponovi"];
    $dobro_sifre = TRUE;
    if($sifra != $ponovi){
        $dobro = FALSE;
        $dobro_sifre = FALSE;
    }

    if(strlen($sifra) < 5){
        $dobro = FALSE;
        echo "<script>losMail('sifra');</script>";
    }
    else{
        if(!$dobro_sifre){
            echo "<script>losMail('sifra', '');</script>";
            echo "<script>losMail('ponovi', '');</script>";
        }
        else{
            echo "<script>dobraVrednostTekst('sifra', '$sifra');</script>";
            echo "<script>dobraVrednostTekst('ponovi', '$sifra');</script>";
        }
    }

    $adresa = $_POST["adresa"];
    $broj_telefona = $_POST["broj_telefona"];
    

    $pol = $_POST["pol"];

    
    if(!isset($pol) || trim($pol) == '')
        {
            $dobro = FALSE;
        }
    echo "<script>dobraVrednostPol('$pol');</script>";

    $aadmin = "";

    if(isset($_POST['aadmin']) && $_POST['aadmin'] == 'admin') 
        {
            $aadmin = TRUE;
        }
        else
        {
            $aadmin = FALSE;
            
        }
    echo "<script>dobraVrednostAdmin('$aadmin');</script>";
    echo "<script>dobraVrednostTekst('adresa', '$adresa');</script>";
    echo "<script>dobraVrednostTekst('broj_telefona', '$broj_telefona');</script>";


    echo "<br>";
    if($dobro){

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
        $moze_kreiranje = True;
        if($stmt->rowCount() == 1){
            $moze_kreiranje = False;
            echo "<script>mail_postoji();</script>";
        }

        if($moze_kreiranje){
            $sifra_hash = password_hash($sifra,PASSWORD_BCRYPT); 
            $stmt = $pdo->prepare("INSERT INTO korisnici (email,sifra,pol,aadmin,adresa,broj_telefona) VALUES (:email,:sifra_hash,:pol, :aadmin, :adresa, :broj_telefona)");
            
            $stmt->execute([
                'email' => $email,
                'sifra_hash' => $sifra_hash,
                'pol' => $pol,
                'aadmin' => $aadmin,
                'adresa' => $adresa,
                'broj_telefona' => $broj_telefona,
            ]);
            header("location: login.php");
            exit;
            }

    }
    else{
        
    }
}
?>
    
    
</body>
</html>