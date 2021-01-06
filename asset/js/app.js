$(document).ready(function(){
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
  $('.carousel').carousel({
    interval: 1500
  });
  $('#linkBrands').hover(
    function(){ $(this).css("color","grey") }
  );
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})