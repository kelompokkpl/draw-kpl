var text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum erat ac justo sollicitudin, quis lacinia ligula fringilla. Pellentesque hendrerit, nisi vitae posuere condimentum, lectus urna accumsan libero, rutrum commodo mi lacus pretium erat. Phasellus pretium ultrices mi sed semper. Praesent ut tristique magna. Donec nisl tellus, sagittis ut tempus sit amet, consectetur eget erat. Sed ornare gravida lacinia. Curabitur iaculis metus purus, eget pretium est laoreet ut. Quisque tristique augue ac eros malesuada, vitae facilisis mauris sollicitudin. Mauris ac molestie nulla, vitae facilisis quam. Curabitur placerat ornare sem, in mattis purus posuere eget. Praesent non condimentum odio. Nunc aliquet, odio nec auctor congue, sapien justo dictum massa, nec fermentum massa sapien non tellus. Praesent luctus eros et nunc pretium hendrerit. In consequat et eros nec interdum. Ut neque dui, maximus id elit ac, consequat pretium tellus. Nullam vel accumsan lorem.';
var lines = text.split(/[,\. ]+/g),
  data = Highcharts.reduce(lines, function (arr, word) {
    var obj = Highcharts.find(arr, function (obj) {
      return obj.name === word;
    });
    if (obj) {
      obj.weight += 1;
    } else {
      obj = {
        name: word,
        weight: 1
      };
      arr.push(obj);
    }
    return arr;
  }, []);

Highcharts.chart('wordCloud', {
  accessibility: {
    screenReaderSection: {
      beforeChartFormat: '<h5>{chartTitle}</h5>' +
        '<div>{chartSubtitle}</div>' +
        '<div>{chartLongdesc}</div>' +
        '<div>{viewTableButton}</div>'
    }
  },
  series: [{
    type: 'wordcloud',
    data: data,
    name: 'Occurrences'
  }],
  title: {
    text: 'Wordcloud of Lorem Ipsum'
  }
});

// Create the chart
Highcharts.chart('container', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Number of..'
  },
  subtitle: {
    text: 'Click the columns to view versions.'
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total of..'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Browsers",
      colorByPoint: true,
      data: [
        {
          name: "Chrome",
          y: 62.74,
          drilldown: "Chrome"
        },
        {
          name: "Firefox",
          y: 10.57,
          drilldown: "Firefox"
        },
        {
          name: "Internet Explorer",
          y: 7.23,
          drilldown: "Internet Explorer"
        },
        {
          name: "Safari",
          y: 5.58,
          drilldown: "Safari"
        },
        {
          name: "Edge",
          y: 4.02,
          drilldown: "Edge"
        },
        {
          name: "Opera",
          y: 1.92,
          drilldown: "Opera"
        },
        {
          name: "Other",
          y: 7.62,
          drilldown: null
        }
      ]
    }
  ],
  drilldown: {
    series: [
      {
        name: "Chrome",
        id: "Chrome",
        data: [
          [
            "v65.0",
            0.1
          ],
          [
            "v64.0",
            1.3
          ],
          [
            "v63.0",
            53.02
          ],
          [
            "v62.0",
            1.4
          ],
          [
            "v61.0",
            0.88
          ],
          [
            "v60.0",
            0.56
          ],
          [
            "v59.0",
            0.45
          ],
          [
            "v58.0",
            0.49
          ],
          [
            "v57.0",
            0.32
          ],
          [
            "v56.0",
            0.29
          ],
          [
            "v55.0",
            0.79
          ],
          [
            "v54.0",
            0.18
          ],
          [
            "v51.0",
            0.13
          ],
          [
            "v49.0",
            2.16
          ],
          [
            "v48.0",
            0.13
          ],
          [
            "v47.0",
            0.11
          ],
          [
            "v43.0",
            0.17
          ],
          [
            "v29.0",
            0.26
          ]
        ]
      },
      {
        name: "Firefox",
        id: "Firefox",
        data: [
          [
            "v58.0",
            1.02
          ],
          [
            "v57.0",
            7.36
          ],
          [
            "v56.0",
            0.35
          ],
          [
            "v55.0",
            0.11
          ],
          [
            "v54.0",
            0.1
          ],
          [
            "v52.0",
            0.95
          ],
          [
            "v51.0",
            0.15
          ],
          [
            "v50.0",
            0.1
          ],
          [
            "v48.0",
            0.31
          ],
          [
            "v47.0",
            0.12
          ]
        ]
      },
      {
        name: "Internet Explorer",
        id: "Internet Explorer",
        data: [
          [
            "v11.0",
            6.2
          ],
          [
            "v10.0",
            0.29
          ],
          [
            "v9.0",
            0.27
          ],
          [
            "v8.0",
            0.47
          ]
        ]
      },
      {
        name: "Safari",
        id: "Safari",
        data: [
          [
            "v11.0",
            3.39
          ],
          [
            "v10.1",
            0.96
          ],
          [
            "v10.0",
            0.36
          ],
          [
            "v9.1",
            0.54
          ],
          [
            "v9.0",
            0.13
          ],
          [
            "v5.1",
            0.2
          ]
        ]
      },
      {
        name: "Edge",
        id: "Edge",
        data: [
          [
            "v16",
            2.6
          ],
          [
            "v15",
            0.92
          ],
          [
            "v14",
            0.4
          ],
          [
            "v13",
            0.1
          ]
        ]
      },
      {
        name: "Opera",
        id: "Opera",
        data: [
          [
            "v50.0",
            0.96
          ],
          [
            "v49.0",
            0.82
          ],
          [
            "v12.1",
            0.14
          ]
        ]
      }
    ]
  }
});