<?php declare(strict_types=1);

namespace tiFy\Plugins\TbSet;

use tiFy\Plugins\TbSet\Contracts\TbSet;
use tiFy\Plugins\TbSet\Metaboxes\ContactInfos\ContactInfosMetabox;
use tiFy\Support\Proxy\Metabox;

class ContactInfos
{
    /**
     * Instance du gestionnaire du plugin.
     * @var TbSet
     */
    protected $manager;

    /**
     * CONSTRUCTEUR.
     *
     * @param TbSet $manager Instance du gestionnaire du plugin.
     *
     * @return void
     */
    public function __construct(TbSet $manager)
    {
        $this->manager = $manager;

        Metabox::registerDriver('tb-set.contact-infos', new ContactInfosMetabox());

        add_action('init', function () {
            if ($config = config('tb-set.contact-infos', true)) {
                $defaults = [
                    'admin' => false,
                ];

                config([
                    'tb-set.contact-infos' => is_array($config) ? array_merge($defaults, $config) : $defaults,
                ]);

                if ($admin = config('tb-set.contact-infos.admin')) {
                    $defaults = ['params' => []];
                    if ($fields = config('tb-set.contact-infos.fields', [])) {
                        $defaults['params']['fields'] = $fields;
                    }
                    if ($groups = config('tb-set.contact-infos.groups', [])) {
                        $defaults['params']['groups'] = $groups;
                    }

                    $attrs = is_array($admin) ? array_merge($defaults, $admin) : $defaults;
                    $attrs['driver'] = 'tb-set.contact-infos';

                    Metabox::add('tbSetContactInfos', $attrs)
                        ->setScreen('tify_options@options')
                        ->setContext('tab');
                }
            }
        });
    }
}