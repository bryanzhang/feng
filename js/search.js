var Obj2str = function(o) {
                if (o == undefined) {
                    return "";
                }
                var r = [];
                if (typeof o == "string") return "\"" + o.replace(/([\"\\])/g, "\\$1").replace(/(\n)/g, "\\n").replace(/(\r)/g, "\\r").replace(/(\t)/g, "\\t") + "\"";
                if (typeof o == "object") {
                    if (!o.sort) {
                        for (var i in o)
                            r.push("\"" + i + "\":" + Obj2str(o[i]));
                        if (!!document.all && !/^\n?function\s*toString\(\)\s*\{\n?\s*\[native code\]\n?\s*\}\n?\s*$/.test(o.toString)) {
                            r.push("toString:" + o.toString.toString());
                        }
                        r = "{" + r.join() + "}"
                    } else {
                        for (var i = 0; i < o.length; i++)
                            r.push(Obj2str(o[i]))
                        r = "[" + r.join() + "]";
                    }
                    return r;
                }
                return o.toString().replace(/\"\:/g, '":""');
            }

var dataLoading = true;
var defKeyword = '搜索装修公司查看资质/评价'; 
var shopData = {};

$(document).ready(function() {
  $("input#search_input").val(defKeyword);
  $("input#search_input").blur(function() {
    if(this.value == '') {
      this.value = defKeyword;
    }
  });
  $("input#search_input").focus(function() {
    if(this.value == defKeyword) {
      this.value = '';
    }
  });

  listenFilters();
  loadData(jsonData);
});

function listenFilters() {
  $("a#score_filter_all").click(function() {
    if (dataLoading) { return; }
    jsonData['score'] = '';
    loadData();
  });
  $("a#score_filter_a").click(function() {
    if (dataLoading) { return; }
    jsonData['score'] = 'A';
    loadData();
  });
  $("a#score_filter_b").click(function() {
    if (dataLoading) { return; }
    jsonData['score'] = 'B';
    loadData();
  });
  $("a#score_filter_c").click(function() {
    if (dataLoading) { return; }
    jsonData['score'] = 'C';
    loadData();
  });

  $("a.qualify_filter").click(function() {
    if (dataLoading) { return; }
    jsonData['qualify'] = this.attributes['qualif'].value;
    loadData();
  });

  $("a#average_filter_all").click(function() {
    if (dataLoading) { return; }
    jsonData['average'] = '';
    loadData();
  });
  $("a#average_filter_1").click(function() {
    if (dataLoading) { return; }
    jsonData['average'] = '3to5';
    loadData();
  });
  $("a#average_filter_2").click(function() {
    if (dataLoading) { return; }
    jsonData['average'] = '5to7';
    loadData();
  });
  $("a#average_filter_3").click(function() {
    if (dataLoading) { return; }
    jsonData['average'] = '7to10';
    loadData();
  });
  $("a#average_filter_4").click(function() {
    if (dataLoading) { return; }
    jsonData['average'] = '10to15';
    loadData();
  });
  $("a#average_filter_5").click(function() {
    if (dataLoading) { return; }
    jsonData['average'] = '15up';
    loadData();
  });

  $("a.district-filter").click(function() {
    if (dataLoading) { return; }
    var value = this.attributes['district'].value;
    jsonData['distinct'] = value;
    loadData();
  });

  $("a.sort-type").click(function() {
    if (dataLoading) { return; }
    var value = this.attributes['sortType'].value;
    jsonData['sortType'] = value;
    loadData();
  });
};

function search() {
  var keyword = $("input#search_input").val();
  if (keyword == defKeyword) {
    keyword = "";
  }
  jsonData['keyword'] = keyword;
  loadData();
}

function initStatus() {
  if (jsonData['keyword'] == "") {
    $("input#search_input").val(defKeyword);
  } else {
    $("input#search_input").val(jsonData['keyword']);
  }
  $("input#search_input").keypress(function() {
    if (event.keyCode == 13) {
      search();
    }
  });
  $("a#search_button").click(function() {
    search();
  });

  var selected = "button search_left select";
  var notselected = "button search_left";

  $("a#score_filter_all").attr("class", (jsonData['score'] == '' ? selected : notselected));
  $("a#score_filter_a").attr("class", (jsonData['score'] == 'A' ? selected : notselected));
  $("a#score_filter_b").attr("class", (jsonData['score'] == 'B' ? selected : notselected));
  $("a#score_filter_c").attr("class", (jsonData['score'] == 'C' ? selected : notselected));

  selected = "qualify_filter button search_left select";
  notselected = "qualify_filter button search_left";
  $("a.qualify_filter").each(function(index) {
    this.setAttribute("class", this.attributes['qualif'].value == jsonData['qualify'] ? selected : notselected);
  });

  selected = "button search_left select";
  notselected = "button search_left";
  $("a#average_filter_all").attr("class", (jsonData['average'] == '' ? selected : notselected));
  $("a#average_filter_1").attr("class", (jsonData['average'] == '3to5' ? selected : notselected));
  $("a#average_filter_2").attr("class", (jsonData['average'] == '5to7' ? selected : notselected));
  $("a#average_filter_3").attr("class", (jsonData['average'] == '7to10' ? selected : notselected));
  $("a#average_filter_4").attr("class", (jsonData['average'] == '10to15' ? selected : notselected));
  $("a#average_filter_5").attr("class", (jsonData['average'] == '15up' ? selected : notselected));

  selected = "district-filter selected";
  notselected = "district-filter";
  $("a.district-filter").each(function(index) {
    this.setAttribute("class", (jsonData['distinct'] == this.attributes['district'].value ? selected : notselected));
  });

  selected = "sort-type selected";
  notselected = "sort-type";
  $("a.sort-type").each(function(index) {
    this.setAttribute("class", (jsonData['sortType'] == this.attributes['sortType'].value ? selected : notselected));
  });
};


function loadData() {
  dataLoading = true;
  initStatus();
  innerHtml = "<div style=\"min-height: 100px;float: left;margin: 12px 50px; font-size: 13px;\">正在加载数据，请稍等...</div>";
  $(".page_content").html(innerHtml);
  htmlobj = $.ajax({type : "post", cache: false, url : "/search.json.php", data : Obj2str(jsonData), success : function(data) {
    // generate shop item template.
    jsonData.page = data.page;
    innerHtml = "";
    if (data.arr.length == 0) {
      innerHtml = "<div style=\"min-height: 100px;float:left;margin: 12px 50px; font-size: 13px;\">对不起，没有找到相应的装修公司。</div>";
    } else {
      for (var i = 0; i < data.arr.length; ++i) {
        innerHtml += shopItemTemplate(i, data.arr[i]);
      }
      innerHtml += arrangePageItems(data.count, jsonData.page, jsonData.limit);
      shopData = data;
    }
    $(".page_content").html(innerHtml);
    listenSearchButtons();
    listenPages();
    dataLoading = false;
  }});
}

function arrangePageItems(count, page, limit) {
  var total = Math.floor((count + limit - 1) / limit);
  var innerHTML = "<div class=\"search-pages\">";

  // 共多少页
  innerHTML += "<span style=\"font-size:13px;float: left;margin-right: 10px;\">共" + total + "页</span>";

  // 先计算一下前后需要多少页
  var nextLeft = Math.min(total - 1 - page, 4);
  var preLeft = Math.min(page, 4);
  if (nextLeft + preLeft < 8) {
    if (nextLeft < 4) {
      preLeft = Math.min(page, 8 - nextLeft);
    } else {
      nextLeft = Math.min(total - 1 - page, 8 - preLeft);
    }
  }

  // 上一页
  if (preLeft > 0) {
    innerHTML += "<a class=\"NextPage\" title=\"上一页\">上一页</a>";
  }

  // ...
  if (preLeft < page) {
    innerHTML += "<span class=\"PageMore\">...</span>";
  }
  
  // 前面0页到8页(保持前后平衡)
  var i = 0;
  for (i = page - preLeft; i < page; ++i) {
    innerHTML += "<a class=\"PageLink\" title=\"" + (i + 1) + "\">" + (i + 1) + "</a>";
  }

  // 当前页面
  innerHTML += "<span class=\"PageSel\">" + (page + 1) + "</span>";

  // 后面0页到8页(保持前后平衡)
  for (i = page + 1; i < page + 1 + nextLeft; ++i) {
    innerHTML += "<a class=\"PageLink\" title=\"" + (i + 1) + "\">" + (i + 1) + "</a>";
  }

  // ...
  if (nextLeft < total - 1 - page) {
    innerHTML += "<span class=\"PageMore\">...</span>";
  }

  // 下一页
  if (nextLeft > 0) {
    innerHTML += "<a class=\"NextPage\" title=\"下一页\">下一页</a>";
  }

  innerHTML += "</div>";
  return innerHTML;
}

function shopItemTemplate(idx, item) {
  var dp_price, qualification, abstract, image;
  if (!item.dp_price) {
    dp_price = "暂无";
  } else {
    dp_price = item.dp_price + "元"
  }
  if (!item.qualification) {
    qualification = "资质:暂无";
  } else {
    qualification = item.qualification;
  }
  if (!item.abstract) {
    abstract = "简介:暂无";
  } else {
    abstract = item.abstract;
  }
  if (item.image != "") {
    image = "images/shop/" + item.Id + "/" + item.image;
  } else {
    image = "";
  }

  return "<div class=\"comments search\"><div class=\"item-img\" style=\"width:220px; float:left;\"><a href=\"/shop/" + item.Id + "\" title=\"" +
   item.shopname +
   "\" target=\"_blank\"><img src=\"/" + image + "\" alt=\"" + item.shopname + "\" style=\"height:146px; width:220px\"/><div class=\"overlay zoom\"></div>" +
   "</a></div><div class=\"comment-des search\"><div class=\"comment-by search\"><div style=\"display:inline-block;\"><h2 style=\"font-size:15px;line-height:1.3;\"><strong><a href=\"/shop/" +
    item.Id + "\"  target=\"_blank\" >" + item.shopname + "</a></strong></h2></div><span class=\"reply\"><span style=\"color:#aaa\">/ </span>" + item.score_all + "</span><span class=\"date\" >" + dp_price + "</span></div><li class=\"qualify search\">" + qualification + "</li><div class=\"shopinfo search\">" + abstract + "</div><a itemId=\"" + idx + "\" class=\"button green large search\">免费预约量房，送50元话费</a></div></div>";
}

function listenPages() {
  $("a.NextPage").click(function() {
    if (this.attributes['title'].value === '上一页') {
      jsonData['page'] = jsonData['page'] - 1;
      loadData();
    } else { // '下一页'
      jsonData['page'] = jsonData['page'] + 1;
      loadData();
    }
    $("html, body").animate({ scrollTop: 0 }, 120);
  });
  $("a.PageLink").click(function() {
    jsonData['page'] = parseInt(this.attributes['title'].value) - 1;
    loadData();
    $("html, body").animate({ scrollTop: 0 }, 120);
  });
}

function listenSearchButtons() {
  $("a[itemId]").click(function() {
    var idx = parseInt(this.attributes['itemId'].value);
    var id = shopData.arr[idx].Id;
    var name = shopData.arr[idx].shopname;
    showReserveBox(name, id);
  });
}
