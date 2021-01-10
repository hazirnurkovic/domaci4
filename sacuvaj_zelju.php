<?php
    
    if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['zelje']) && isset($_POST['izabrano']) 
    && isset($_POST['da_ne']) )
    {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $zelje = $_POST['zelje'];
        $izabrano = $_POST['izabrano'];
        $da_ne = $_POST['da_ne'];
    }

    $samo_slova_ime = ctype_alpha($ime);
    $samo_slova_prezime = ctype_alpha($prezime);

    if(!$samo_slova_ime or !$samo_slova_prezime or empty($zelje) && $da_ne == null)
    {
        header("location: ./index.html?msg=error");
    }
    else
    {
        $nova_zelja = [ 'ime' => $ime, 'prezime' => $prezime, "izabrano" => $izabrano, "da_ne" =>$da_ne, "zelje" => $zelje];
        $nova_zelja_json = json_encode($nova_zelja);

        $folder = './zelje_db';
        if(!file_exists($folder))
        {
            mkdir($folder, 0777);
        }
        $uniID = uniqid();
        $h = fopen($folder.'/'.$uniID.'.txt', 'a+');
        fwrite($h, $nova_zelja_json);
        fclose($h);
        header("location: ./zelja_poslata.html");

    }

?>