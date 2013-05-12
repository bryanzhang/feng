<div class="four columns portfolio-item architecture real-estate" style="height:270px;">
  <?php
    getShopInfo($row);
  ?>
  <div class="item-img">
    <a href="<?=companyUrl($Id);?>" title="<?=$shopname;?>"  target="_blank"><img src="<?=$shopImg;?>" alt="" style="height:146px; width:220px"/><div class="overlay zoom"></div></a>
  </div>
  <div class="portfolio-item-meta">
    <h4><a href="<?=companyUrl($Id);?>" target="_blank"><?=$shopname;?></a></h4>
    <p style="height:65px; overflow:hidden">
      <?=$abstract;?>
    </p>
  </div>
  <?php
    
  ?>
</div>
