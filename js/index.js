var defKeyword = '输入装修公司名称';

function search() {
  var keyword = $("input#search_input").val();
  // TODO: hard code
  var url = "http://www.zhuangxiufeng.com/search.php";
  if (keyword != '' && keyword != defKeyword) {
    url += "?keyword=" + keyword;
  }
  window.location.href = url;
}

$(document).ready(function() {
  $("input#search_input").val(defKeyword); 
  $("input#search_input").blur(function() {
    if(this.value == '') {
      this.value = defKeyword;
    }
  });
  $("input#search_input").focus(function() {
    if (this.value == defKeyword) {
      this.value = '';
    }
  });
  $("input#search_input").keypress(function() {
    if (event.keyCode == 13) {
      search();
    }
  });
  $("a#search_button").click(function() {
    search();
  });
});
