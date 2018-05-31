Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'salesstat',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { month: 'Janv.', y: 20 },
    { month: 'Févr.', y: 14 },
    { month: 'Mars', y: 9 },
    { month: 'Avr.', y: 4 },
    { month: 'Mai', y: 1 },
    { month: 'Juin', y: 2 },
    { month: 'Juill.', y: 2 },
    { month: 'Aout', y: 20 },
    { month: 'Sept.', y: 8 },
    { month: 'Oct.', y: 4 },
    { month: 'Nov.', y: 10 },
    { month: 'Déc.', y: 20 },
  ],
  hoverCallback: function(index, options) {
    var row = options.data[index];
    return "<div class='text'>" + row.y + " ventes<br> 450 <i class='fa fa-eur'></i></div>";
  },
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['y'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['ventes'],
  barColors: ['#65BB9F'],
  xLabelMargin: 10
});
var path0 = $('#salesstat svg path:nth-of-type(1)');
var paths = $('#salesstat svg path:not(path:nth-of-type(1))');
var lastrect = $('#salesstat svg rect:last');
console.log(lastrect.attr('fill'))
path0.attr({'stroke': '#044651', 'stroke-width': '4'})
paths.attr({'stroke': '#044651', 'stroke-width': '1'})
path0.insertAfter(lastrect)


var donut = Morris.Donut({
  element: 'salescamembert',
  data: [
    { label: 'en ligne', value: 70 },
    { label: 'locale', value: 15 }
  ],
  backgroundColor: '#ccc',
  labelColor: '#004857',
  colors: [
    '#65BB9F',
    '#044651'
  ],
  formatter: function(x) { return x + "%" }
});

var path1 = $('#salescamembert svg path:nth-of-type(1), #salescamembert svg path:nth-of-type(3)');
path1.attr('stroke-width', '7')
var path2 = $('#salescamembert svg path:nth-of-type(2), #salescamembert svg path:nth-of-type(4)');
path2.attr('stroke', 'none')

$(document).ready(function() {
  donut.select(0);
  $("#salescamembert text:first tspan").html("70%").attr('fill', '#65BB9F');
  $("#salescamembert text:last tspan").html("en ligne").css({
    'text-transform': 'uppercase',
    'font-size': '12px'
  });
});

for (i = 0; i < donut.segments.length; i++) {
  donut.segments[i].handlers['hover'].push(function(i) {
    /*console.log(donut.data[i].value)*/
    $("#salescamembert text:first tspan").html(donut.data[i].value + "%").attr('fill', '#65BB9F');
    $("#salescamembert text:last tspan").html(donut.data[i].label).css({
      'text-transform': 'uppercase',
      'font-size': '12px'
    });
  });
}
