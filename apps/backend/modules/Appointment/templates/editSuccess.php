<?php slot('title') ?>
  Citas
<?php end_slot() ?>

<?php slot('subtitle') ?>
  <?php echo $form->isNew() ? 'Agregar' : 'Editar' ?> Cita
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>
