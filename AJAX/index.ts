const xhttp = new XMLHttpRequest()
let params

const getOptSelectedID = (inputID : string, datalistID : string) => {
    const input = document.getElementById(inputID) as HTMLInputElement
    const elements = document.getElementById(datalistID) as HTMLDataListElement
    for (let index = 0; index < elements.options.length; index++) {
        if(elements.options[index].value === input.value){
            return elements.options[index].getAttribute("id")
        }
    }
    return ""
}

const getCity = () => {
    params = getOptSelectedID("province", "provinceData");
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === xhttp.DONE){
            if(xhttp.response === "OK")
            // Append result to datalist/select
            console.log(xhttp.response)
        }

    }
    xhttp.open("CITY", "./server.php")
    xhttp.setRequestHeader('Content-type','application/json; charset=utf-8')
    xhttp.send()
}


const getDistrict = () => {
    console.log("District")
}

const getResident = () => {
    console.log("Resident")
}