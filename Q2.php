<?php
include('connectionDb.php');
$reponse=$bdd->query("SELECT * FROM table1 WHERE gender='Female'") or die(print_r($bdd->errorInfo()));
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
    <div class="row">
        <section class="col-sm-12">
            <div class="panel panel-primary">
                <table class="table table-striped table-condensed">
                    <div class="panel-heading">
                        <h3 class="panel-title">Affichage de toute les Femmes</h3>
                    </div>
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Genre</th>
                        <th>Ip Addresse</th>
                        <th>Birth date</th>
                        <th>Country Code</th>
                        <th>Avatar Url</th>
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($donnees=$reponse->fetch())
                    {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees['id']);?></td>
                            <td><?php echo htmlspecialchars($donnees['first_name']);?></td>
                            <td><?php echo htmlspecialchars($donnees['last_name']);?></td>
                            <td><?php echo htmlspecialchars($donnees['email']);?></td>
                            <td><?php echo htmlspecialchars($donnees['gender']);?></td>
                            <td><?php echo htmlspecialchars($donnees['ip_address']);?></td>
                            <td><?php echo htmlspecialchars($donnees['birth_date']);?></td>
                            <td><?php echo htmlspecialchars($donnees['country_code']);?></td>
                            <td><?php echo htmlspecialchars($donnees['avatar_url']);?></td>
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