    <div class="four columns">
      <div class="project_overview">
        <h3>公司简介</h3>
        <p><?=$abstract;?></p>
        <ul class="star_list">
          <li>评级：<?=$score_all;?>类</li>
          <?php if($dp_price > 0) { ?>
	  <li>参考价：<?=floor($dp_price/1000)*1000;?>元</li>
          <?php } ?>
        </ul>
      </div>
      <br/>
      <a id="btnReserve1" class="button green large" pageTracker._trackPageview('company_reserve1_click');">免费预约上门量房<br/>送50元话费>></a>
      <br/>
      <div class="project_overview">
        <h3>其他信息</h3>
        <ul class="square_list">
          <li>地址：<?=$zone." (".$district.")";?></li>
        </ul>
        <?php if($score_service!="") { ?>
        <ul class="square_list">
          <li>服务：<?=$score_service;?></li>
        </ul>
        <?php } ?>
        <br/>
        <a href="#" id="btnReserve2" class="button green large" pageTracker._trackPageview('company_reserve2_click');">免费咨询 / 量房</a>
      </div>
    </div>

