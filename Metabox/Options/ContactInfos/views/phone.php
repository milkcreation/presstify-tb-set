<?php
/**
 * @var tiFy\Contracts\View\ViewController $this
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Numéro de téléphone', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[phone]',
                'value' => $this->get('contact_infos.phone'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>