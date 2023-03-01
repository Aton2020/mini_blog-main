<?php
require_once __DIR__ . '/vendor/autoload.php';

class Page {
    private $twig;

    public function __construct() {
        $twig = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
        $this->twig = new \Twig\Environment($twig);

        session_start();

        if (empty($_SESSION['articles']))
            $_SESSION['articles'] = array();

        if (empty($_SESSION['alertes']))
            $_SESSION['alertes'] = array();
    }

    public function sAfficher(string $nomDuTemplate, array $arguments = []) {
        $arguments['alertes'] = $_SESSION['alertes'];
        echo $this->twig->render($nomDuTemplate, $arguments);

        $_SESSION['alertes'] = [];
    }

    public function rediriger(string $autre_page) {
        header('location: ' . $autre_page);
    }

    public function ajouterAlerte(string $nom, string $message) {
        $_SESSION['alertes'][$nom] = $message;
    }
}
