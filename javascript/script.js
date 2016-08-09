window.onload = function(e) {
  var brand = document.getElementById('brand');
  setTimeout(function(e) {
    brand.style.float = 'left';
    brand.style.display = 'block';
    setInterval(function(e){
      brand.style.marginLeft += 300 + 'px';
      setTimeout(function(e) {
        brand.style.color = "#fff";
      }, 1500);
    }, 1000);
  }, 1000);
}

function validateForm(form) {
  var pass = document.getElementById('pass');
  var conpass = document.getElementById('conpass');

  if (pass.value == conpass.value) {
    return true;
  } else {
    var error = document.getElementById('errorMsg');
    error.innerHTML = "Passwords do not match! Please review";
    error.style.display = "block";
    return false;
  }
}
