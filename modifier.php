<?php
require_once './Page.php';
$page = new Page();

$clef = $_GET['clef'];
$ancienArticle = $_SESSION['articles'][$clef];


if (empty($_POST)) {
    // Si le $_POST est vide, ça veut dire qu'on m'a rien envoyé
    // Càd que l'utilisateur n'est jamais passé par le formulaire
    $page->sAfficher('formulaire_modifier.html.twig', [
        'article' => $ancienArticle,
        'clef' => $clef
    ]);
} else {
    // Le POST est pas vide.
    // Donc je reçois le titre et le contenu.
    // Donc je peux l'ajouter à ma session


    $articleModifie = $_POST;
    $articleModifie['date'] = $ancienArticle['date'];
    $articleModifie['commentaires'] = $ancienArticle['commentaires'];
    $_SESSION['articles'][$clef] = $articleModifie;

    $page->ajouterAlerte('Succès', 'Article modifié avec succès.');

    $page->rediriger('index.php');
}
