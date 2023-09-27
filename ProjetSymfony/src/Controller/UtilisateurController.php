<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


#[Route('/utilisateur')]
class UtilisateurController extends AbstractController
{
    #[Route('/edit', name: 'app_utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UtilisateurRepository $utilisateurRepository, UserPasswordHasherInterface $passwordHasher, Security $security): Response
    {
        $utilisateur = $security->getUser();

        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('password')->getData()) {
                $hashedPassword = $passwordHasher->hashPassword($utilisateur, $form->get('password')->getData());
                $utilisateur->setPassword($hashedPassword);
            }
            $utilisateurRepository->save($utilisateur, true);

            return $this->redirectToRoute('app_profil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateur_delete', methods: ['POST'])]
    public function delete(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository, TokenStorageInterface $tokenStorage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $utilisateur->getId(), $request->request->get('_token'))) {
            // Déconnecte l'utilisateur avant de le supprimer
            $tokenStorage->setToken(null);

            $utilisateurRepository->remove($utilisateur, true);
        }

        return $this->redirectToRoute('app_default', [], Response::HTTP_SEE_OTHER);
    }
}
