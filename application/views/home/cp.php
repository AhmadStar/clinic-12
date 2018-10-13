<div id="cPanel" class="">
  <?php
    if(!$this->bitauth->get_users())
      include_once 'cp/admin.php';
    if($this->bitauth->logged_in())
    {
      if($this->bitauth->is_admin())
        include_once 'cp/admin.php';
//      if($this->bitauth->logged_in()) 
        include_once 'cp/doctor.php';
      if($this->bitauth->has_role('receptionist'))
        include_once 'cp/receptionist.php';
      if($this->bitauth->has_role('pharmacy'))
        include_once 'cp/pharmacy.php';
      if($this->bitauth->has_role('lab'))
        include_once 'cp/lab.php';
      if($this->bitauth->has_role('xray'))
        include_once 'cp/xray.php';
      if($this->bitauth->has_role('xray'))
        include_once 'cp/income.php';
      if($this->bitauth->has_role('xray'))
        include_once 'cp/consume.php';
      
      
    }
  ?>
  <style>
    
  </style>
</div>