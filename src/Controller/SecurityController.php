<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

    class SecurityController extends AbstractController
    {
        /**
         * @Route("/redCat", name="app_redCat")
         */
        public function login(AuthenticationUtils $authenticationUtils)
        {

            $error = $authenticationUtils->getLastAuthenticationError();

            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render('security/redCat.html.twig', [
                'last_username' => $lastUsername,
                'error'         => $error,
            ]);
        }

        /**
         * @Route("/logout", name="app_logout")
         */
        public function logout()
        {
            throw new \Exception('Will be intercepted before getting here');
        }
    }
