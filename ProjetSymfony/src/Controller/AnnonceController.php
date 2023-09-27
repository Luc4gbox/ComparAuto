<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


#[Route('/')]
class AnnonceController extends AbstractController
{
    #[Route('/new', name: 'app_annonce_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AnnonceRepository $annonceRepository, UserInterface $user): Response
    {
        $annonce = new Annonce();

        // Associez l'utilisateur connecté à l'annonce
        $annonce->setUtilisateur($user);

        // Définissez la date de création
        $annonce->setCreatedAt(new \DateTimeImmutable());

        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('annonces_images_directory'),
                        $newFilename
                    );

                    $annonce->setImage($newFilename);
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }

            $annonceRepository->save($annonce, true);

            return $this->redirectToRoute('app_annonce', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('annonce/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }

    #[Route('/une-annonce/{id}', name: 'app_annonce_show')]
    public function show(Annonce $annonce): Response
    {
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    #[Route('/une-annonce/{id}/edit', name: 'app_annonce_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Annonce $annonce, AnnonceRepository $annonceRepository): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('annonces_images_directory'),
                        $newFilename
                    );

                    $annonce->setImage($newFilename);
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }

            $annonceRepository->save($annonce);

            return $this->redirectToRoute('app_annonce_show', ['id' => $annonce->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('annonce/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }
    
    #[Route('/{id}/delete', name: 'app_annonce_delete', methods: ['POST'])]
    public function delete(Request $request, Annonce $annonce, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            $entityManager->remove($annonce);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_annonce', [], Response::HTTP_SEE_OTHER);
    }


}
