  $(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
    });
    $('.carousel').carousel({
      interval: 1500
    });
  });