<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; 

?>

<main class="flex-grow-1 pt-5 pb-5 body" >
<div class="container signbox">
    <br>
    <form action="#">
    <div class="mb-3 mt-3">
        <label for="text" class="form-label">First Name:</label>
        <?php 
        if (isset($_SESSION["customer"])) {
            ?>
        <input type="text" class="form-control" id="FName" value="<?php echo $_SESSION['customer']['FirstName'] ?>">
        <?php
        } else {
            ?>
        <input type="text" class="form-control" id="FName" placeholder="Enter your first name" name="FName">
        <?php } ?>
 
    </div>
    <div class="mb-3 mt-3">
        <label for="text" class="form-label">Last Name:</label>
        <?php 
        if (isset($_SESSION["customer"])) {
            ?>
        <input type="text" class="form-control" id="LName" value="<?php echo $_SESSION['customer']['LastName'] ?>">
        <?php
        } else {
            ?>
        <input type="text" class="form-control" id="LName" placeholder="Enter your last name" name="LName">
        <?php } ?>
    </div>    
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <?php 
        if (isset($_SESSION["customer"])) {
            ?>
        <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['customer']['Email'] ?>">
        <?php
        } else {
            ?>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
        <?php } ?>
    </div>
    <div class="mb-3">
        <label for="phonenumber" class="form-label">Phone number:</label>
        <?php 
        if (isset($_SESSION["customer"])) {
            ?>
        <input type="phonenumber" class="form-control" id="phonenumber" value="<?php echo $_SESSION['customer']['PhoneNumber'] ?>">
        <?php
        } else {
            ?>
        <input type="phonenumber" class="form-control" id="phonenumber" placeholder="Enter your phone number" name="phonenumber">
        <?php } ?>
    </div>
    <div class="mb-3">
        <label for="comment">Reason for enquiry:</label>
        <textarea class="form-control" rows="5" id="comment" name="text" placeholder="..."></textarea>
    </div>
    <button type="submit" class="btn btn-success  ">Submit</button>
    <br><br>
    </form>
</div>
</main>
<?php include 'Footer.php'; ?>



</body>