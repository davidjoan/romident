<?php slot('title') ?>
  Pacientes
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Lista de Pacientes
<?php end_slot() ?>


<?php slot('buttons') ?>
<td><?php echo button_to_get_url('Imprimir', '@patient_print?slug=slug', array('slug' => array('id' => 'patient_slug', 'list' => true, 'validate' => true, 'single' => true)), array('target' => 'BLANK','onclick' => true, 'class' => 'inputbutton')) ?></td>
<?php end_slot() ?>


<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@patient_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'firstname',
        'filter_fields'      => array
                                (
                                  'firstname'   => 'Nombres',
                                  'lastname'    => 'Apellidos',
                                ),
        'columns'            => array
                                (
                                  array('2' , ''             , ''            , ''               ),
                                  array('30', 'firstname'     , 'Nombres'    , 'getFirstname'   ),
                                  array('30', 'lastname'     , 'Apellidos'   , 'getLastname'    ),
                                  array('30', 'date_of_birth'     , 'Fecha Nacimiento'   , 'getFormattedDateOfBirth'    ),
                                  array('6' , 'disable_image', 'Activo'      , 'getDisableImage', 'center', false),
                                  array('2' , ''             , ''            , 'checkbox'      ),
                                )
      ))
?>

  