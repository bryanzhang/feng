<?php
  require 'functions.php';
  require 'doctype.php';
?>
<html>
  <head>
    <?php include 'head.php'; ?>
    <script type="text/javascript" src="js/contact.js"></script>
  </head>
  <body>
    <?php include 'layout/header.php' ?>
    <div id="subtitle">
      <div class="container">
        <div class="sixteen columns">
          <h3>使用反馈</h3>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <h3 class="page_headline">您的满意是我们的终极目标</h3>

        <div class="page_content">
          <div class="contact_form">
            <form>
              <div>你的反馈已成功提交，我们会尽快处理。感谢支持！</div>	

              <div>
                <label for="name" style="margin-top: 0">姓名：</label>
                <input type="text" name="name" id="name" class="contact_text" size="40" maxlength="60" value="" />
              </div>

              <div>
                <label for="email">Email：<span>*</span></label>
                <input type="text" name="email" id="email" class="contact_text validate['required','email']" size="40" maxlength="60" value="" />
              </div>

              <div>
                <label for="message">反馈内容：<span>*</span></label>
                <textarea name="message" id="message" class="contact_textarea validate['required']"></textarea>
              </div>

              <div class="send_button">
                <a class="button green large" id="contact_send">提交反馈</a>
                <input type="hidden" name="action" value="send"/>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="four columns">
        <h3 class="page_headline">联系我们</h3>
        <div class="address_contact"><img style="padding-top: 1px" src="images/address_contact.png" alt="" /><strong>地址：</strong> 上海市卢湾区太仓路233号</div>
        <div class="address_contact"><img style="padding-top: 1px" src="images/phone_contact.png" alt=""/><strong>电话：</strong> 021-52358827</div>
        <div class="address_contact"><img style="padding-top: 3px" src="images/mail_contact.png" alt=""/><strong>Email:</strong><a href="#"> info@zhuangxiufeng.com</a><br/><br/></div>
      </div>
    </div>
    <?php include 'layout/footer.php' ?>
  </body>
</html>
