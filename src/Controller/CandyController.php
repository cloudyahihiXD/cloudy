<?php


// use Symfony\Component\BrowserKit\Request;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\HttpFoundation\Response;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
// use Symfony\Component\HttpFoundation\File\Exception\FileException;

namespace App\Controller;
use App\Entity\Candy;
use App\Form\CandyFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\BrowserKit\AbstractBrowser;
use Symfony\Component\HttpFoundation\Request;

class CandyController extends AbstractController
{
  /**
     * @Route("/candy", name="candylist")
     */
    public function listCandy() 
    {
        $candies = $this->getDoctrine()->getRepository(Candy::class)->findAll();
        return $this->render(
            'candy/index.html.twig', 
            [
            'candies' => $candies,
            ]
        );
    }

    /**
     * @Route("/candy/delete/{id}", name="candydelete")
     */
    public function deletecandy($id) {
        $candy = $this->getDoctrine()->getRepository(Candy::class)->find($id);

        if ($candy == null) {
            $this->addFlash("Error","Invalid candy ID");
            return $this->redirectToRoute("candylist");
        }

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($candy);
        $manager->flush();

        $this->addFlash("Success","Delete candy succeed !");
        return $this->redirectToRoute('candylist');
    }

    /**
     * @Route("/candy/create", methods={"GET"}, name="candycreate")
     */
 
    public function createcandy(Request $request) {
        $candy = new Candy();
        $form = $this->createForm(CandyFormType::class,$candy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()
                            ->getManager();
            $manager->persist($candy);
            $manager->flush();
            $this->addFlash("Success","Create candy successfully !");
            return $this->redirectToRoute("candylist");
        }

        return $this->render(
            "candy/create.html.twig",
            [
                "form" => $form->createView()
            ]
        );
   }

    /**
     * @Route("/candy/update/{id}",  name="candyupdate")
     */
    public function updatecandy(Request $request, $id) {
        $candy = $this->getDoctrine()
                                ->getRepository(Candy::class)
                                ->find($id);
        $form = $this->createForm(CandyFormType::class,$candy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()
                            ->getManager();
            $manager->persist($candy);
            $manager->flush();
            $this->addFlash("Success","Update candy successfully !");
            return $this->redirectToRoute("candylist");
        }

        return $this->render(
            "candy/update.html.twig",
            [
                "form" => $form->createView()
            ]
        );
   }
}