<?php slot('title') ?>
  Titulares
<?php end_slot() ?>

<?php slot('subtitle') ?>
  <?php echo $form->isNew() ? 'Agregar' : 'Editar' ?> Titular
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>
