<?php
/**
 * @var tiFy\Contracts\Metabox\MetaboxView $this
 */
?>
<table class="form-table">
    <tbody>
    <?php foreach ($this->params('fields', []) as $name) : ?>
        <?php if ($this->engine()->exists("field-{$name}")) : ?>
            <?php $this->insert("field-{$name}", $this->all()); ?>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>