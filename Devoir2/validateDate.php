<?php
function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Exercise N°3 </title>
</head>

<body>

<h1>Validation de Date</h1>

<?php
if(isset($_POST['submit']))
{
    echo "La Date Saisie est :".$_POST['jour']."/".$_POST['moi']."/".$_POST['annee']."<br>";
    echo "La Date ".$_POST['annee']." est";

    $mois = $_POST['moi'];
    $jours = $_POST['jour'];
    $annees = $_POST['annee'];

    try{
        if($annees % 4 == 0)
        {
            echo "<font color='purple'> Bissextile. </font> ";
            if(($mois == 2 && $jours <= 29) || (($mois == 1 || $mois >= 3)  && $jours <= 30))
            {
                echo "<font color='green'> est valide,</font>";
            }
            else if($mois == 2 && $jours >= 30)
            {
                echo "<font color='red'> est invalide,</font>";
            }
        }
        else if($annees % 4 !==0)
        {   
            echo "<font color='purple'> NON Bissextile. </font> ";
            if($mois == 2 && $jours >= 29)
            {
                echo "<font color='red'> est invalide,</font>";
            }
            else if(($mois == 2 && $jours <= 28) || (($mois == 1 || $mois >= 3)  && $jours <= 30))
            {
                echo "<font color='green'> est valide,</font>";
            }
        }
    }
    catch(Exception $e){
        echo "ERROR: ".$e;
    }
}

?>


</body>
</html>