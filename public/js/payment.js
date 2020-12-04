var offer = document.getElementById("offer").innerHTML;
var price = document.getElementById("price").innerHTML;
var seller = document.getElementById("seller").innerHTML;
console.log(price);
paypal.Buttons({
    createOrder: function (data, actions) {
        return actions.order.create({
            redirect_urls: {
                return_url:'http://localhost/user'
            },
            purchase_units: [{
                description: seller,
                amount: {
                    value: price
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.href = "/paymentsuccess?orderID="+data.orderID+"&offerID="+offer;
        })
    },
    onCancel: function (data) {
        window.location.href = "?payment=cancelled";
    }
}).render('#paypal-payment-button');