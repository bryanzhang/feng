function showReserveBox(name, id) {
  document.getElementById("popup-reserve-mask").style.display = "block";
  document.getElementById("g-popup-reserve").style.display = "block";
  document.getElementById("reserve_shopname").innerHTML = name;
  document.getElementById("reserve_shop").value = id;
}

function hideReserveBox() {
  document.getElementById("popup-reserve-mask").style.display = "none";
  document.getElementById("g-popup-reserve").style.display = "none";
}

function submitReserve() {
  if (document.getElementById("reserve_name").value === "") {
    alert("请输入姓名");
    return;
  }
  if (document.getElementById("reserve_phone").value === "") {
    alert("请输入手机号码");
    return;
  }
  var shop = document.getElementById("reserve_shop").value;
  var name = document.getElementById("reserve_name").value;
  var phone = document.getElementById("reserve_phone").value;
  var info = document.getElementById("reserve_info").value;
  var uri = '/reserve.php?shop='+shop+'&name='+name+'&phone='+phone+'&info='+info;
  htmlobj=$.ajax({url : uri, async: false});
//  if (htmlobj.responseText == "{\"result\" : \"true\"}") {
    alert("您的预约已提交，我们会尽快与您联系。");
    hideReserveBox();
//  } else {
//    alert("抱歉，预约失败，请重试。");
//  }
}

