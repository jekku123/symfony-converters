<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemperatureController extends AbstractController
{
    #[Route('/celsius-to-fahrenheit')]
    public function celsiusToFahrenheit(Request $req): Response
    {
        $temp = $req->query->get('temperature');

        if (!is_numeric($temp)) {
            return new Response("Error: Temperature must be a number", 400);

        }

        $fahrenheit = ($temp * 9 / 5) + 32;

        return new Response("Temperature in fahrenheit: " . $fahrenheit);
    }

    #[Route('/fahrenheit-to-celsius')]
    public function fahrenheitToCelsius(Request $req): Response
    {
        $temp = $req->query->get('temperature');

        if (!is_numeric($temp)) {
            return new Response("Error: Temperature must be a number", 400);

        }

        $celsius = ($temp - 32) * 5 / 9;

        return new Response("Temperature in celsius: " . $celsius);
    }
}
