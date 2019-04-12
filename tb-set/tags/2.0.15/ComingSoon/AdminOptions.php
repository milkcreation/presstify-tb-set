<?php

namespace tiFy\Plugins\TbSet\ComingSoon;

use tiFy\Metabox\MetaboxWpOptionsController;

class AdminOptions extends MetaboxWpOptionsController
{
    /**
     * {@inheritdoc}
     */
    public function content($args = null, $null1 = null, $null2 = null)
    {
        $offline = config('tb-set.coming-soon.offline');

        return view()
            ->setDirectory(dirname(__DIR__) . '/Resources/views/coming-soon')
            ->render('options', compact('offline'));
    }

    /**
     * {@inheritdoc}
     */
    public function header($args = null, $null1 = null, $null2 = null)
    {
        return $this->get('title') ? : __('Accès au site', 'tify');
    }

    /**
     * {@inheritdoc}
     */
    public function load($wp_screen)
    {
        add_action(
            'admin_enqueue_scripts',
            function () {
                field('toggle-switch')->enqueue_scripts();
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function settings()
    {
        return ['tbset_comingsoon_offline'];
    }

}