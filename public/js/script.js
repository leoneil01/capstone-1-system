let links = document.querySelectorAll(".sidenav li");

function activeLink(){
    links.forEach((item) => {
        item.classList.remove("hovered");
    });

    this.classList.add("hovered");
}

links.forEach((item) => item.addEventListener("mouseover", activeLink))