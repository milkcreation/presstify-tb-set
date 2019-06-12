<?php

namespace tiFy\Plugins\TbSet\Metabox\Options\ContactInfos;

use tiFy\Metabox\MetaboxWpOptionsController;

class ContactInfos extends MetaboxWpOptionsController
{
    /**
     * {@inheritdoc}
     */
    public function content($args = [], $null1 = null, $null2 = null)
    {
        $contact_infos = get_option('contact_infos');

        return $this->viewer(
            'contact-infos',
            compact('contact_infos')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function header($args = [], $null1 = null, $null2 = null)
    {
        return $this->item->getTitle() ? : __('Informations de contact', 'tify');
    }

    /**
     * {@inheritdoc}
     */
    public function settings()
    {
        return ['contact_infos'];
    }
}