<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet\Metaboxes;

use tiFy\Plugins\TbSet\AbstractMetaboxDriver;

class ContactInfos extends AbstractMetaboxDriver
{
    /**
     * @inheritDoc
     */
    public function defaults(): array
    {
        return array_merge(parent::defaults(), [
            'name'  => 'contact_infos',
            'title' =>  __('Informations de contact', 'tify')
        ]);
    }

    /**
     * @inheritDoc
     */
    public function defaultParams(): array
    {
        return [
            'fields' => ['company', 'address1', 'address2', 'address3', 'city', 'postcode', 'phone', 'fax', 'mail']
        ];
    }
}