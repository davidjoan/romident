<?php slot('title') ?>
  Dentistas
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Dentista: <?php echo $form->getObject()->getFirstname() ?>, <?php echo $form->getObject()->getLastname() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
