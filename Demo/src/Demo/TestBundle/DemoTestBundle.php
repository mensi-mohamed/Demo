<?php

namespace Demo\TestBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DemoTestBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
