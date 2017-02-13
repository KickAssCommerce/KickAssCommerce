<?php

namespace KickAss\Commerce;

use Go\Core\AspectKernel;
use Go\Core\AspectContainer;

/**
 * Application Aspect Kernel
 */
class ApplicationAspectKernel extends AspectKernel
{

    /**
     * Configure an AspectContainer with advisors, aspects and pointcuts
     *
     * @param AspectContainer $container
     * @return void
     */
    public function configureAop(AspectContainer $container)
    {
        $container->registerAspect(new \KickAss\Commerce\Product\Cache\Product());
    }
}