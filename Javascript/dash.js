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
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
    label: 'AVG cons.',
    data: [65, 59, 80, 801, 56, 55, 40],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0
  },{  
  label: 'AV1  G cons.',
  data: [65, 59, 80, 81, 5, 5, 0],
  fill: false,
  borderColor: 'rgb(75, 200, 102)',
  tension: 0}]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});