<?php
namespace Application\Form\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Application\Form\Manager\ElementManager;

/**
 *
 * @author G Brabyn
 */
class ElementManagerFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) : ElementManager {
        $zendEscaper = $container->get(\Laminas\Escaper\Escaper::class);

        return new ElementManager('HTML5', $zendEscaper, 'en_US');
    }
}
