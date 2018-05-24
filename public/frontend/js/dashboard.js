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
});



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
