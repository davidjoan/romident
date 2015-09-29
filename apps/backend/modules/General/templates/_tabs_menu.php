<table class="menu">
  <tr>
    <td width="99%">
      <table class="submenu">
        <tr>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Inicio', 
                  'uri'         => '@home',
                  'image'       => 'backend/menu/home.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Citas', 
                  'uri'         => '@appointment_list',
                  'image'       => 'backend/menu/inventory.gif',
                ))
          ?>          
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Titulares', 
                  'uri'         => '@holder_list',
                  'image'       => 'backend/menu/inventory.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Pacientes', 
                  'uri'         => '@patient_list',
                  'image'       => 'backend/menu/inventory.gif',
                ))
          ?>   
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Dentistas', 
                  'uri'         => '@dentist_list',
                  'image'       => 'backend/menu/inventory.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Usuarios', 
                  'uri'         => '@user_list',
                  'image'       => 'backend/menu/user.gif',
                ))
          ?>
        </tr>
      </table>
    </td>
    <td width="1%">
      <table class="submenu">
        <tr>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Cerrar Sesi&oacute;n', 
                  'uri'         => '@log_logout',
                  'image'       => 'backend/menu/logout.gif',
                ))
          ?>
      </table>
    </td>
  </tr>
</table>
