const statusChange = (id) => {
    console.log(id)
    const element  = document.getElementById(id) as HTMLSelectElement
    const opt = element.options[element.selectedIndex]
    alert(opt.value)
}