<?php

require_once __DIR__ . '/Page.php';
$page = new Page();

$clef = $_GET['clef'];

unset($_SESSION['articles'][$clef]);
$page->ajouterAlerte('Succès', 'Article supprimé avec succès.');

$page->rediriger('index.php');