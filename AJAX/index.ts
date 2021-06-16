const xhttp = new XMLHttpRequest()
let params : string | null
const spinner  = document.getElementById("spinner") as HTMLElement

const getOptSelectedID = (inputID: string, datalistID: string) => {
    const input = document.getElementById(inputID) as HTMLInputElement
    const elements = document.getElementById(datalistID) as HTMLDataListElement
    for (let index = 0; index < elements.options.length; index++) {
        if (elements.options[index].value === input.value) {
            return elements.options[index].getAttribute("id")
        }
    }
    return ""
}

const getCity = () => {
    params = getOptSelectedID("province", "provinceData");
    spinner.style.display = "inline"
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === xhttp.DONE) {
            const element = document.getElementById("cityData") as HTMLDataListElement
            element.innerHTML = xhttp.responseText
            
        }
    }
    xhttp.open("GET", `server.php?city=${params}`)
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8')
    xhttp.send()
}


const getDistrict = () => {
    params = getOptSelectedID("district", "districtData");
    spinner.style.display = "inline"
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === xhttp.DONE) {
            const element = document.getElementById("districtData") as HTMLDataListElement
            element.innerHTML = xhttp.responseText
            spinner.style.display = "none"
        }
    }
    xhttp.open("GET", `server.php?district=${params}`)
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8')
    xhttp.send()
}

const getResident = () => {
    params = getOptSelectedID("resident", "residentData");
    spinner.style.display = "inline"
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === xhttp.DONE){
            const element = document.getElementById("residentData") as HTMLDataListElement
            element.innerHTML = xhttp.responseText
            spinner.style.display = "none"
        }
    }
    xhttp.open("GET", `server.php?resident=${params}`)
    xhttp.setRequestHeader('Content-type','application/json; charset=utf-8')
    xhttp.send()
}