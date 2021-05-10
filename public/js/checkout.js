let plus = document.getElementsByClassName('plusQuantity')
let minus = document.getElementsByClassName('minusQuantity')
let periodic = document.getElementsByClassName('periodic')



for(let i = 0; i < plus.length; i++){
    plus[i].addEventListener('click', addQuantity)
}

for(let i = 0; i < minus.length; i++){
    minus[i].addEventListener('click', removeQuantity)
}

for(let i = 0; i < periodic.length; i++){
    periodic[i].addEventListener('click', updatePeriodic)
}



function addQuantity(event){
    
    let btn = event.target
    let display = btn.parentNode.parentNode.childNodes[1].childNodes[1]
    let input = btn.parentNode.parentNode.childNodes[1].childNodes[3];
    let nr = input.id.split('_')[1]
    
    let previousQuantity = display.innerHTML.split(' ')[1]
     
    display.innerHTML = "Total: " + (parseInt(previousQuantity) + 1)
    input.value = parseInt(input.value) + 1

    updatePrice(parseFloat(document.getElementById('price_' + nr).value))

}

function removeQuantity(event){
    
    let btn = event.target
    let display = btn.parentNode.parentNode.childNodes[1].childNodes[1]
    let input = btn.parentNode.parentNode.childNodes[1].childNodes[3];
    let nr = input.id.split('_')[1]

    let previousQuantity = parseInt(display.innerHTML.split(' ')[1])

    display.innerHTML = "Total: " + Math.max(previousQuantity - 1, 0)
    input.value = Math.max((parseInt(input.value) - 1), 0)

    if(previousQuantity !== 0)
        updatePrice(-parseFloat(document.getElementById('price_' + nr).value))
}

function updatePrice(price){
    let totalPrice = document.getElementById('total_price')

    totalPrice.innerHTML = 'Total: ' + (parseFloat(totalPrice.innerHTML.split(' ')[1]) + price).toFixed(2) + '€'
}

function updatePeriodic(event){
    let periodicInput = document.getElementById('periodic')
    console.log(event.target)
    periodicInput.value = event.target.getAttribute('name')
}




