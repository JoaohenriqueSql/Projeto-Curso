$(document).ready(function(){
    $(".hide").hide();
    
    
    $(".marker-russia").click(function(){
      $(".hide").hide();
      $(".russia-txt").fadeIn(300);
    });
    
      $(".marker-usa").click(function(){
         $(".hide").hide();
      $(".usa-txt").fadeIn(300);
    });
    
      $(".marker-uk").click(function(){
         $(".hide").hide();
      $(".uk-txt").fadeIn(300);
    });
    
      $(".marker-brazil").click(function(){
         $(".hide").hide();
      $(".brazil-txt").fadeIn(300);
    });

      $(".marker-china").click(function(){
         $(".hide").hide();
      $(".china-txt").fadeIn(300);
    });

      $(".marker-japao").click(function(){
         $(".hide").hide();
      $(".japao-txt").fadeIn(300);
    });

      $(".marker-coreiadosul").click(function(){
         $(".hide").hide();
      $(".coreiadosul-txt").fadeIn(300);
    });

      $(".marker-franca").click(function(){
         $(".hide").hide();
      $(".franca-txt").fadeIn(300);
    }); 

      $(".marker-india").click(function(){
         $(".hide").hide();
      $(".india-txt").fadeIn(300);
    });

      $(".marker-canada").click(function(){
         $(".hide").hide();
      $(".canada-txt").fadeIn(300);
    });

      $(".marker-paisesbaixo").click(function(){
         $(".hide").hide();
      $(".paisesbaixo-txt").fadeIn(300);
    });

      $(".marker-alemanha").click(function(){
         $(".hide").hide();
      $(".alemanha-txt").fadeIn(300);
    });

      $(".marker-reinounido").click(function(){
         $(".hide").hide();
      $(".reinounido-txt").fadeIn(300);
    });


  });




  
// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: false,
  panY: false,
  wheelX: "panX",
  wheelY: "zoomX",
  layout: root.verticalLayout
}));


// Data
var colors = chart.get("colors");

var data = [{
  country: "Estados Unidos",
  visits: 725,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/united-states.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Reino Unido",
  visits: 625,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/united-kingdom.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "China",
  visits: 688,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/china.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Japão",
  visits: 509,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/japan.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Alemanha",
  visits: 362,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/germany.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "França",
  visits: 476,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/france.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Índia",
  visits: 724,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/india.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Espanha",
  visits: 343,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/spain.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Países Baixos",
  visits: 265,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/netherlands.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Rússia",
  visits: 764,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/russia.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Coreia do Sul",
  visits: 280,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/south-korea.svg",
  columnSettings: { fill: colors.next() }
}, {
  country: "Canadá",
  visits: 297,
  icon: "https://www.amcharts.com/wp-content/uploads/flags/canada.svg",
  columnSettings: { fill: colors.next() }
},];


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  categoryField: "country",
  renderer: am5xy.AxisRendererX.new(root, {
    minGridDistance: 30
  }),
  bullet: function (root, axis, dataItem) {
    return am5xy.AxisBullet.new(root, {
      location: 0.5,
      sprite: am5.Picture.new(root, {
        width: 24,
        height: 24,
        centerY: am5.p50,
        centerX: am5.p50,
        src: dataItem.dataContext.icon
      })
    });
  }
}));

xAxis.get("renderer").labels.template.setAll({
  paddingTop: 20
});

xAxis.data.setAll(data);

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "visits",
  categoryXField: "country"
}));

series.columns.template.setAll({
  tooltipText: "{categoryX}: {valueY}",
  tooltipY: 0,
  strokeOpacity: 0,
  templateField: "columnSettings"
});

series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear();
chart.appear(1000, 100);