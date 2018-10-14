<?php
/**
 * @var tiFy\Contracts\Views\ViewInterface $this.
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Adresse mail', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[mail]',
                'value' => $this->get('contact_infos.mail'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>