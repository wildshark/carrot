<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
  function makePayment() {
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
      tx_ref: "<?=$ref?>",
      amount: <?=$amount?>,
      currency: "<?=$currency?>",
      //payment_options: "account, card, mobilemoneyghana, banktransfer, ussd",
      redirect_url: "http://<?=$_SERVER['HTTP_HOST']?>/?main=pymt-verification&id=<?=$id?>&accid=<?=$_SESSION['uID']?>",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: "<?=$email?>",
        phone_number: "<?=$mobile?>",
        name: "<?=$name?>",
      },
      customizations: {
        title: "Bankash",
        description: "Take",
        logo: "http://<?=$_SERVER['HTTP_HOST']?>/img/logo.png",
      },
    });
  }

  makePayment();
</script>