<?php
include('connectionDb.php');
$reponse=$bdd->query("SELECT nom,prenom,departement.nom_departement as DEP FROM etudiant_acs,departement WHERE departement.id_departma=etudiant_acs.id_etud ") or die(print_r($bdd->errorInfo()));
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
<div class="container">
    <?php include("menu.php"); ?>

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
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Departement</th>
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($donnees=$reponse->fetch())
                    {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees['prenom']);?></td>
                            <td><?php echo htmlspecialchars($donnees['nom']);?></td>
                            <td><?php echo htmlspecialchars($donnees['DEP']);?></td>
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