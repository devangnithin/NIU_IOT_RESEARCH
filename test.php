
<!doctype html>
<html>
<head>
  <title>Graph 3D animation moving dots</title>

  <style>
    body {font: 10pt arial;}
  </style>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.18.1/vis.min.js"></script>

  <script type="text/javascript">
    var data = null;
    var graph = null;

    // Called when the Visualization API is loaded.
    function drawVisualization() {
      // create the data table.
      data = new vis.DataSet();

      // create some shortcuts to math functions
      var sin = Math.sin;
      var cos = Math.cos;
      var pi = Math.PI;

      // create the animation data
      var tmax = 2.0 * pi;
      var tstep = tmax / 75;
      var dotCount = 1;  // set this to 1, 2, 3, 4, ...
      for (var t = 0; t < tmax; t += tstep) {
        var tgroup = parseFloat(t.toFixed(2));
        var value = t;

        // a dot in the center
        data.add( {x:0,y:0,z:0,filter:tgroup,style:value});

        // one or multiple dots moving around the center
        for (var dot = 0; dot < dotCount; dot++) {
          var tdot = t + 2*pi * dot / dotCount;
          data.add( {x:sin(tdot),y:cos(tdot),z:sin(tdot),filter:tgroup,style:value});
          data.add( {x:sin(tdot),y:-cos(tdot),z:sin(tdot + tmax*1/2),filter:tgroup,style:value});
        }
      }

      // specify options
      var options = {
        width:  '600px',
        height: '600px',
        style: 'dot-color',
        showPerspective: true,
        showGrid: true,
        keepAspectRatio: true,
        verticalRatio: 1.0,
        animationInterval: 35, // milliseconds
        animationPreload: false,
        animationAutoStart: true,
        legendLabel: 'color value',
        cameraPosition: {
          horizontal: 10,
          vertical: -1,
          distance: 1.65
        }
      };

      // create our graph
      var container = document.getElementById('mygraph');
      graph = new vis.Graph3d(container, data, options);
    }
  </script>
  
</head>

<body onload="drawVisualization();">
<div id="mygraph"></div>

<div id="info"></div>
</body>
</html>
