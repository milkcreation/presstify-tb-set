<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet\Metaboxes;

use tiFy\Contracts\Metabox\MetaboxDriver;
use tiFy\Plugins\TbSet\AbstractMetaboxDriver;

class ComingSoon extends AbstractMetaboxDriver
{
    /**
     * @inheritDoc
     */
    public function defaults(): array
    {
        return array_merge(parent::defaults(), [
            'title' =>  __('Accès au site', 'tify')
        ]);
    }

    /**
     * @inheritDoc
     */
    public function parse(): MetaboxDriver
    {
        parent::parse();

        $this->set([
            'offline' => config('tb-set.coming-soon.offline')
        ]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function settings()
    {
        return ['tbset_comingsoon_offline'];
    }

}