<?php
/**
 * @var tiFy\Contracts\View\ViewController
 */
?>
<table class="form-table">
    <tbody>
    <tr>
        <th>
            <?php _e('Site inaccessible au utilisateur non connecté', 'tify'); ?>
        </th>
        <td>
            <?php
            echo field(
                'toggle-switch',
                [
                    'name'  => 'tbset_comingsoon_offline',
                    'value' => $this->get('offline')
                ]
            );
            ?>
        </td>
    </tr>
    </tbody>
</table>