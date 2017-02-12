<?php

namespace Example\Project\Product\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\FieldAccess;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Pointcut;

/**
 * Monitor aspect
 */
class ExampleProductAspect implements Aspect
{

    /**
     * Method is called before KickAss\Commerce\Product\Map\Product::setSku
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public KickAss\Commerce\Product\Map\Product->setSku(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $arguments = $invocation->getArguments();
        $invocation->setArguments([
            $arguments[0] . '- interception'
        ]);
    }
}