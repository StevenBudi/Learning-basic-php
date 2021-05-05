const includeHTML = () => {
    const elements = document.getElementsByTagName("*")
    for (let index = 0; index < elements.length; index++) {
        const element = elements[index];
        const file = element.getAttribute("include")

        if (file){
            const xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = () => {
                if (this.readyState === 4){
                    if(this.status === "200" ){element.innerHTML = this.responseText}
                    if(this.status === "400") {element.innerHTML = "Element Not Found"}
                    else{console.log(this.status)}
                    element.removeAttribute("include")
                    includeHTML()
                }
            }
            xhttp.open("GET", file, true)
            xhttp.send()
            return
        }
    }
}

includeHTML()