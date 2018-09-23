<?php
/**
 * @var tiFy\Contracts\Views\ViewInterface $this.
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Numéro de fax', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[fax]',
                'value' => $this->get('contact_infos.fax'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>