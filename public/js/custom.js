$(document).ready(function(){
  //$("#category").val("");
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

  $(".showDetailsInExpense").click(function(){
    $('#expenseDetailIframe').contents().find('#mainNavbar').hide();
    $('#expenseDetailIframe').contents().find('#backToTransportationListButton').hide();
    $('#expenseDetailIframe').contents().find('#backToOthersListButton').hide();
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
  })
});
