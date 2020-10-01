<?php
namespace Application\Form\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Application\Form\Manager\ErrorDecoratorManager;
use Application\Service\DynamicFormsTranslator;


class ErrorDecoratorManagerFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) : ErrorDecoratorManager {

        return new ErrorDecoratorManager('HTML5', $container->get(DynamicFormsTranslator::class));
    }
}
