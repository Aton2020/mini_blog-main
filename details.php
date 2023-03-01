<?php

require_once './Page.php';
$page = new Page();

$clef = $_GET['clef'];
$page->sAfficher('details.html.twig', [
    'article' => $_SESSION['articles'][$clef],
    'clef' => $clef,
]);
