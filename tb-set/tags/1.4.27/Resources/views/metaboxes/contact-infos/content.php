<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<table class="form-table">
    <tbody>

    <?php $this->insert('company', $this->all()); ?>

    <?php $this->insert('address1', $this->all()); ?>

    <?php $this->insert('address2', $this->all()); ?>

    <?php $this->insert('address3', $this->all()); ?>

    <?php $this->insert('city', $this->all()); ?>

    <?php $this->insert('postcode', $this->all()); ?>

    <?php $this->insert('phone', $this->all()); ?>

    <?php $this->insert('fax', $this->all()); ?>

    <?php $this->insert('mail', $this->all()); ?>

    </tbody>
</table>
