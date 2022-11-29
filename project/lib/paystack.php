<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    function payWithPaystack() {
        let handler = PaystackPop.setup({

            key: 'pk_live_345e8f9ea1a9346f428cea539c0efb2024d6e90c', // Replace with your public key
            email: 'andyquayegh@outlook.com',
            amount: 20 * 100,
            ref: 'FWME-'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            currency: 'GHS',
            // label: "Optional string that replaces customer email"
            onClose: function(){

                alert('Window closed.');

            },

            callback: function(response){

                let message = 'Payment complete! Reference: ' + response.reference;
                alert(message);

            }
        });
    handler.openIframe();
    }
payWithPaystack();
</script>