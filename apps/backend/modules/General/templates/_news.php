<header class="header-section">
  Ultimas Noticias
  <!--<h1 class="about">Date: <a href="#"></a></h1>-->
</header>
<?php foreach($news as $new): ?>
<article class="related">
  <hgroup>
    <h1><a href="#"><?php echo $new->getTitle(); ?></a></h1>
  </hgroup>
    <p class="time">Date: <time datetime="2009-10-22" pubdate><?php echo date("Y-m-i",strtotime($new->getCreatedAt())); ?></time></p>
    <?php echo $new->getDescription(); ?>
</article>
<?php endforeach; ?>	