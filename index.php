<?php

require_once __DIR__ . '/Page.php';
$page = new Page();

$page->sAfficher('home.html.twig', [
    'articles' => $_SESSION['articles']
]);
