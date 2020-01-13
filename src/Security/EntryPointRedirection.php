<?php

    namespace App\Security;

    use Symfony\Component\HttpFoundation\RedirectResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\RouterInterface;
    use Symfony\Component\Security\Core\Exception\AuthenticationException;
    use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

    class EntryPointRedirection implements AuthenticationEntryPointInterface{

        private $router;

        public function __construct(RouterInterface $router)
        {
            $this->router = $router;
        }

        /**
         * Returns a response that directs the user to authenticate.
         *
         * This is called when an anonymous request accesses a resource that
         * requires authentication. The job of this method is to return some
         * response that "helps" the user start into the authentication process.
         *
         * Examples:
         *
         * - For a form login, you might redirect to the login page
         *
         *     return new RedirectResponse('/login');
         *
         * - For an API token authentication system, you return a 401 response
         *
         *     return new Response('Auth header required', 401);
         *
         * @param Request $request The request that resulted in an AuthenticationException
         * @param AuthenticationException $authException The exception that started the authentication process
         *
         * @return Response
         */
        public function start(Request $request, AuthenticationException $authException = null)
        {
            return new RedirectResponse($this->router->generate('app_homepage'));
        }
    }