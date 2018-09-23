<?php
/**
 * @var tiFy\Contracts\Views\ViewInterface $this.
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Adresse ligne #1', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[address1]',
                'value' => $this->get('contact_infos.address1'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>