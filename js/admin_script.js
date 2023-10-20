document.getElementById('user-btn').addEventListener('click', function() {
    document.querySelector('.account-box').classList.toggle('active');
});

var accountBox = document.querySelector('.account-box');
var closeBtn = document.querySelector('.close-btn');


closeBtn.addEventListener('click', function() {
    accountBox.classList.remove('active');
});


accountBox.addEventListener('click', function(event) {
    event.stopPropagation();
});


document.addEventListener("DOMContentLoaded", function() {
    var menuBtn = document.getElementById("menu-btn");
    var navbar = document.querySelector(".header .flex .navbar");
  
    menuBtn.addEventListener("click", function() {
      navbar.classList.toggle("active");
    });
  
    window.addEventListener("resize", function() {
      if (window.innerWidth > 768) {
        navbar.classList.remove("active");
      }
    });
  });
  document.querySelector('#close-update').onclick = () =>{
    document.querySelector('.edit-product-form').style.display = 'none';
    window.location.href = 'admin_products.php';
 }