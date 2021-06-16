const xhttp = new XMLHttpRequest()
let params : string | null


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
    params = getOptSelectedID("city", "cityData");
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === xhttp.DONE) {
            const element = document.getElementById("districtData") as HTMLDataListElement
            element.innerHTML = xhttp.responseText
        }
    }
    xhttp.open("GET", `server.php?district=${params}`)
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8')
    xhttp.send()
}

const getResident = () => {
    params = getOptSelectedID("district", "districtData");
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === xhttp.DONE){
            const element = document.getElementById("residentData") as HTMLDataListElement
            element.innerHTML = xhttp.responseText
            console.log(xhttp.responseText)
        }
    }
    xhttp.open("GET", `server.php?resident=${params}`)
    xhttp.setRequestHeader('Content-type','application/json; charset=utf-8')
    xhttp.send()
}