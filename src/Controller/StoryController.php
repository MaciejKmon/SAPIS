<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Story;

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

        return new JsonResponse($stories);
    }
}
