var price = document.getElementsByClassName('price');
var quantity = document.getElementsByClassName('quantity');
var total = document.getElementsByClassName('total');
var grandTotal = document.getElementById('grandtotal');

var sum=0;

function calcTotal()
{
    
    for(i=0;i<price.length;i++)
    {
        total[i].innerHTML = (price[i].value)*(quantity[i].value);
        sum+=(price[i].value)*(quantity[i].value);
    }
    grandTotal.innerHTML=sum;
}



calcTotal();

