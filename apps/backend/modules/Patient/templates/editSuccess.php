<?php slot('title') ?>
  Pacientes
<?php end_slot() ?>

<?php slot('subtitle') ?>
  <?php echo $form->isNew() ? 'Agregar' : 'Editar' ?> Paciente
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>
