<?php
    namespace App\Controller\Admin;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

    /**
     * @IsGranted("ROLE_ADMIN")
     */
    class AdminController extends AbstractController
    {
        /**
         * @Route("/admin", name="adminHomepage")
         */
        public function adminHomepage()
        {
            return $this->render('admin/admin.html.twig');
        }
    }