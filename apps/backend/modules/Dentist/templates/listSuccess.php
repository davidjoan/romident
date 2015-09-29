<?php slot('title') ?>
  Dentistas
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Lista de Dentistas
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@dentist_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'firstname',
        'filter_fields'      => array
                                (
                                  'firstname'   => 'Nombres',
                                  'lastname'    => 'Apellidos',
                                  'email'       => 'Email'
                                ),
        'columns'            => array
                                (
                                  array('2' , ''             , ''            , ''               ),
                                  array('30', 'firstname'     , 'Nombres'    , 'getFirstname'   ),
                                  array('30', 'lastname'     , 'Apellidos'   , 'getLastname'    ),
                                  array('26', 'email'        , 'Email'       , 'getEmail' ),
                                  array('26', 'home_phones'   , 'Telefono'    , 'getHomePhones' ),
                                  array('6' , 'disable_image', 'Activo'      , 'getDisableImage', 'center', false),
                                  array('2' , ''             , ''            , 'checkbox'      ),
                                )
      ))
?>
