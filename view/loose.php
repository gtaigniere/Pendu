<?php

use Core\Util\ErrorManager;
use Core\Util\SuccessManager;

?>

<section id="section_loose">

    <h1>Perdu</h1>
    <?php
    foreach (SuccessManager::getMessages() as $message) : ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach;
    SuccessManager::destroy();

    foreach (ErrorManager::getMessages() as $message) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach;
    ErrorManager::destroy();
    ?>

    <p>Vous avez perdu après <?= $pendu->getAttempts(); ?> tentatives.</p>
    <figure><img src="<?= 'imgs/pendu.jpg' ; ?>" alt="Pendu"></figure>


    <p>Que voulez-vous faire à présent ?</p>

    <p>
        <a href="?target=replay"><button class="btn btn-success">Rejouer</button></a>
        <a href="?target=leave"><button class="btn btn-warning">Quitter</button></a>
    </p>

    <audio controls>
<!--        <source src="../sons/loose-1.mp3" type="audio/mp3">-->
        <source src="../sons/loose-2.mp3" type="audio/mp3">
    </audio>

</section>
