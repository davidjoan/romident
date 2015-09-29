<table>
  <tr>
    <td class="left">
      <?php echo link_to(image_tag('general/logo_large.png', array('height' => '40px')), 'http://romident.datasolutions.pe') ?>
    </td>
    <td class="right">
      <?php echo image_tag('backend/secure_user.png') ?>&nbsp;<?php echo $sf_user->getUsername() ?>
    </td>
  </tr>
</table>
