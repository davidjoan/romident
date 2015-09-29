      <hgroup class="about-title">
         <h1 rel="fn">Bienvenidos al Administrador de Consultorio Dental</h1>
      </hgroup>


<?php include_component('Generic', 'form', array
      (
        'form'          => $form,
        'action_uri'    => '@log_login',
        'styles_folder' => 'log',
        'submit'        => 'Ingresar',
        'with_title'    => false
      ))
?>
