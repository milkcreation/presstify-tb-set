<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 * @var tiFy\Plugins\TbSet\Metaboxes\ContactInfos\ContactInfosField $field
 */
?>
<?php $this->layout('layout-field'); ?>

<?php $this->start('label'); ?>
<?php echo $field->getTitle(); ?>
<?php $this->end(); ?>

<?php echo field('text', [
    'attrs' => [
        'class' => '%s widefat',
    ],
    'name'  => $field->getName(),
    'value' => $field->getValue(),
]);