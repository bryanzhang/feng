<div class="container" >
  <div style=" border-color:#dddddd; border-width:1px; border-style:solid; margin:10px 10px 0px 10px; padding:10px 0 10px 20px; font-weight:bold; background-color:#FFFFFF; background: url('./images/search_bg.jpg'); height: 140px;">
    <div class="feature" style="display: none;">
      <div class="feature-circle green">></div>
      <div class="feature-description"  style=" padding-top:20px; font-size:24px;">
        按地区找装修公司
        <div id="index_navigation" style=" float:right; margin: -12px 300px 0 0;">
          <ul>
            <li><a href="<?=$searchUrl;?>" style="color:#81b600; margin-left: -270px;">上海全部地区</a>
              <ul style="margin-left: -270px;">
                <li>
                  <a href="<?=$searchUrl;?>?distinct=卢湾区">卢湾区</a>
                  <a href="<?=$searchUrl;?>?distinct=徐汇区">徐汇区</a>
                  <a href="<?=$searchUrl;?>?distinct=长宁区">长宁区</a>
                  <a href="<?=$searchUrl;?>?distinct=静安区">静安区</a>
                  <a href="<?=$searchUrl;?>?distinct=浦东新区">浦东新区</a>
                </li>
                <li>
                  <a href="<?=$searchUrl;?>?distinct=黄浦区">黄浦区</a>
                  <a href="<?=$searchUrl;?>?distinct=普陀区">普陀区</a>
                  <a href="<?=$searchUrl;?>?distinct=闸北区">闸北区</a>
                  <a href="<?=$searchUrl;?>?distinct=杨浦区">杨浦区</a>
                  <a href="<?=$searchUrl;?>?distinct=虹口区">虹口区</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="feature" style="display: none;">
      <div class="feature-circle green">></div>
      <div class="feature-description"  style=" padding-top:20px; font-size:24px;">
        搜索装修公司名称，查看资质评价
        <div class="search"  style="width:450px; float:right; margin: -12px 23px 0px 0; padding-right: 5px;">
          <input id="search_input" type="text" value="输入装修公司名称" class="text" style="width:300px; margin-right:10px; height:20px; font-size:12px;" />
          <a id="search_button" class="button green large">搜索</a>
        </div>
      </div>
    </div>
  </div>
</div>
