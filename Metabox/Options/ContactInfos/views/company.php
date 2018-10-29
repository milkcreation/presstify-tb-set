<?php
/**
 * @var tiFy\Contracts\Views\ViewInterface $this.
 */
?>

<tr valign="top">
    <th scope="row" valign="middle">
        <?php _e('Société', 'theme'); ?>
    </th>
    <td>
        <?php
        echo field(
            'text',
            [
                'name'  => 'contact_infos[company]',
                'value' => $this->get('contact_infos.company'),
                'attrs' => [
                    'class' => '%s widefat'
                ]
            ]
        );
        ?>
    </td>
</tr>