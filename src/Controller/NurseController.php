<?php

namespace App\Controller;

use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NurseController extends AbstractController
{

    private function allNurses(): array
    {
        $jsonData = '[{"user":"Emmeline","password":"iM5}~tp/"},
        {"user":"Susana","password":"wP7@bQp@|S~HlhI"},
        {"user":"Aharon","password":"zE4)U\'ptR"},
        {"user":"Ardath","password":"eE3/}$}Fh5"},
        {"user":"Cyrill","password":"pQ7?\'1+$<l"}]';
        return $data = json_decode($jsonData, associative: true);
    }

    #[Route(path: '/index', name: 'app_nurse')]
    public function getAll(): JsonResponse
    {

        $credenciales = $this->allNurses();


        return $this->json($credenciales);
    }
}
