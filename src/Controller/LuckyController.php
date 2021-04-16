<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController
{

    /**
     * @Route("/lucky_number", name="app_lucky_number")
     */
    public function number(Request $request): Response
    {
        $name = $request->query->get('name');
        $number = random_int(0, 100);

        $user = [
            'name' => 'John Doe',
            'place' => 'Lens',
        ];




        dump($user);
        return new Response(

            "<html><body><p>Lucky number: $number</p><p>Name: $name</p></body></html>"
        );
    }
}
