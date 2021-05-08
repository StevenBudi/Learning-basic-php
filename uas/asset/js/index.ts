const hello = () => {
    alert("Hello")
}

const activeLink = () => {
    const elements = document.getElementsByClassName("nav-link")
    for (let index = 0; index < elements.length; index++) {
        elements[index].addEventListener("click", () => {
            const current = document.getElementsByClassName(" active")
            current[0].className = current[0].className.replace(" active", "")
            elements[index].className += " active"
        })
        
    }
}

const hidNavbar = () => {
    const element = document.getElementById("navbar")
    let pos = 0
    let currentPos = window.pageYOffset
    if(currentPos > pos/1.25){
        element.style.transition = "top 0.5s ease-in-out 0.1s"
        element.style.top = "-100px"
    }else{
        pos = currentPos
        element.style.top = "0px"
    }
}

activeLink()
window.addEventListener("scroll", hidNavbar)