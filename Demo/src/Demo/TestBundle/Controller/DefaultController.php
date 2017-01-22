<?php

namespace Demo\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use GuzzleHttp\Client;

class DefaultController extends Controller {

    public function indexAction() {
        $user = $this->getUser();
        if ($user) {
            //$ch = curl_init();
            //curl_setopt($ch, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q=paris&appid=ed56a35e6f32fc8b4608a6a568f3d9f4');
            //$result = curl_exec($ch);
            return $this->render('DemoTestBundle:Default:index.html.twig');
        }
        return new RedirectResponse($this->generateUrl('fos_user_security_login'));
    }

    public function homeAction() {
        return new RedirectResponse($this->generateUrl('fos_user_security_login'));
    }

}
