<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemperatureController extends AbstractController
{
    #[Route('/temperature', name: 'app_temperature')]
    public function index(Request $req): Response
    {
        $temp = $req->query->get('temperature');

        if (!is_numeric($temp)) {
            return new Response("Error: Temperature must be a number", 400);

        }

        $fahrenheit = ($temp * 9 / 5) + 32;

        return new Response("Temperature in fahrenheit: " . $fahrenheit);
    }
}
