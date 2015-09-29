<?php slot('title') ?>
  Citas
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Cita: <?php echo $form->getObject()->getFirstname() ?>, <?php echo $form->getObject()->getTitle() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
