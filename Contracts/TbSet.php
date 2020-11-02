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
     * Chemin absolu vers une ressources (fichier|répertoire).
     *
     * @param string $path Chemin relatif vers la ressource.
     *
     * @return string
     */
    public function resources($path = ''): string;

    /**
     * Définition du conteneur d'injection de dépendances.
     *
     * @param Container $container
     *
     * @return static
     */
    public function setContainer(Container $container): TbSet;
}
