<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\ResponseListener;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController

{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Get down on it', 'artist' => 'Kool and the Gang'],
            ['song' => 'Loving you', 'artist' => 'Elvis Presley'],
            ['song' => 'Hey Laura', 'artist' => 'Gregory Porter'],
            ['song' => 'Mr Holden', 'artist' => 'Gregory Porter'],
            ['song' => 'Raining in my Heart', 'artist' => 'Buddy Holly'],
            ['song' => 'Make Someone Happy', 'artist' => 'Jeff Goldblum'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Rock & Jazz smooth',
            'tracks' => $tracks,
        ]);
    }
    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: ' .u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        return new Response($title);
        }
    }
}