<?php
    namespace App\Controller;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    class HomepageController extends AbstractController
    {
        /**
         * @Route("/", name="app_homepage")
         */
        public function homepage()
        {
            return $this->render('homepage.html.twig');
        }
    }