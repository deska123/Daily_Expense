$(document).ready(function(){
  //$("#category").val("");
  $("#transportationSection").hide();
  $("#othersSection").hide();
  if($("#category").val() == "Transportation") {
    $("#transportationSection").show();
  } else if($("#category").val() == "Shopping") {

  } else if($("#category").val() == "Others") {

  }

  $("#showDetailsInExpense").click(function(){
    $('#expenseDetailIframe').contents().find('#mainNavbar').hide();
    $('#expenseDetailIframe').contents().find('#backToTransportationListButton').hide();
  });

  $("#category").change(function(){
    var category = $("#category").val();
    if(category == "Transportation") {
      $("#transportationSection").show();
      $("#othersSection").hide();
    } else if(category == "Others") {
      $("#transportationSection").hide();
      $("#othersSection").show();
    }
  })
});
