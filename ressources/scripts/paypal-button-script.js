shopcart = JSON.parse(localStorage["sca"].toString());
console.log(shopcart);
totalPanier = 0;
total_qte = 0;
let now = new Date();

for(i=0;i<shopcart.length;i++){
  if(parseInt(shopcart[i]['qty']) > 1){
    total_qte = parseInt(shopcart[i]['price']) * parseInt(shopcart[i]['qty'])
    totalPanier += total_qte;
  } else {
    totalPanier += parseInt(shopcart[i]['price']);
  }
}
// document.getElementById("montant-total").innerHTML = "Montant total: " + totalPanier + "$";
//document.getElementById("montant-total").innerHTML = "Montant total: " + totalPanier + " $";

function initPayPalButton() {
  paypal.Buttons({
    style: {
      shape: 'rect',
      color: 'gold',
      layout: 'vertical',
      label: 'paypal',
      
    },

    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{"amount":{"currency_code":"USD","value":totalPanier}}]
      });
    },


    onApprove : function (data, actions) {
      return actions.order.capture().then(function(details) {
        console.log(details);
        shopcart = [];
        localStorage["sca"] = JSON.stringify(shopcart);
        createCookie("price", totalPanier, "1");
        createCookie("orderid", details.id, "1");
        createCookie("quantity", "1", "1");
        window.location.assign("../../pages/approuvepayment.php");
      });
    }
  }).render('#paypal-button-container');
}
initPayPalButton();
function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
}