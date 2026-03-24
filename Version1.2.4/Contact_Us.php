<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >
<div class="container signbox">
    <br>
    <form action="#">
    <div class="mb-3 mt-3">
        <label for="FName" class="form-label">First Name:</label>
        <input type="FName" class="form-control" id="FName" placeholder="Enter first name" name="FName">
    </div>
    <div class="mb-3 mt-3">
        <label for="LName" class="form-label">Last Name:</label>
        <input type="LName" class="form-control" id="LName" placeholder="Enter last name" name="LName">
    </div>    
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
        <label for="phonenumber" class="form-label">Phone number:</label>
        <input type="phonenumber" class="form-control" id="phonenumber" placeholder="Enter phone number" name="phonenumber">
    </div>
    <div class="mb-3">
        <label for="comment">Reason for enquiry:</label>
        <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
    </div>
    <button type="submit" class="btn btn-success  ">Submit</button>
    <br><br>
    </form>
</div>
</main>
<?php include 'Footer.php'; ?>



</body>