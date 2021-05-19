const statusChange = () => {
    const element = document.getElementById("reser_status") as HTMLSelectElement
    const opt = element.options[element.selectedIndex]
    alert(opt.value)
}