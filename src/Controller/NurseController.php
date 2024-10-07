<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NurseController extends AbstractController
{
    #[Route('/nurse/login', name: 'app_nurse')]
    public function index():Response{
    {
        $nombre = "Alex";
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
