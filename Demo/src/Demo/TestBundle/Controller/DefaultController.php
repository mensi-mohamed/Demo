<?php

namespace Demo\TestBundle\Controller;

use Demo\TestBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction() {
        $user = $this->getUser();
        if ($user) {
            return $this->render('DemoTestBundle:Default:index.html.twig');
        }
        return new RedirectResponse($this->generateUrl('fos_user_security_login'));
    }

    public function homeAction() {
        return new RedirectResponse($this->generateUrl('fos_user_security_login'));
    }

    public function weatherAction() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q=paris&appid=ed56a35e6f32fc8b4608a6a568f3d9f4');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $data = json_decode($output, true);
        curl_close($ch);

        return $this->render('DemoTestBundle:Default:index.html.twig', array(
                    'data' => $data,
        ));
    }

    public function newAction(Request $request) {
        $ville = new Ville();
        $ville->setVille('Paris');
              // $form = $this->createFormBuilder($ville);
                //$form->handleRequest($request);

      //  if ($form->isSubmitted() && $form->isValid()) {
        //    var_dump('test');
          //  die;
        //}


       $form = $this->createFormBuilder($ville)
                ->add('ville', 'text')
                ->add('save', 'submit', array('label' => 'check weather of your town'))
                ->getForm();

        return $this->render('DemoTestBundle:Default:index.html.twig', array(
                    'form' => $form->createView(),
        ));
        
         
    }

}
