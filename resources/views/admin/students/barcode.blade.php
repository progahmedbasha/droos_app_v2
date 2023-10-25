<body onload="window.print()">
  <div id="elem" style="text-align:center;">
    <span style="font-size:18px;"><b>{{$student->name}}</b></span>
    <br>
    <img width="150px" src="data:image/png;base64,{{DNS1D::getBarcodePNG($student->barcode, 'C128' , 1)}}"
      alt="barcode" /><br>
    <span style="font-size:12px;"><b> {{$student->barcode}}</b></span>
  </div>
</body>