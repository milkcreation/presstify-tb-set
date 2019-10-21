<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<tr>
    <th scope="row"><?php _e('Adresse mail', 'tify'); ?></th>
    <td>
        <?php echo field('text', [
            'attrs' => [
                'class' => '%s widefat',
            ],
            'name'  => $this->name() . '[mail]',
            'value' => $this->value('mail', '')
        ]); ?>
    </td>
</tr>