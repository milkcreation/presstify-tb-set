<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<tr>
    <th scope="row"><?php _e('Code postal', 'tify'); ?></th>
    <td>
        <?php echo field('text', [
            'attrs' => [
                'class' => '%s widefat',
            ],
            'name'  => $this->name() . '[postcode]',
            'value' => $this->value('postcode', ''),
        ]); ?>
    </td>
</tr>