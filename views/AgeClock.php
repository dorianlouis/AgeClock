<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>AgeClock</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CHEMIN_VUES ?>css/base.css" media="all">
    </head>
    <body>
        <header>
            <h1>AgeClock</h1>
        </header>

        <form method="post">
            <p>Entrez votre date de naissance et votre heure de naissance a la minute pres (si possible)</p>
            <p><input type="text" name="jourNaissance">/<input type="text" name="moisNaissance">/<input type="text" name="anneeNaissance"></p>
            <p><input type="text" name="heureNaissance">:<input type="text" name="minuteNaissance">:<input type="text" name="secondeNaissance"></p>
            <input type="submit" name="exec" value="executer">
        </form>
        <?php $_SESSION["AgeClock"]->calculerJoursDeDifference()?>
        <?php var_dump($_SESSION["DateNaissance"]);?>
        <?php var_dump($_SESSION["HeureNaissance"]);?>
        <?php var_dump(DATEDUJOUR);?>
        <?php var_dump(HEUREACTUELLE);?>
        <footer>
            <strong>Excellente journée qu'aujourd'hui le <?php echo DATEDUJOUR ?></strong>
            :: <?php echo $time; ?>ms pour exécuter le script PHP du client <?php echo SESSION_ID ?> ::
        </footer>
    </body>
</html>