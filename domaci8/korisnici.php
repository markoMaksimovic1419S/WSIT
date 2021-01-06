<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css" />
    <title>Domaci8</title>
</head>
<body>
    
<?php

    session_start();
    if(isset($_SESSION["ulogovan"])){
        //echo $_SESSION["ulogovan"];
        //echo $_SESSION["korisnik"]["id"];
    }
    else{
        
        header("location: index.php");
        exit;

    }

?>

<div id="sadrzaj">


    <form action="odjava.php">
        <input type="submit" value="Odjavi se">
    </form>


    <table style="border-collapse: collapse;">

    <thead>
        <tr>
        <th>ID</th>
        <th>EMAIL</th>
        <th>ADRESA</th>
        <th>BROJ TELEFONA</th>
        <th>POL</th>
        <th>TIP KORISNIKA</th>
        <?php

        if($_SESSION['korisnik']['aadmin']){
            echo "<th>UREDI</th>";
            echo "<th>OBRISI</th>";
        }
        ?>
        
        </tr>

    </thead>
    <tbody>
    
    <?php

            $host = "localhost";
            $user = "root";
            $pass = "";
            $database = "dz8";

            $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            

            $stmt = $pdo->prepare("SELECT * FROM korisnici");

            $stmt->execute([
                
            ]);
            
            $rezultat = $stmt->fetchAll();
            
            foreach ($rezultat as &$value) {
                
                if($value['id'] == $_SESSION['korisnik']['id']){
                    echo "<tr style='background-color: green;'>";
                }
                else{
                    echo "<tr>";
                }

                echo "<td>";
                echo $value['id'];
                echo "</td>";
                
                echo "<td>";
                echo $value['email'];
                echo "</td>";
                
                echo "<td>";
                echo $value['adresa'];
                echo "</td>";
                
                echo "<td>";
                echo $value['broj_telefona'];
                echo "</td>";
                
                echo "<td>";
                echo $value['pol'];
                echo "</td>";
                
                echo "<td>";
                if($value["aadmin"]){
                    echo "ADMIN";
                }
                else{
                    echo "KORISNIK";
                }
                echo "</td>";

                if($_SESSION['korisnik']['aadmin']){
                
                    echo "<td>";
                    echo "<a target='_blank' href='uredi.php/?id_uredi=$value[id]'>Uredi podatke</a>";
                    echo "</td>";
                    
                    echo "<td>";
                    echo "<a target='_blank' href='brisi.php/?id_uredi=$value[id]'>Obrisi korisnika</a>";
                    echo "</td>";
                    

                }
                


                echo "</tr>";

            }


    ?>
    
    
    
    </tbody>



    </table>



</div>





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</body>
</html>