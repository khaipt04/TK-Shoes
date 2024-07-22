// document.addEventListener("DOMContentLoaded", function() {
//   const buttons = document.querySelectorAll('.btn');
//   buttons.forEach(button => {
//     button.addEventListener('click', function() {
//       // Loại bỏ class 'active' từ tất cả các nút
//       buttons.forEach(btn => btn.classList.remove('active'));
//       // Thêm class 'active' cho nút đã được nhấp vào
//       this.classList.add('active');
//     });
//   });
// });

const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});


