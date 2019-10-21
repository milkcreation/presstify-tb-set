<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<tr>
    <th scope="row"><?php _e('Adresse ligne #3', 'tify'); ?></th>
    <td>
        <?php echo field('text', [
            'attrs' => [
                'class' => '%s widefat',
            ],
            'name'  => $this->name() . '[address3]',
            'value' => $this->value('address3', ''),
        ]); ?>
    </td>
</tr>