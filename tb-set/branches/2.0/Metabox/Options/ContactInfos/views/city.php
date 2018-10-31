<?php
/**
 * @var tiFy\Contracts\View\ViewController $this
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Ville', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[city]',
                'value' => $this->get('contact_infos.city'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>
