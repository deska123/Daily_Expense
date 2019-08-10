$(document).ready(function(){
  $("#others").hide();

  $("#showDetailsInExpense").click(function(){
    $('#expenseDetailIframe').contents().find('#mainNavbar').hide();
    $('#expenseDetailIframe').contents().find('#backToTransportationListButton').hide();
  });

  $("#category").change(function(){
    var category = $("#category").val();
    if(category == "Transportation") {
      $("#transportation").show();
      $("#others").hide();
    } else if(category == "Others") {
      $("#transportation").hide();
      $("#others").show();
    }
  })
});
