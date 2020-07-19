<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/{pseudo}", name="profile", requirements={"id"="\d+"})
     */
    public function index(Utilisateur $utilisateur, $id)
    {
        $utilisateur = $this->getUser();
        $id = $utilisateur->getId();

        return $this->render('profile/index.html.twig', [
            'id' => $id,
        ]);
    }
}
