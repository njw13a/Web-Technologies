function distance() {
  var x1 = document.getElementById('x1').value;
  var y1 = document.getElementById('y1').value;
  var z1 = document.getElementById('z1').value;
  var x2 = document.getElementById('x2').value;
  var y2 = document.getElementById('y2').value;
  var z2 = document.getElementById('z2').value;
  var answer = Math.sqrt(Math.pow((x2 - x1), 2) + Math.pow((y2 - y1), 2) + Math.pow((z2 - z1),2));
  alert(answer);
}

function goBack() {
  window.location.href = "Asn 6.html";
}
