                                        <!-- BINOME : KERDOUN WALID && AMAHRI LATIFA -->  


                                                <!-- /////Exercise 1///////// -->
<?php
//delimiterChaine($car,$string) est une fonction qui permet de couper une chaîne $string en utilisant un délimiteur $car.
echo "<h2 style='text-align:center'> Exercise 1  </h2><br>";
function delimiterChaine($car,$string){
	for($i=0;$i<strlen($string);$i++){
		$tab = explode($car, $string);
	}
	return $tab;
}

// affichage de contenu du tableau retourner par la fonction delimiterChaine($car,$string).
$chaine= "Ma|Chaine|A|Decouper";
$delimiteur="|";

echo "Votre chaine est : <b>".$chaine."</b> <br> Apres la decouper : <br> ";
$tab = delimiterChaine($delimiteur,$chaine);
for($i=0; $i<sizeof($tab); $i++){
	echo "Element N°: ".$i." est : ".$tab[$i]."<br>";
}
echo "<br><br><br>";
?>



                                                <!-- /////Exercise 2///////// -->
<!DOCTYPE html>
<html>
<head>
    <title> Exercise N°2 </title>
</head>
<style>
    table,th,td,tr {
        border: 1px solid black;
    }
</style>
<body>
<h2 style='text-align:center'> Exercise 2  </h2>
<table>
    <tr>
        <th>Numero de Commande</th>
        <th>Numero Client</th>
        <th>Date Commande</th>
        <th>Designation Article</th>
        <th>Quantite (PAL)</th>
        <th>Prix Unitaire (HT)</th>
        <th>Date de Livraison</th>
        <th>Adresse Client</th>
    </tr>
        <?php 
            //ouvrir Commande_Client.txt en mode lecture
            $fp = fopen("Commande_Client.txt","r");

            //delete pscde01_CLI1001.txt or pscde01_CLI1004.txt if exist
            unlink('pscde01_CLI1001.txt');
            unlink('psccl01_CLI1004.txt');

            while($ligne = fgets($fp))
            {
                $tab = explode('|',$ligne);

                echo '<tr>';
                echo '<td>'. $tab[0] .'</td>';
                echo '<td>'. $tab[1] .'</td>';
                echo '<td>'. $tab[2] .'</td>';
                echo '<td>'. $tab[3] .'</td>';
                echo '<td>'. $tab[4] .'</td>';
                echo '<td>'. $tab[5] .'</td>';
                echo '<td>'. $tab[6] .'</td>';
                echo '<td>'. $tab[7] .'</td>';
                echo '</tr>';
            
                $numCmd = $tab[0];
                $numClt = $tab[1];
                $dateCmd = $tab[2];
                $designArt = $tab[3];
                $qte = $tab[4];
                $prixU = $tab[5];
                $dateLiv = $tab[6];
                $addClient = $tab[7];

                $fp1 = fopen("pscde01_CLI1001.txt","a+");
                $fp2 = fopen("psccl01_CLI1004.txt","a+");
                for($i = count($tab)-1;$i<count($tab);$i++)
                {
                    try{
                        //s'il s'agit du fichier du client CLI1001 il va ecrire dedans les commandes associes
                        if($numClt == 'CLI1001')
                        { 
                            $ligne2 = fputs($fp1,$numCmd."|".$numClt."|".$dateCmd."|".$designArt."|".$qte."|".$prixU."|".$dateLiv."|".$addClient);
                        }
                        //s'il s'agit du fichier du client CLI1004 il va ecrire dedans les commandes associes
                        else if($numClt == 'CLI1004')
                        {
                            $ligne2 = fputs($fp2,$numCmd."|".$numClt."|".$dateCmd."|".$designArt."|".$qte."|".$prixU."|".$dateLiv."|".$addClient);
                        }
                        echo "\n";
                    }
                    catch(Exception $e){
                        echo "ERROR: ".$e;
                    }
                }
                fclose($fp2);
                fclose($fp1);
            }
            fclose($fp);
        ?>
</table>
<br><br><br>
</body>
</html>



                                                            <!-- /////Exercise 3///////// -->
<!DOCTYPE html>
<html>
<head>
    <title> Exercise N°3 </title>
</head>
<body>
<h2 style='text-align:center'> Exercise 3  </h2>
    <h1> Choisir Une Date </h1>

    <form method="POST" action="validateDate.php">
    <table>
        <tr>
            <th>Jour</th>
            <th>Mois</th>
            <th>Annee</th>
        </tr>
        <tr>
            <td>
                <select id="jours" name="jour">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                  </select>
            </td>
            <td>
                <select id="mois" name="moi">
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
            </td>
            <td>
                <select id="annees" name="annee">
                    <option value="1913">1913</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                  </select>
            </td>
        </tr>
    </table><br>
    <input type="submit" name="submit" value="Envoyer">
</form>

</body>
</html>



                                                    <!-- /////Exercise 4///////// -->

<?php
if(isset($_POST['submit']))
{
    $password = $_POST['pswd'];
    $email = $_POST['email'];

    try{
        if (preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[*&%$@ !?#]).{8,}$/', $password)) {
            echo 'Bon Votre mot de passe contient plus que 8 caractere est fort <br>';
        }
        else 
        {
            echo "Votre mot de passe doit contenire: <br> au moins 8 caractere <br> au moins un chiffre de 0 a 9 <br> au moins un char special : *&%$@ !?/ <br> au moins une lettre Majuscule <br>";
        }
    }
    catch(Exception $e){
        echo "ERROR: ".$e;
    }

    try{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Votre Email est Bon <br>';
        }
        else 
        {
            echo "Votre Email doit contenir un @ ";
        }
    }
    catch(Exception $e){
        echo "ERROR: ".$e;
    }
}
?>
<DOCTYPE html>
<html>
<title>Exercise 4</title>
<head>
</head>
<br><br><br>
<h2 style='text-align:center'> Exercise 4  </h2>
<body>
    <!-- si action du formulaire et sur le meme fichier "Devoir2.php" il va afficher les contraintes sur email et password -->
<form action="authentification.php" method="POST">
    <label> Entrez votre Adresse Email: </label>
    <input type="text" name="email" placeholder="sous form xxx@xxx.xxx"><br><br>

    <label> Entrez votre Mot de Passe: </label>
    <input type="password" name="pswd" ><br><br>

    <input type="submit" name="submit" value="Envoyer">
</form>
</body>
</html>