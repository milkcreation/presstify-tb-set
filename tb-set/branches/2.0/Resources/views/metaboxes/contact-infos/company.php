<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<tr>
    <th scope="row"><?php _e('Société', 'tify'); ?></th>
    <td>
        <?php echo field('text', [
            'attrs' => [
                'class' => '%s widefat',
            ],
            'name'  => $this->name() . '[company]',
            'value' => $this->value('company', ''),
        ]); ?>
    </td>
</tr>