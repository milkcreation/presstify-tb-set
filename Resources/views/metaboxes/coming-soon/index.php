<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<table class="form-table">
    <tbody>
    <tr>
        <th>
            <?php _e('Site inaccessible au utilisateur non connecté.', 'tify'); ?>
        </th>
        <td>
            <?php echo field('toggle-switch', [
                'name'  => $this->name(),
                'value' => $this->value()
            ]); ?>
        </td>
    </tr>
    </tbody>
</table>