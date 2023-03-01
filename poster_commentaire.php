<?php

require_once __DIR__ . '/Page.php';
$page = new Page();

$clef = $_GET['clef'];

$nouveauCommentaire = $_POST;
$nouveauCommentaire['date'] = date('d/m/Y H:i');
array_unshift($_SESSION['articles'][$clef]['commentaires'], $nouveauCommentaire);

$page->ajouterAlerte('Succès', 'Commentaire posté avec succès.');


$page->rediriger('details.php?clef=' . $clef);
