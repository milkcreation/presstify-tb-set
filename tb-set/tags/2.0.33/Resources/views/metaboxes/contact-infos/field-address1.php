<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<?php $this->layout('layout-field'); ?>

<?php $this->start('label'); ?>
<?php _e('Adresse ligne #1', 'tify'); ?>
<?php $this->end(); ?>

<?php echo field('text', [
    'attrs' => [
        'class' => '%s widefat',
    ],
    'name'  => $this->name() . '[address1]',
    'value' => $this->value('address1', ''),
]); ?>
