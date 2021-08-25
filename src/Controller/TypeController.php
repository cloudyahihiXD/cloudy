<?php

namespace App\Controller;

use App\Entity\Type;
use App\Form\TypeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="typelist")
     */
    public function listType() 
    {
        $types = $this->getDoctrine()->getRepository(Type::class)->findAll();
        return $this->render(
            'type/index.html.twig', 
            [
            "types" => $types,
            ]
        );
    }

    /**
     * @Route("/type/delete/{id}", name="typedelete")
     */
    public function deletetype($id) {
        $types = $this->getDoctrine()->getRepository(Type::class)->find($id);

        if ($types == null) {
            $this->addFlash("Error","Invalid type ID");
            return $this->redirectToRoute("typelist");
        }

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($types);
        $manager->flush();

        $this->addFlash("Success","Delete type succeed !");
        return $this->redirectToRoute('typelist');
    }

    /**
     * @Route("/type/create", name="typecreate")
     */
    public function createType(Request $request) {
        $types = new Type();
        $form = $this->createForm(TypeFormType::class,$types);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()
                            ->getManager();
            $manager->persist($types);
            $manager->flush();
            $this->addFlash("Success","Create type successfully !");
            return $this->redirectToRoute("typelist");
        }

        return $this->render(
            "type/create.html.twig",
            [
                "form" => $form->createView()
            ]
        );
    }

    /**
     * @Route("/type/update/{id}",  name="typeupdate")
     */
    public function updateType(Request $request, $id) {
        $types = $this->getDoctrine()->getRepository(Type::class)->find($id);
        $form = $this->createForm(TypeFormType::class,$types);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()
                            ->getManager();
            $manager->persist($types);
            $manager->flush();
            $this->addFlash("Success","Update type successfully !");
            return $this->redirectToRoute("typelist");
        }

        return $this->render(
            "type/update.html.twig",
            [
                "form" => $form->createView()
            ]
        );
    }
}
