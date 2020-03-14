<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet\Metaboxes\ContactInfos;

use tiFy\Support\ParamsBag;

abstract class AbstractContactInfosBag extends ParamsBag
{
    /**
     * Alias de qualification.
     * @var string
     */
    protected $alias = '';

    /**
     * Instance de la métaboxe associée.
     * @var ContactInfosMetabox|null
     */
    protected $metabox;

    /**
     * Indicateur de préparation
     * @var bool
     */
    protected $prepared = false;

    /**
     * Récupération de l'alias de qualification.
     *
     * @return static
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * Préparation de l'élément.
     *
     * @return static
     */
    public function prepare(): self
    {
        if ($this->prepared === false) {
            $this->parse();

            $this->prepared = true;
        }

        return $this;
    }

    /**
     * Déclaration de l'alias de qualification.
     *
     * @param ContactInfosMetabox $metabox
     *
     * @return static
     */
    public function setMetabox(ContactInfosMetabox $metabox): self
    {
        $this->metabox = $metabox;

        return $this;
    }

    /**
     * Déclaration de l'alias de qualification.
     *
     * @param string $alias
     *
     * @return static
     */
    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }
}