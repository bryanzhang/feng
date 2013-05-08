  <div id="g-popup-reserve" class="g-popup-reserve" style="background:#545455;border:3px solid #ececec; color:#ececec; width:500px;">
      <!-- TODO(junhaozhang): no use onclick --> 
      <a onClick="hideReserveBox();" class="link-close" style="padding:0 2px;line-height:1;font-size:18px;color:#aaa;position:absolute;right:10px;top:10px;text-decoration:none;cursor:pointer;">x</a>
      <div style="font-size:16px;line-height:2.8;text-align:center; padding-bottom:20px;">
        
        <div class="reserve"><strong style="color:#ececec">免费咨询/免费预约量房：<span id="reserve_shopname"></span></strong></div>
        <div class="reserve">免费送50元话费</div>
         <div class="reserve">姓&nbsp;&nbsp;&nbsp;名:<input type="text" id="reserve_name"/></div>
         <div class="reserve">手机号:<input type="text" id="reserve_phone"/></div>
         <div class="reserve"><div style="float:left; text-align:right; width:200px;">开始装修时间:</div>
           <div style=" float:right; margin:15px 145px 0 0;">
             <select name="select"  style="color:#000000; width:155px;">
               <option selected="selected" value="">1个月内</option>
               <option value="">3个月内</option>
             </select>
           </div>
         </div>
        <div class="reserve"><div style="float:left; text-align:right; width:200px;">什么时候方便联系:</div>
          <div style=" float:right; margin:5px 145px 0 0;">
            <select name="select" id="reserve_info" style="color:#000000; width:155px;">
              <option selected="selected" value="">下班时间或周末</option>
              <option value="">任何时间</option>
            </select>
          </div>
        </div>
        <input type="hidden" id="reserve_shop" value="" />
        <div class="reserve" style=" margin:30px 0 0 25px;"><input class="button green large"  style="width:180px;" type="submit" value="提交" onClick="submitReserve()"/></div>
      </div>
  </div>
