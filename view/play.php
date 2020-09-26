<?php

use Core\Html\Form;
use Core\Util\ErrorManager;
use Core\Util\SuccessManager;

?>

<section id="section_play">

    <h1>Joueur : <?= $pendu->getPlayer(); ?></h1>

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

    <p>Lettres déjà essayées :<?= $pendu->getLettersTried(); ?></p>

    <p>Nombre de tentatives : <?= $pendu->getAttempts(); ?></p>

    <p>Nombre d'échecs restants : <?= $pendu->getFailures(); ?></p>

    <p>Choisissez une lettre qui d'après vous se trouve dans le mot :</p>

    <?php
        $state = $pendu->getState();
        $chaine = $state[0];
        for($i = 1; $i < strlen($state); $i++) {
            $chaine .= ' ' . $state[$i];
        }
    ?>

    <div id="for_word">

        <p id="word"><?= $chaine; ?></p>

    <?php if ($form instanceof Form) : ?>

        <form id="change_word" action="?target=start" method="POST">

            <input type="text" name="player" value="<?= $pendu->getPlayer(); ?>" hidden>
            <input type="text" name="level" value="<?= $pendu->getLevel(); ?>" hidden>
            <input type="text" name="failures" value="<?= $pendu->getFailures(); ?>" hidden>

            <button class="btn btn-info">Changer de mot</button>

        </form>

    </div>

    <div>

        <form class="form_start" action="?target=play" method="POST">

            <div>
                <?= $form->select('letter', $letters = $pendu::LETTERS, 'Lettre :', 'Choose a letter', ['required' => 'required']); ?>
            </div>

            <button class="btn btn-primary">Valider</button>

        </form>

    <?php endif; ?>

        <figure><img src="<?= 'imgs/failure' . $pendu->getFailures() . '.png' ; ?>" alt="Pendu en cours"></figure>

    </div>

</section>
