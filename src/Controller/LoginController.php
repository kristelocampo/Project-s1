<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        //check the error
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastPseudo = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $lastPseudo,
            'error'         => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout()
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');

        $this->redirectToRoute('app_home');
    }

    #[Route('/profile/{id}', name: 'app_user', requirements: ['id'=> '\d+'])]
    public function accessUser(User $user)
    {
        $this->denyAccessUnlessGranted('view', $user);

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController'
        ]);
    }
}
