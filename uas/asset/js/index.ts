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
    try {
        const element = document.getElementById("navbar")
        let pos = 0
        let currentPos = window.pageYOffset
        const toggler = document.getElementById("navbar-toggler")
        const collapsedUl = document.getElementById("navbarTogglerDemo02")
        if(currentPos > pos/1.25){
            element.style.transition = "top 0.5s ease-in-out 0.1s"
            element.style.top = "-100px"
            if(toggler && collapsedUl && window.screen.width < 1280){
                toggler.className = "navbar-toggler collapsed"
                collapsedUl.className = "navbar-collapse collapse" 
            }
            
        }else{
            pos = currentPos
            element.style.top = "0px"
        }
    } catch (error) {
        console.error();
    }
}

window.onload = () => {
    activeLink()
}
window.addEventListener("scroll", hidNavbar)