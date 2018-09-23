<?php
/**
 * @var tiFy\Contracts\Views\ViewInterface $this.
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Code postal', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[postcode]',
                'value' => $this->get('contact_infos.postcode'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>