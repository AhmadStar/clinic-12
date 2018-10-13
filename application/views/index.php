<?php
  include 'view_config.php';
?>
<section class="row">
  
  <article class="col col-sm-9" id="mainContent"> 
  <?php 
    if(@$includes)
      foreach ($includes as $include)
        include_once $include.'.php';
  ?>
  </article>
  <aside class="col col-sm-3">
    <?php
    if(strtolower($title)!='login')
      if (!$this->bitauth->logged_in()){
        include_once 'account/login.php';
      }
      else{
        include_once 'repository/sidebar.php';
      }
    ?>
  </aside>
  
  <?php
  /*<aside class="col col-sm-3">
  
  </aside>*/
  ?>
</section>