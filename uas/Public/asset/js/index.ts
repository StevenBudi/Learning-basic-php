const includeHTML = () => {
    const elements = document.getElementsByTagName("div")
    for (let index = 0; index < elements.length; index++) {
        const element = elements[index];
        const file = element.getAttribute("include")
        

        if (file){
            const xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState === 4){
                    if(xhttp.statusText == "OK"){element.innerHTML = xhttp.responseText}
                    if(xhttp.status === 400){element.innerHTML = "Not Working"}
                    else{console.log(xhttp.status + xhttp.statusText + xhttp.responseText)}
                    element.removeAttribute("include")
                    element.parentNode.replaceChild
                    includeHTML()
                }
            }
            xhttp.open("GET", file, true)
            xhttp.send()
            return
        }else{
            console.log("File Not Found")
        }
    }
}

includeHTML()