<?php

namespace Demo\TestBundle\Controller;

use Demo\TestBundle\Entity\Ville;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        $user = $this->getUser();
        if ($user) {
             $ville = new Ville();
        $form = $this->createForm('Demo\TestBundle\Form\VilleType', $ville);      
       $form->handleRequest($request);
        if ($form->isSubmitted()) {
            var_dump('tets'); die;
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
        return $this->render('DemoTestBundle:Default:index.html.twig',array(
            'ville' => $ville,
            'form' => $form->createView(),
        ));
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

    /**
     * @param Request $request
     * @Template()
     */
    public function newAction(Request $request) {
        $ville = new Ville();
        $form = $this->createForm('Demo\TestBundle\Form\VilleType', $ville);      
        //$form = $this->createFormBuilder($ville);
       // $form = new VilleType($ville);
       

        if ($form->isSubmitted() && $form->isValid()) {
          
           
            
        }
        return $this->render('DemoTestBundle:Default:index.html.twig',array(
            'ville' => $ville,
            'form' => $form->createView(),
        ));
    }

}
