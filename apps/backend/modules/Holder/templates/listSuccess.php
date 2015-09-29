<?php slot('title') ?>
  Titulares
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Lista de Titulares
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@holder_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
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
                                  array('20', 'firstname'     , 'Nombres'    , 'getFirstname'   ),
                                  array('20', 'lastname'     , 'Apellidos'   , 'getLastname'    ),
                                  array('20', 'company'      , 'Empresa'     , 'getCompany'     ),
                                  array('20', 'email'        , 'Email'       , 'getEmail' ),
                                  array('20', 'home_phones'   , 'Telefono'    , 'getHomePhones' ),
                                  array('6' , 'disable_image', 'Activo'      , 'getDisableImage', 'center', false),
                                  array('2' , ''             , ''            , 'checkbox'      ),
                                )
      ))
?>
