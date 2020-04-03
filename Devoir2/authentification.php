<?php

if(isset($_POST['submit']))
{
    //recuperation du mail et password entree
    $password = $_POST['pswd'];
    $email = $_POST['email'];

    //fonction de validation de mail
    function validate_email($email)
    {
        try{
            //check if email est sous la bonne format
            if(preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $email)){
                //echo 'Bon Votre Adresse Email est correcte. <br>';
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        catch(Exception $e)
        {
            echo "ERROR: ".$e;
        }
    }

    //fonction de validation de password
    function validate_password($password)
    {
        try{
             //check if password est sous la bonne format
            if (preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[*&%$@ !?#]).{8,}$/', $password)) {
                //echo 'Bon Votre mot de passe contient plus que 8 caractere est fort. <br>';
                return TRUE;
            }
            else 
            {
                return FALSE;
            }
        }
        catch(Exception $e){
            echo "ERROR: ".$e;
        }
    }
    //ouverture de mon fichier
    $fp = fopen("login.txt","r");
    $nbr = 0;
    $tab = array();
    while(!feof($fp)){
        $ligne = fgets($fp);
        $tab[$nbr] = explode('|',$ligne);
        $nbr++;
    }
    try{
        if( validate_email($email) == TRUE && validate_password($password) == TRUE)
        {
            //transformer mon tableau en string 
            $first = implode(" ",$tab[0]);
            $second = implode(" ",$tab[1]);
            $third = implode(" ",$tab[2]);

            try{
                //check if $email existe dans $first ou $second ou $third
                if(!strstr($first,$email) && !strstr($second,$email) && !strstr($third,$email))
                {
                    echo "<br> <b>Email inexistant</b> <br>";
                }
                //check if $password existe dans $first ou $second ou $third
                if(!strstr($first,$password) && !strstr($second,$password) && !strstr($third,$password))
                {
                    echo "<br> <b>Mot de Passe invalide</b> <br>";
                }
                //check if $email and $password existe dans $first ou $second ou $third
                if((strstr($first,$email) && strstr($first,$password)) || (strstr($second,$email) && strstr($second,$password)) || strstr($third,$email) && strstr($third,$password) )
                {
                    echo "<br> <b>Authentification Reussie</b> <br>";
                }  
                }
            catch(Exception $e){
                echo "ERROR: ".$e;
            }
        }
    } 
    catch(Exception $e){
        echo "ERROR: ".$e;
    }
    fclose($fp);
}
?>