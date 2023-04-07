<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Annonce;
use App\Entity\Bank;
use App\Entity\Commentary;
use App\Entity\User;
use App\Form\AddressFormType;
use App\Form\AnnonceFormType;
use App\Form\BankFormType;
use App\Form\CommentaryFormType;
use App\Form\RestaurantType;
use App\Repository\AddressRepository;
use App\Repository\AnnonceRepository;
use App\Repository\BankRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    private EntityManagerInterface $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(UserRepository $userRepository): Response
    {
        $user = $userRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $user
        ]);
    }

    #[Route('/address', name: 'app_address')]
    public function showAddress(AddressRepository $addressRepository): Response
    {
        $address = $addressRepository->findAll();
        $user_id = $this->getUser();
        return $this->render('admin/address.html.twig', [
            'user_id' => $user_id,
            'address' => $address

        ]);
    }
    #[Route('address/addAddress' , name: 'app_add_address')]
    public function addAddress(Request $request) : Response
    {
        $address = new Address();
        $form = $this->createForm(AddressFormType::class, $address);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($address);
            $this->em->flush();
            return $this->redirectToRoute('app_address');
        }

        return $this->render('admin/addAddress.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('address/update/{address}', name: 'app_update_address')]
    public function update(Address $address, Request $request): Response
    {
        $form = $this->createForm(AddressFormType::class, $address);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($address);
            $this->em->flush();
            return $this->redirectToRoute('app_address');
        }
        return $this->render('admin/addAddress.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('address/delete/{address}', name: 'app_delete_address')]
    public function deleteAddress(Address $address, Request $request) : Response
    {
        $this->em->remove($address);
        $this->em->flush();

        return $this->redirectToRoute("app_address");

    }

    #[Route('bank/' , name: 'app_bank')]
    public function showBank(BankRepository $bankRepository, UserRepository $userRepository): Response
    {
        $bank = $bankRepository->findAll();
        $user_id = $userRepository->find('user_id');
        return $this->render('admin/bank.html.twig', [
            'user_id' => $user_id,
            'bank' => $bank

        ]);
    }
    #[Route('bank/addBank' , name: 'app_add_bank')]
    public function addBank(Request $request) : Response
    {
        $bank = new Bank();
        $form = $this->createForm(BankFormType::class, $bank);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($bank);
            $this->em->flush();
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/addBank.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('annonce/' , name: 'app_annonce')]
    public function showAnnonce(AnnonceRepository $annonceRepository): Response
    {
        $annonces = $annonceRepository->findAll();

        return $this->render('admin/annonceId.html.twig', [
            'annonces' => $annonces
        ]);
    }

    #[Route('address/addAnnonce' , name: 'app_add_annonce')]
    public function addAnnonce(Request $request) : Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceFormType::class, $annonce);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($annonce);
            $this->em->flush();
            return $this->redirectToRoute('app_annonce');
        }

        return $this->render('admin/addAnnonce.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('annonce/update/{annonce}', name: 'app_update_annonce')]
    public function updateAnnonce(Annonce $annonce, Request $request): Response
    {
        $form = $this->createForm(AnnonceFormType::class, $annonce);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($annonce);
            $this->em->flush();
            return $this->redirectToRoute('app_annonce');
        }
        return $this->render('admin/addAnnonce.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('annonce/delete/{annonce}', name: 'app_delete_annonce')]
    public function deleteAnnonce(Annonce $annonce, Request $request) : Response
    {
        $this->em->remove($annonce);
        $this->em->flush();

        return $this->redirectToRoute("app_annonce");

    }

    #[Route('admin/comment/addComment' , name: 'app_add_comment')]
    public function addComment(Request $request, User $user) : Response
    {
        $comment = new Commentary();
        $form = $this->createForm(CommentaryFormType::class, $comment);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($comment);
            $this->em->flush();
            return $this->redirectToRoute('app_annonce');
        }

        $user_id = $user->getId();
        return $this->render('admin/addComment.html.twig',[
            'user_id_id' => $user_id,
            'form' => $form->createView()
        ]);
    }





}
