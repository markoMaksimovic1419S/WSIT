<?php

        session_start();
        if(isset($_SESSION["ulogovan"])){
            //echo $_SESSION["ulogovan"];
            //echo $_SESSION["korisnik"]["id"];
            //echo $_SESSION['korisnik']['aadmin'];
            if($_SESSION['korisnik']['aadmin']){
                
                $uredi_id = htmlspecialchars($_GET["id_uredi"]);

                if($_SESSION['korisnik']['id'] == $_GET["id_uredi"]){
                    echo "Stavio sam da ne mozete trenutnog korisnika da obrisete<br>Bicete vraceni na stranicu korisnici za 5 sekundi";
                    header('Refresh: 5;URL=../korisnici.php');
                }
                else{
                    $host = "localhost";
                    $user = "root";
                    $pass = "";
                    $database = "dz8";

                    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


                    $stmt = $pdo->prepare("DELETE FROM korisnici WHERE id = :uredi_id");
                    
                    $stmt->execute([
                        ':uredi_id' => $uredi_id
                    ]);
                    header("location: ../korisnici.php");
                }


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