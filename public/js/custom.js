$(document).ready(function(){
  $("#category").val("");
  $("#transportationSection").hide();
  $("#othersSection").hide();

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
