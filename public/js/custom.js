$(document).ready(function(){
  /*
  if (typeof(Storage) !== "undefined") {
    sessionStorage.goodsSeq = 1;
  } else {
    alert("Sorry, your browser does not support web storage...");
    window.location("shopping");
  }
  */

  $("#addGoodRowButton").click(function(){
    /*
    if (typeof(Storage) !== "undefined") {
      var currGoodsSeq = 0;
      var previousGoodsSeq = 0;
      if (sessionStorage.goodsSeq) {
        sessionStorage.goodsSeq = Number(sessionStorage.goodsSeq) + 1;
        currGoodsSeq = sessionStorage.goodsSeq;
        previousGoodsSeq = currGoodsSeq - 1
      }

    } else {
      alert("Sorry, your browser does not support web storage...");
      window.location("shopping");
    }
    */
    $("#goodsShoppingContent").append($("#defaultGoodsRow").clone());
  });

  $("#transportationSection").hide();
  $("#shoppingSection").hide();
  $("#othersSection").hide();
  if($("#category").val() == "Transportation") {
    $("#transportationSection").show();
  } else if($("#category").val() == "Shopping") {
    $("#shoppingSection").show();
  } else if($("#category").val() == "Others") {
    $("#othersSection").show();
  }

  $(".showShoppingDetailsInExpense_Create").click(function(){
    var id_arr = $(this).attr('id').split("_");
    setTimeout(function() {
      $('#shoppingExpenseDetailsIframe_' + id_arr[1]).contents().find('#mainNavbar').hide();
      $('#shoppingExpenseDetailsIframe_' + id_arr[1]).contents().find('#backToShoppingListButton').hide();
    }, 500);
  });

  $("#showTransportationDetailsInExpense").click(function(){
    setTimeout(function() {
      $('#transportationExpenseDetailsIframe').contents().find('#mainNavbar').hide();
      $('#transportationExpenseDetailsIframe').contents().find('#backToTransportationListButton').hide();
    }, 500);
  });

  $("#showShoppingDetailsInExpense").click(function(){
    setTimeout(function() {
      $('#shoppingExpenseDetailsIframe').contents().find('#mainNavbar').hide();
      $('#shoppingExpenseDetailsIframe').contents().find('#backToShoppingListButton').hide();
    }, 500);
  });

  $("#showOthersDetailsInExpense").click(function(){
    setTimeout(function() {
      $('#othersExpenseDetailsIframe').contents().find('#mainNavbar').hide();
      $('#othersExpenseDetailsIframe').contents().find('#backToOthersListButton').hide();
    }, 500);
  });

  $("#category").change(function(){
    var category = $("#category").val();
    if(category == "Transportation") {
      $("#transportationSection").show();
      $("#othersSection").hide();
      $("#shoppingSection").hide();
    } else if(category == "Others") {
      $("#transportationSection").hide();
      $("#othersSection").show();
      $("#shoppingSection").hide();
    } else if(category == "Shopping") {
      $("#transportationSection").hide();
      $("#othersSection").hide();
      $("#shoppingSection").show();
    } else {
      $("#transportationSection").hide();
      $("#othersSection").hide();
      $("#shoppingSection").hide();
    }
  });
});
