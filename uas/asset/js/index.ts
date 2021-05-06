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
activeLink()