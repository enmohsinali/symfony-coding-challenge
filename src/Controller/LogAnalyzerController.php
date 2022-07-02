<?php

namespace App\Controller;

use App\Entity\Log;
use App\Entity\LogParser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class LogAnalyzerController extends AbstractController
{
    #[Route('/count', name: 'app_log_analyzer', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        // $doctrine = $this->getDoctrine()->getManager();
        $logs = $doctrine->getRepository(Log::class)->findAll();
        $LogParser = $doctrine->getRepository(LogParser::class)->findOneBy(['id'=>1]);
        // $entityAsArray = $this->serializer->normalize($logs, null);
        var_dump($LogParser);
        return $this->json($LogParser);
    }
}
