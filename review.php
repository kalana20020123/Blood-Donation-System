<?php
session_start();
?>
<?php
        
        include_once 'db.php';
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $rating = $_POST['rating'];
            $review = $_POST['review'];

            // Validate the form data ,check submit or not
            if (empty($name) || empty($email) || empty($rating) || empty($review)) {
                echo "Please fill in all fields.";
            }
                    // Prepare and execute the SQL statement to insert the reviews
                    $query = "INSERT INTO reviews (name, email, rating, review) VALUES ('$name', '$email', '$rating', '$review')";
                    $result = mysqli_query($con, $query);

                    // Check if the insertion was successful
                    if ($result) {
                        echo "Review submitted successfully.";
                        mysqli_close($con);
                        echo '<script>alert("Review submitted successfully.");</script>';
                        echo '<script>window.location.href = "review.php";</script>';
                        exit;
                    } else {
                        echo "Error submitting the review.";
                    }

                    // Close the database connection
                    mysqli_close($con);
                }
            
      ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Blood Donating System | Review Page</title>
    <!--link css file-->
    <link rel="stylesheet" href="headerandfooter.css">
    
</head>
<body>

<header>
    <nav>
      <div class="logo">
        <h1>Blood Donating System</h1>
        <img src="logo.jpg" class = "img1"  alt="Blood Donating System Logo" height="50px" width="50px">
        
      </div>
      <ul class="menu">
        <li><a href="homepage.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Donate</a></li>
        <li><a href="#">View Center</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">View Camps</a></li>
      </ul>
    </nav>
  </header>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe world | Review Page</title>
    <!--link css file-->
    <link rel="stylesheet" href="test.css">
    
</head>
<body>

    <br>
    <div class="containerR">
        <h1>Write a Review</h1>
        
        <!--strat form-->
        
        <form method="POST" action="review.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>
            <div class="form-group">
                <label for="review">Review:</label>
                <textarea id="review" name="review" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
        <!--end form-->

    </div>
    </div>

    <div class="containerreviwe">
        <h1 style=" background-color:white; border-radius:10px ;">Reviews</h1>
        <?php include_once ('displayReviews.php'); ?>
            </div>   

        
</body>
</html>
<!--include footer-->

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe world | Review Page</title>
    <!--link css file-->
    <link rel="stylesheet" href="headerandfooter.css">
    
</head>
<body>

<footer>
  <div class="container1">
    <div class="footer-links">
      <a href="">Contact Us |</a>
      <a href="">Privacy Policy |</a>
      <a href="">Terms and Conditions |</a>
      <a href="">Cookies |</a>
      <a href="">FAQ</a>
    </div>
    <div class="footer-info">
      <img class = "lgo" src="logo.jpg" alt="Your Website Logo" height = "60px">
      <p  class = "copy">&copy; 2023 SBTS. All Rights Reserved.</p>
    </div>
  </div>
</footer>
</body>
</html>
