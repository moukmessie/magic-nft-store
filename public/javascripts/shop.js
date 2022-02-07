
let number = undefined
let count = 0
let addToCartBtn = undefined
document.addEventListener('DOMContentLoaded', function (){
    number = document.getElementById('num-cards');
    addToCartBtn = document.getElementById('add-to-cart')
    addToCartBtn.disabled = true
    let checks = document.querySelectorAll("input[type='checkbox']")
    for (c of checks){
        c.addEventListener('change', function (e){
            if (this.checked){
                this.parentElement.parentElement.classList.add('selected')
            }else{
                this.parentElement.parentElement.classList.remove('selected')
            }
            count_selection()
        })
        c.parentElement.parentElement.addEventListener('click', function (){
            let input = this.querySelector("input[type='checkbox']") ;
            // console.log(input)
            input.checked = !input.checked ;
            if (input.checked){
                this.classList.add('selected')
            }else{
                this.classList.remove('selected')
            }
            count_selection()
        })
    }
    count_selection()
})

function count_selection(){
    let selected = document.querySelectorAll("input[type='checkbox']:checked")

    if(selected.length == 0){
        addToCartBtn.disabled = true
        number.innerHTML = '0'
    }else{
        addToCartBtn.disabled = false
        number.innerHTML = selected.length
        selected.forEach(input =>{
            console.log(input.parentElement.parentElement)
        })
    }
}
