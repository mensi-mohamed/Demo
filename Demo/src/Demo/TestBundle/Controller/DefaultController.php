<?php

namespace Demo\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

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

}
