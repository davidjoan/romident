<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <?php use_stylesheet('backend/default/layout.css', 'first') ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  
  <body>
    <div class="wrap">
      <div class="header">
        <br/><br/>
        DATA SOLUTIONS
      </div>
      
      <div class="content">
        <?php echo $sf_content ?>
      </div>
      
      <div class="footer">
        © 2011 Data Solutions. All Rights Reserved.
        <br/>
        Administrator 1.0
      </div>
    </div>
  </body>
</html>