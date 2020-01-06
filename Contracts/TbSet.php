<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet\Contracts;

use Psr\Container\ContainerInterface as Container;

interface TbSet
{
    /**
     * Récupération du conteneur d'injection de dépendances.
     *
     * @return Container|null
     */
    public function getContainer(): ?Container;

    /**
     * Définition du conteneur d'injection de dépendances.
     *
     * @param Container $container
     *
     * @return static
     */
    public function setContainer(Container $container): TbSet;
}
