$(".sidebar-toggler").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
 });
 $(".sidebar-toggler").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled-2");
    $('#menu ul').hide();
 });
 
 function initMenu() {
    $('#menu ul').hide();
    $('#menu ul').children('.current').parent().show();
    //$('#menu ul:first').show();
    $('#menu li a').click(
       function() {
          var checkElement = $(this).next();
          if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
             return false;
          }
          if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
             $('#menu ul:visible').slideUp('normal');
             checkElement.slideDown('normal');
             return false;
          }
       }
    );
 }
 $(document).ready(function() {
    initMenu();
    $('#menu ul').hide();
 });

var ctx = document.getElementById('graph');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
    label: 'Average Fuel Consumption',
    data: [],
    fill: true,
    borderColor: 'rgb(73, 3, 3)',
    backgroundColor: 'rgba(79,4,4,0.4)',
    tension: 0
  }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});