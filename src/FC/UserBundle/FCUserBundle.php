<?php

namespace FC\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FCUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
