function submitContact() {
  var name = $("#name").val();
  var email = $("#email").val();
  var message = $("#message").val();
  if (!email) {
    alert("请输入邮箱!");
    return;
  }
  if (!message) {
    alert("请输入反馈意见!");
    return;
  }

  var data = { 'name' : name, 'email' : email, 'message' : message };
  $.post('/contact_post.php', data, function(response) {
    if (response.result == "true") {
      alert("您的反馈已成功提交，我们会尽快处理。感谢支持!");
    } else {
      alert("提交失败，请重试!");
    }
  });
}

$(document).ready(function() {
  $("#contact_send").click(submitContact);
});
