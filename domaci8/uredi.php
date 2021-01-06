<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <title>Domaci 8</title>
</head>
<body>


<div id="sadrzaj">
    <h2>

        <?php

            session_start();
            if(isset($_SESSION["ulogovan"])){
                //echo $_SESSION["ulogovan"];
                //echo $_SESSION["korisnik"]["id"];
                //echo $_SESSION['korisnik']['aadmin'];
                if($_SESSION['korisnik']['aadmin']){
                    echo "UREDJIVANJE KORISNIKA";
                    $uredi_id = htmlspecialchars($_GET["id_uredi"]);
                }
                else{
                    header("location: ../korisnici.php");
                }

            }
            else{
                
                header("location: ../korisnici.php");
                exit;

        }

        ?>
    </h2>


        



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_uredi=<?php echo $uredi_id; ?>" method="POST">
        
        
    <input required name="email" type="email" id="email" placeholder="Email adresa"><br><br>
    
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
    
    <input type="submit" value="Potvrdi informacije">
    
    </form>





    
    

</div>







<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function popuni(email, adresa, pol, aadmin, broj_telefona){

        console.log(email);
        $("input[name='email']").val(email);
        $("input[name='adresa']").val(adresa);
        $("input[name='broj_telefona']").val(broj_telefona);

        if(aadmin){
            $("input[name='aadmin']").prop( "checked", aadmin );
        }


        $("input[name='pol'][value='"+pol+"']").attr('checked', 'checked');





    }
</script>
<?php

            $host = "localhost";
            $user = "root";
            $pass = "";
            $database = "dz8";

            $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $pdo->prepare("SELECT * FROM korisnici WHERE id=:uredi_id");

            $stmt->execute([
                ":uredi_id" => $uredi_id
            ]);
            $rezultat = $stmt->fetchAll();




            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $dobro = true;
            
                $email_upisan = $_POST["email"];
                $pol_upisan = "";

                if(!isset($_POST["pol"]) || $_POST["pol"] == "")
                    {
                        $dobro = FALSE;
                    }
                    else{
                        $pol_upisan = $_POST['pol'];
                    }

                if(isset($_POST['aadmin']) && $_POST['aadmin'] == 'admin') 
                {
                    $aadmin_upisan = true;
                }
                else
                {
                    $aadmin_upisan = false;
                    
                }





                $broj_upisan = $_POST["broj_telefona"];
                $adresa_upisan = $_POST["adresa"];

                $email = $rezultat[0]["email"];
                if (!filter_var($email_upisan, FILTER_VALIDATE_EMAIL)) {
                    $dobro = false;
                    echo "<script>\$('#email').css('border', '1px solid red');</script>";
                }
                else{
                    
                        //echo $email;
                        //echo $_POST['email'];
                    
                        $stmt = $pdo->prepare("SELECT * FROM korisnici WHERE email = :email");
        
                        $stmt->execute([
                            ':email' => $email_upisan,
                        ]);
                        $redovi = $stmt->rowCount();
                        if($redovi == 1){
                            if($email == $email_upisan){
                            }
                            else{
                                $dobro = false;
                                echo "<script>\$('#email').css('border', '1px solid red');</script>";

                            }
                        }

                    
                }



                if($dobro){

                    $stmt = $pdo->prepare("UPDATE korisnici SET email=:email, adresa=:adresa, broj_telefona=:broj_telefona, pol=:pol, aadmin=:aadmin  WHERE id=:uredi_id");

                    $stmt->execute([
                        ":email" => $email_upisan,
                        ":pol" => $pol_upisan,
                        ":adresa" => $adresa_upisan,
                        ":broj_telefona" => $broj_upisan,
                        ":aadmin" => $aadmin_upisan,
                        ":uredi_id" => $uredi_id
                    ]);



                    echo "<p style='text-align: center; color: green;'>Promene su uspesno odradjene</p>";

                    $stmt = $pdo->prepare("SELECT * FROM korisnici WHERE id=:uredi_id");

                    $stmt->execute([
                        ":uredi_id" => $_SESSION['korisnik']['id']
                    ]);

                    
                    $_SESSION['korisnik'] = $stmt->fetchAll()[0];
                    
                    if($_SESSION['korisnik']['aadmin']){
                    }
                    else{
                        header("location: ../korisnici.php");
                    }



                }
                else{
                    
                    echo "<p style='text-align: center; color: red;'>Greska prilikom unosa podataka</p>";
                }


            }


            $stmt = $pdo->prepare("SELECT * FROM korisnici WHERE id=:uredi_id");

            $stmt->execute([
                ":uredi_id" => $uredi_id
            ]);
            $rezultat = $stmt->fetchAll();



            if($rezultat){
                $rezultat = $rezultat[0];
                $email = $rezultat['email'];
                $adresa = $rezultat['adresa'];
                $pol = $rezultat['pol'];
                $aadmin = $rezultat['aadmin'];
                $broj_telefona = $rezultat['broj_telefona'];

            echo "<br><br>";

            echo "<script>popuni('$email', '$adresa', '$pol', $aadmin, '$broj_telefona');</script>";
            }
            else{
               header("location: ../korisnici.php");
               //echo "adasdadas";
               
            }

        ?>
        
</body>
</html>