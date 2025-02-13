<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Model\SearchPointsFormModel;
use App\Form\SearchPointsType;
use App\Service\Api\InpostApiClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchPointController extends AbstractController
{
    public function __construct(private readonly InpostApiClientInterface $apiClient) {}

    #[Route('/search', name: 'search_point', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function search(Request $request): Response
    {
        $model = new SearchPointsFormModel();
        $form = $this->createForm(SearchPointsType::class, $model);
        $form->handleRequest($request);
        $points = [];
        $count = 0;

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $response = $this->apiClient->getPoints($model->getCity());
                $points = $response->getItems();
                $count = $response->getCount();
            } catch (\Exception $e) {
                $this->addFlash('error', 'Wystąpił błąd podczas pobierania punktów: ' . $e->getMessage());
            }
        }

        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'points' => $points,
            'count' => $count,
        ]);
    }
}
