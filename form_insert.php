<?php
include 'connectionDb.php';

if(isset($_POST['prenom'])!='' AND isset($_POST['nom'])!='')
{
    $req=$bdd->prepare('INSERT INTO table_formulair(prenom,nom,date_insertion) VALUES(:prenom,:nom,CURRENT_DATE())') or die(print_r($bbd->errorInfo()));
    $req->execute(array(
        'prenom'=>$_POST['prenom'],
        'nom'=>$_POST['nom'],
    ));
    echo '<script>alert("l etudiant a bien ete ajoute dans la base de donnees")</script>';
}else{

}
$reponse=$bdd->query("SELECT * FROM table_formulair ") or die(print_r($bdd->errorInfo()));

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body
        {
            background-color: #DDD;
            padding-top: 10px;
        }
        [class*="col-"]
        {
            margin-bottom: 20px;
        }
        img
        {
            width: 100%;
        }
        .well
        {
            background-color: #CCC;
            padding: 20px;
        }
        a:active, a:focus
        {
            outline: none;
        }
        [class*="nav navbar-nav"]
        {
            margin-left: 35px;
        }
        [class*="panel panel-primary"]
        {
            margin-top: 5%;
        }
    </style>
</head>
<body>
<?php include 'menu.php';?>
<!-- Formulaire d'ajout -->
<form class="form-horizontal" action="form_insert.php" method="post">
    <fieldset>
        <h2 class="titre" style="position: center">Ajout D'etudiant ACS</h2>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="text" id="prenom" name="prenom" placeholder="Prenom" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4 control-label">
                <input type="submit" value="Ajouter un Acs" class="btn btn-info btn-block">
            </div>
        </div>
    </fieldset>
</form>
<!-- Affichage des element de la Table -->
<div class="row">
    <section class="col-sm-12">
        <div class="panel panel-primary">
            <table class="table table-striped table-condensed">
                <div class="panel-heading">
                    <h3 class="panel-title">Affichage de tous les gens dont le nom est Palmer</h3>
                </div>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Date de creation</th>
                    <th> </th>

                </tr>
                </thead>
                <tbody>
                <?php
                while($donnees=$reponse->fetch())
                {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($donnees['id_form']);?></td>
                        <td><?php echo htmlspecialchars($donnees['prenom']);?></td>
                        <td><?php echo htmlspecialchars($donnees['nom']);?></td>
                        <td><?php echo htmlspecialchars($donnees['date_insertion']);?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
</div>
<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
