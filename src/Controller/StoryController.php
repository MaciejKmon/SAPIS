<?php
namespace App\Controller;

use App\Form\StoryType;
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
     * @Route(
     *     "/stories",
     *     name="story_all",
     *     methods={"GET"}
     * )
     */
    public function getAllAction()
    {
        $pagination = self::DEFAULT_PAGINATION;
        $stories = $this->getDoctrine()->getRepository(Story::class)->findAll([], null, $pagination);

        if ($this->getDoctrine()->getRepository(Story::class)->count())

        return new JsonResponse($stories);
    }

    /**
     * @Route(
     *     "/stories/{id}",
     *     name="story",
     *     methods={"GET"}
     * );
     */
    public function getAction(Request $request, $id)
    {
        $story = $this->getDoctrine()->getRepository(Story::class)->find($id);

        if (!$story) {
            return new JsonResponse('not found', Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($story);
    }

    /**
     * @Route(
     *     "/stories",
     *     name="story_new",
     *     methods={"POST"}
     * )
     */
    public function createNewAction(Request $request)
    {
        $form = $this->createForm(StoryType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
        }

    }

    /**
     * @Route(
     *     "/stories/{id}",
     *     name="story_update",
     *     methods={"PATCH"}
     * )
     */
    public function updateAction(Request $request)
    {

    }

    /**
     * @Route(
     *     "/stories/{id}",
     *     name="story_update",
     *     methods={"DELETE"}
     * )
     */
    public function deleteAction(Request $request)
    {

    }
}
