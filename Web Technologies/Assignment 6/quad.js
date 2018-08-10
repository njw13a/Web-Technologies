function quadratic() {
  var A = document.getElementById('A').value;
  var B = document.getElementById('B').value;
  var C = document.getElementById('C').value;

  var positive = (-Math.abs(B) + Math.sqrt(Math.pow(B, 2) - 4 * A * C  ) ) / (2 * A);
  var negative = (-Math.abs(B) - Math.sqrt(Math.pow(B, 2) - 4 * A * C  ) ) / (2 * A);

  var output = positive + ", " + negative;
  alert(output);
}

function goBack() {
  window.location.href = "Asn 6.html";
}
