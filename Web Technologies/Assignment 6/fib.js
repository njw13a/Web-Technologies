
function fibonacci(index) {
  var previous_first = 0, previous_second = 1, next = 1;

    if (index == 0)
      return 0;
    for(var i = 2; i <= index; i++) {
        next = previous_first + previous_second;
        previous_first = previous_second;
        previous_second = next;
    }
    return next;
}

function fibAlert() {
  var i = document.getElementById('number').value;
  var output = fibonacci(i);
  alert(output);
}

function goBack() {
  window.location.href = "Asn 6.html";
}
