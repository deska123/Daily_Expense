$(document).ready(function(){
  $("#showDetailsInExpense").click(function(){
    $('#expenseDetailIframe').contents().find('#mainNavbar').hide();
    $('#expenseDetailIframe').contents().find('#backToTransportationListButton').hide();
  });
});
