<?php slot('title') ?>
  Titulares
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Titular: <?php echo $form->getObject()->getFirstname() ?>, <?php echo $form->getObject()->getLastname() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
