<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Compopnent\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Story;
use App\Services\PaginationService;

class StoryController extends AbstractController
{
    const DEFAULT_PAGINATION = 50;
    /**
     * @Route("/stories", name="story_all")
     */
    public function getAllAction()
    {
        $pagination = self::DEFAULT_PAGINATION;
        $stories = $this->getDoctrine()->getRepository(Story::class)->findAll([], null, $pagination);

        if ($this->getDoctrine()->getRepository(Story::class)->count())

        return new JsonResponse($stories);
    }

    /**
     * @Route("stories/{id}", name="story");
     */
    public function getAction(Request $request, $id)
    {
        $story = $this->getDoctrine()->getRepository(Story::class)->find($id);

        if (!$story) {
            return new JsonResponse('not found', Response::HTTP_NOT_FOUND);
        }
    }
}
