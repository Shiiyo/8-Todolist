<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/users/list", name="user_list")
     */
    public function list(UserRepository $repo)
    {
        return $this->render('user/list.html.twig', ['users' => $repo->findAll()]);
    }

    /**
     * @Route("/users/create", name="user_create")
     */
    public function create(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, UserRepository $userRepository)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($userRepository->findOneByUsername($user->getUsername()) == false){
                $hash = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($hash);

                $manager->persist($user);
                $manager->flush();

                $this->addFlash('success', "L'utilisateur a bien été ajouté.");

                return $this->redirectToRoute('user_list');                
            }
            else{
                $this->addFlash('error', "Ce pseudo utilisateur est déjà pris");
                return $this->redirectToRoute('user_create');
            }

        }

        return $this->render('user/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/users/{id}/edit", name="user_edit")
     */
    public function edit(User $user, Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, UserRepository $userRepository)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userInDB = $userRepository->findOneByUsername($user->getUsername());
            if ( $userInDB == false || $userInDB->getId() == $user->getId()){
                                $hash = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($hash);

                $manager->flush();

                $this->addFlash('success', "L'utilisateur a bien été modifié");

                return $this->redirectToRoute('user_list');
            }
            $this->addFlash('error', "Ce pseudo utilisateur est déjà pris");
            return $this->render('user/edit.html.twig', ['form' => $form->createView(), 'user' => $user]);
        }

        return $this->render('user/edit.html.twig', ['form' => $form->createView(), 'user' => $user]);
    }
}
