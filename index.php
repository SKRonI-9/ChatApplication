<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header> Real Chat Application</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email </label>
                    <input type="text" name="email" placeholder="Email" required>
                </div>

                <div class="field input">
                    <label>Password </label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field ">
                    <label>Select Image </label>
                    <input type="file" name="image">
                </div>
                <div class="field button">
                    <input type="submit" value="Signup">
                </div>
            </form>
            <div class="link">Already sign Up? <a href="login.php">Login</a></div>
        </section>
    </div>

    <script src="pass-show-hide.js"></script>
    <script src="signup.js"></script>
    
</body>
</html> 