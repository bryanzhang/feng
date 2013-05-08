  <div id="g-popup-reserve" class="g-popup-reserve">
    <div style="background:#fff;border:1px solid #eee;">
      <!-- TODO(junhaozhang): no use onclick -->
      <a onclick="hideReserveBox();" class="link-close" style="padding:0 2px;line-height:1;font-size:18px;color:#aaa;position:absolute;right:10px;top:10px;text-decoration:none;cursor:pointer;">x</a>
      <div style="font-size:16px;line-height:2.8;text-align:center;">
        <br />
        感谢您预约<br />
        请留下您的信息，方便我们为您提供贴心的服务<br />
        您的姓名:<input type="text" id="reserve_name"/><br />
        您的手机号:<input type="text" id="reserve_phone"/><br />
        其他信息(如什么时间方便联系):<br />
        <input type="text" id="reserve_info"/><br />
        <?php
          $Id=$_GET["id"];
          print("<input type=\"hidden\" id=\"reserve_shop\" value=$Id />");
        ?>
        <script>
        </script>
        <input type="submit" value="提交" onclick="submitReserve()"/>
      </div>
    </div>
  </div>
