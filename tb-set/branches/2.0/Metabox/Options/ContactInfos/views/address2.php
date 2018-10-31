<?php
/**
 * @var tiFy\Contracts\View\ViewController $this
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Adresse ligne #2', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[address2]',
                'value' => $this->get('contact_infos.address2'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>