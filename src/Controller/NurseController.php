<?php

namespace App\Controller;

use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class NurseController extends AbstractController
{
    private function allNurses(): array
    {
        $jsonData = '[{"user":"Emmeline","password":"iM5}~tp/"},
        {"user":"Susana","password":"wP7@bQp@|S~HlhI"},
        {"user":"Aharon","password":"zE4)U\'ptR"},
        {"user":"Ardath","password":"eE3/}$}Fh5"},
        {"user":"Cyrill","password":"pQ7?\'1+$<l"}]';
        
        return json_decode($jsonData, true); // Corrección aquí
    }
    
    #[Route(path: '/index', name: 'app_nurse_getAll')]
    public function getAll(): JsonResponse
    {
        $nurse_list = $this->allNurses();
        return $this->json($nurse_list);
    }
    

    #[Route('/nurse/login', name: 'app_nurse_login')]
    public function nurseLogin(Request $request): JsonResponse
    { {
            $name = $request->request->get('nombre');
            $pass = $request->request->get( 'pass');
            $correcto = false;
            $nurses = $this->allNurses();

            if (isset($name) && isset($pass)) {
                for ($i = 0; $i < count($nurses); $i++) {
                    $NurseName = $nurses[$i]["user"];
                    $NursePass = $nurses[$i]["password"];
                    if ($name == $NurseName && $pass == $NursePass) {
                        $correcto = true;
                        break;
                    }
                }
                return new JsonResponse(["login" => $correcto], Response::HTTP_OK);
            } else {
                return new JsonResponse(["login" => "Credential Missing"], Response::HTTP_OK);
            }

            
        }
    }
    #[Route('/name/{name}', name: 'nurse_list_name', methods: ['GET'])]
    public function findByName(string $name): JsonResponse
    {
        $nurses = $this->allNurses();
        foreach ($nurses as $nurse) {
            if ($nurse['user'] === $name) {
                $return_nurses[] = ['user' => $nurse['user'], 'password' => $nurse['password']];
                return new JsonResponse($return_nurses, JsonResponse::HTTP_OK);
            }
        }


        return new JsonResponse(['error' => 'Nurse not found'], JsonResponse::HTTP_NOT_FOUND);
    }
}
