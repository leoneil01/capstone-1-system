let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".sidenav");
let main = document.querySelector(".admin-page");
let logo_title = document.querySelector(".logo-title");
let logo = document.querySelector(".logo")

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle('active');
    logo_title.classList.toggle('hide');
    logo.classList.toggle('active')
}