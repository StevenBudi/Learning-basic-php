const xhttp = new XMLHttpRequest()


const getCity = () => {
    console.log("City")
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === xhttp.DONE){
            if(xhttp.response === "OK")
            // Append result to datalist/select
            console.log(xhttp.response)
        }

    }
    const param = "" // ID of selected value / selected value
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