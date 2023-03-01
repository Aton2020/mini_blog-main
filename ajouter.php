<?php
require_once './Page.php';
$page = new Page();

if (empty($_POST)) {
    // Si le $_POST est vide, ça veut dire qu'on m'a rien envoyé
    // Càd que l'utilisateur n'est jamais passé par le formulaire
    $page->sAfficher('formulaire_ajouter.html.twig');
} else {
    // Le POST est pas vide.
    // Donc je reçois le titre et le contenu.
    // Donc je peux l'ajouter à ma session

    $nouvelArticle = $_POST;
    $nouvelArticle['date'] = date('d/m/Y H:i');
    $nouvelArticle['commentaires'] = [];
    $_SESSION['articles'][] = $nouvelArticle;
    $page->ajouterAlerte('Succès', 'Article créé avec succès.');

    $page->rediriger('index.php');
}