<meta charset="utf-8" />
<?php
$pdo = new PDO('mysql:host=localhost;dbname=projet_dev_web;charset=utf8','root','');
?>


<form method="POST">
   <input type="text" name="motsclef" placeholder="Recherche..." />
   <input type="submit" name="form" value="Valider" />
</form>



<?php if(isset($_POST['form'])) {
    echo 1;
    $motsclef =htmlentities($_POST["motsclef"]);
    echo 2;
    $req = $pdo->prepare('SELECT * FROM ads WHERE Title = $motsclef or Description = $motsclef');
    echo 3;
    $req->execute();
    echo 4;
    while($annonces = $req->fetchALL(PDO::FETCH_OBJ)) {
        echo 6;
        echo $annonces['Title'];
    }
}
?>
