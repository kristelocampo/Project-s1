<?php

namespace App\Controller;

use App\Entity\Address;
use App\Form\AddressFormType;
use App\Form\RestaurantType;
use App\Repository\AddressRepository;
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
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
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



}
