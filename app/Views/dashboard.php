<?=$this->extend("template")?>
  
<?=$this->section("content")?>
<?=$this->include("header")?>
<div id="main_content">
<?php if(!is_null(session()->get('isLoggedIn'))){ ?>
    <?=$this->include("content")?>            
<?php }else{ ?>
<h5>Please Login to see dashboard by clicking the Guest on Top Right corner</h5>
<?php } ?>

</div>
            
<?=$this->include("footer")?>
<?=$this->endSection()?>