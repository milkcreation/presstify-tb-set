<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<?php $this->layout('layout-field'); ?>

<?php $this->start('label'); ?>
<?php _e('Numéro de téléphone', 'tify'); ?>
<?php $this->end(); ?>

<?php echo field('text', [
    'attrs' => [
        'class' => '%s widefat',
    ],
    'name'  => $this->name() . '[phone]',
    'value' => $this->value('phone', ''),
]);