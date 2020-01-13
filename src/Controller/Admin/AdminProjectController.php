<?php
    namespace App\Controller\Admin;
    use App\Form\ProjectType;
    use App\Repository\ProjectRepository;
    use App\Entity\Project;
    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Flex\Response;
    class AdminProjectController extends AbstractController{
        /**
         * @var ProjectRepository
         */
        private $repository;
        /**
         * @var ObjectManager
         */
        private $em;
        public function __construct(ProjectRepository $projectRepository, ObjectManager $em)
        {
            $this->repository = $projectRepository;
            $this->em = $em;
        }
        /**
         * @Route("/admin/project", name="admin.project.index")
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public  function index()
        {
            $projects = $this->repository->findAll();
            return $this->render('admin/project.html.twig', compact('projects'));
        }
        /**
         * @Route("/admin/project/newProject", name = "admin.project.new")
         */
        public function new(Request $request)
        {
            $project = new Project();
            $form = $this->createForm(ProjectType::class, $project);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $this->em->persist($project);
                $this->em->flush();
                $this->addFlash('success', 'Creer avec succes!');
                return $this->redirectToRoute('admin.project.index');
            }
            return $this->render('admin/projectNew.html.twig', [
                'project' => $project,
                'form' => $form->createView()
            ]);
        }
        /**
         * @Route("/admin/project/{id}", name="admin.project.edit", methods="GET|POST")
         * @param Project $project
         * @param Request $request
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function edit(Project $project, Request $request)
        {
            $form = $this->createForm(ProjectType::class, $project);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $this->em->flush();
                $this->addFlash('success', 'Modifier avec succes!');
                return $this->redirectToRoute('admin.project.index');
            }
            return $this->render('admin/projectEdit.html.twig', [
                'project' => $project,
                'form' => $form->createView()
            ]);
        }
        /**
         * @Route("/admin/project/{id}", name="admin.project.delete", methods="DELETE")
         * @param Project $project
         * @return \Symfony\Component\HttpFoundation\RedirectResponse
         */
        public function delete(Project $project, Request $request)
        {
            if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->get('_token'))){
                $this->em->remove($project);
                $this->em->flush();
                $this->addFlash('success', 'Supprimer avec succes!');
            }
            return $this->redirectToRoute('admin.project.index');
        }
    }