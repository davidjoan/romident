<?php slot('title') ?>
  Citas
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Lista de Citas
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@appointment_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'title',
        'filter_fields'      => array
                                (
                                  'title'   => 'Titulo'
                                ),
        'columns'            => array
                                (
                                  array('2' , ''             , ''            , ''               ),
                                  array('30', 'title'     , 'Titulo'    , 'getTitle'   ),
                                  array('30', 'date_of_quote'     , 'Fecha la Cita'   , 'getFormattedDateOfQuote'    ),
                                  array('30', 'created_at'     , 'Fecha Creaci&oacute;n'   , 'getFormattedDatetime'    ),
                                  array('6' , 'disable_image', 'Activo'      , 'getDisableImage', 'center', false),
                                  array('2' , ''             , ''            , 'checkbox'      ),
                                )
      ))
?>

  