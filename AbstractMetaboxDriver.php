<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use tiFy\Metabox\MetaboxDriver;

abstract class AbstractMetaboxDriver extends MetaboxDriver
{
    /**
     * @inheritDoc
     */
    public function defaults(): array
    {
        return array_merge(parent::defaults(), [
            'viewer' => [
                'directory' => __DIR__ . '/Resources/views/metaboxes/' . class_info($this)->getKebabName()
            ]
        ]);
    }
}