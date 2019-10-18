<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<tr>
    <th scope="row"><?php _e('Numéro de téléphone', 'theme'); ?></th>
    <td>
        <?php echo field('text', [
            'attrs' => [
                'class' => '%s widefat',
            ],
            'name'  => $this->name() . '[phone]',
            'value' => $this->value('phone', '')
        ]); ?>
    </td>
</tr>