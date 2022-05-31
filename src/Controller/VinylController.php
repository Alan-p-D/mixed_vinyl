<?php

namespace App\Controller;

use function Symfony\Component\String\u;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        ['song' => 'Anything Goes', 'artist' => 'Harry Connick Jr'],
        ['song' => 'Step on my old Size nines', 'artist' => 'Stereophonics'],
        ['song' => 'Star', 'artist' => 'Brian Adams'],
        ['song' => 'Woke up this morning', 'artist' => 'Nazarath'],
    ];

    return $this->render('vinyl/homepage.html.twig', [
        'title' => 'Rock & Jazz smooth',
        'tracks' => $tracks,
    ]);
}
#[Route('/browse/{slug}')]
public function browse(string $slug = null): Response
    {
    
    $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
    return $this->render('vinyl/browse.html.twig', [
        'genre' => $genre,
    ]);
}
}
