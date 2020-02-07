<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<?php $this->layout('layout-field'); ?>

<?php $this->start('label'); ?>
<?php _e('Adresse ligne #2', 'tify'); ?>
<?php $this->end(); ?>

<?php echo field('text', [
    'attrs' => [
        'class' => '%s widefat',
    ],
    'name'  => $this->name() . '[address2]',
    'value' => $this->value('address2', ''),
]);