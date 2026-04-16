<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >

    <br>
    <form action="Checkout.php" method="POST">

    <div class="container ">
        <div class="row">
            <div class="col signbox">

            
                <h3>Payment</h3>
                <label for="cname">Name on Card:</label><br>
                <input type="text" id="cname" name="cardname" placeholder="John Doe" required><br>
                <label for="ccnum">Credit card number:</label><br>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required><br>
                <label for="expmonth">Exp Month:</label><br>
                <input type="int" id="expmonth" name="expmonth" placeholder="03" required><br>
                <label for="expyear">Exp Year:</label><br>
                <input type="int" id="expyear" name="expyear" placeholder="26" required>
                <div class="mb-3 mt-3">
                    <label for="cvv">CVV:</label><br>
                    <input type="text" id="cvv" name="cvv" placeholder="352" required>
                </div>
            </div>

            <div class="col textbox">



    <div class="container ">
        <div class="row">
            
                <div class="col-md-3">
                <div class="mb-4">
                
                <h3>Address</h3>
                <label for="address">Home address:</label><br>
                <input type="text" id="address" name="address" placeholder="10 Station Bolvevard" required><br>
                <label for="county">County:</label><br>
                <input type="text" id="county" name="county" placeholder="Leicestershire" required><br>
                <label for="city">City:</label><br>
                <input type="text" id="city" name="city" placeholder="Leicester" required><br>
                <label for="zip">Zip code:</label><br>
                <input type="text" id="zip" name="zip" placeholder="LT12 3ZA" required>
                </div>
                
                </div>
                </div>

    


    </div>
        </div>
    
    <div class="col signbox">
        <h3>Delivery option</h3>

        <div class="mb-3">
       <select name="DeliveryOption" class="form-control">
            <option value="Delivery">Delivery</option>
            <option value="Collection">Collection</option>
       </select>
    </div>
    
    

    </div>
  <button type="submit">Confirm payment</button>  
    </div>

    </div>


    </form>


</main>
<?php include 'Footer.php'; ?>



</body>