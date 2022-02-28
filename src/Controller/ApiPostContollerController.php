<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\PokemonRepository;
use App\Entity\Pokemon;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiPostContollerController extends AbstractController
{
    #[Route('/api/post/contoller', name: 'app_api_post_contoller')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiPostContollerController.php',
        ]);
    }

    #[Route('/api/pokemon/{nom}', name: 'api_pokemon_nom, methods:["GET"]')]
    public function lirePokemonParNom(PokemonRepository $pokemonRepository, SerializerInterface $serializer, string $nom): Response
    {
        $pokemons = $pokemonRepository->findOneBy(['nom'=>$nom]);


        $json = $serializer->serialize($pokemons,'json', ['groups' => 'category:read']);

        $response = new JsonResponse($json, 200, [], true);

        return $response;
    }

    #[Route('/api/pokemon', name: 'api_pokemon, methods:["GET"]')]
    public function lirePokemon(PokemonRepository $pokemonRepository, SerializerInterface $serializer): Response
    {
        $pokemons = $pokemonRepository->findAll();

        $json = $serializer->serialize($pokemons,'json', ['groups' => 'category:read']);

        $response = new JsonResponse($json, 200, [], true);

        return $response;
    }
}
