<?php
    namespace App\Controller;
    use App\Entity\Project;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Serializer\SerializerInterface;
    class ProjectController extends AbstractController
    {
        /**
         * @Route("/projects", name="projects")
         */
        public function project(SerializerInterface $serializer)
        {
            $project=$this->getDoctrine()->getRepository(Project::class)->findAll();
            $jsonContent=$serializer->serialize($project,'json');
            return new JsonResponse($jsonContent, 200, [],true);
        }
    }