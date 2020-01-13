<?php
    namespace App\Controller\Admin;
    use App\Form\UserType;
    use App\Repository\UserRepository;
    use App\Entity\User;
    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Flex\Response;
    class AdminUserController extends AbstractController{
        /**
         * @var UserRepository
         */
        private $repository;
        /**
         * @var ObjectManager
         */
        private $em;
        public function __construct(UserRepository $userRepository, ObjectManager $em)
        {
            $this->repository = $userRepository;
            $this->em = $em;
        }
        /**
         * @Route("/admin/user", name="admin.userProperty.index")
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public  function index()
        {
            $userProperties = $this->repository->findAll();
            return $this->render('admin/user.html.twig', compact('userProperties'));
        }
        /**
         * @Route("/admin/user/newUser", name = "admin.userProperty.new")
         */
        public function new(Request $request)
        {
            $user = new User();
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $this->em->persist($user);
                $this->em->flush();
                $this->addFlash('success', 'Creer avec succes!');
                return $this->redirectToRoute('admin.userProperty.index');
            }
            return $this->render('admin/userNew.html.twig', [
                'user' => $user,
                'form' => $form->createView()
            ]);
        }
        /**
         * @Route("/admin/user/{id}", name="admin.userProperty.edit", methods="GET|POST")
         * @param User $user
         * @param Request $request
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function edit(User $user, Request $request)
        {
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $this->em->flush();
                $this->addFlash('success', 'Modifier avec succes!');
                return $this->redirectToRoute('admin.userProperty.index');
            }
            return $this->render('admin/userEdit.html.twig', [
                'user' => $user,
                'form' => $form->createView()
            ]);
        }
        /**
         * @Route("/admin/user/{id}", name="admin.userProperty.delete", methods="DELETE")
         * @param User $user
         * @return \Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function delete(User $user, Request $request)
        {
            if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->get('_token'))){
                $this->em->remove($user);
                $this->em->flush();
                $this->addFlash('success', 'Supprimer avec succes!');
            }
            return $this->redirectToRoute('admin.userProperty.index');
        }
    }