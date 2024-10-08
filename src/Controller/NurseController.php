<?php

namespace App\Controller;

use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

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

    #[Route('/nurse/login', name: 'app_nurse')]
    public function index():Response{
    {
        $nombre = "Antonio";
        $pass = "12345678";
        $correcto = false;
        
    if(isset($_POST["nombre"]) && isset($_POST["pass"])){
        if($_POST["nombre"] == $nombre && $pass == $_POST["pass"]){
            $correcto = true;
            echo "Credenciales correctos";
        }else{
            echo "Credenciales Incorrectos";
        }
    }else{
        echo "No se han proporcionado datos suficientes";
    }
        
        return new Response($correcto, Response::HTTP_OK);
    }
}
}
//Alex Alabau