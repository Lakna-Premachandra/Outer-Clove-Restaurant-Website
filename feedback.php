<?php
include('include-files/header.php');
?> 
<?php


if (isset($_POST['submit_feedback'])) {
    // Check for empty fields
    if (empty($_POST['customer_name']) || empty($_POST['customer_email']) ||  empty($_POST['comments']) ) {
        $_SESSION['feedback_error'] = '<div>All fields are required. Please fill in all the fields.</div>';
        header('location: feedback.php');
        exit();
    }

    // Validate email
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['feedback_error'] = '<div>Invalid email address. Please enter a valid email.</div>';
        header('location: feedback.php');
        exit();
    }

    // Process feedback data
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $feedback_text = mysqli_real_escape_string($conn, $_POST['comments']);

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (customer_name, customer_email, feedback_text) VALUES ('$customer_name', '$customer_email',  '$feedback_text')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div style='background-color:green; position:absolute;top:300px;left:770px; color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Feedback Submitted Successfully</div>";
        
    } else {
        echo  "<div style='background-color:red; position:absolute;top:300px;left:800px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;' class='msg'>Failed to Submit Feedback..!!</div>";
       
    }
}
?>

     
<!DOCTYPE html>
<html lang="en">

<head>
    
    <style>

    .carousel-slide{
        display: none;
    }
 
    #form{
        display: flex;
        flex-direction: column;
        padding: 1rem;
        /* border: 1px solid red; */
        background-color: #E32636;
        border-radius: 10px;
        width: 300px;
        height: 360px;
    } 

   
    label{
        font-size: 1.5rem;
    } 
    .map{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 1rem;
        background-color: #222831;
    }

    iframe{
           margin-bottom: 7rem;
    }
     input {
            padding: 0.7rem;
            margin-bottom: 1rem;
        }

        textarea {
            padding: 0.7rem;
            margin-bottom: 1rem;
        }

        button{
            padding: 0.8rem;
            background-color: #FF8C00;
            color: black;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            margin-top: 1rem;

        }
        .feedback{
           
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
      url(images/restaurant-3.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
    height: 1700px;
  }
        

    
   </style>
</head>

<body>

    <section class="feedback">

        <div style=" display:flex;flex-direction:column; margin:0;height:700px;" class="container">
        <h2 style="color:whitesmoke;text-align:center; margin:0;">Restaurant Feedback Form</h2>

            <form id="form" action="" method="post">
              
                <input style="width: 270px;" type="text" name="customer_name" placeholder="Customer Name" required>



               
                <input style="width: 270px;" type="email" name="customer_email" placeholder="Email" required>




                <textarea name="comments" rows="5" placeholder="Feedback" required></textarea>

               

                <button type="submit" name="submit_feedback">Submit Feedback</button>


            </form>
         
            
        </div>

        <div class="map">
      <h3 style="color: whitesmoke; margin:2rem;" >Our Location</h3>
    
		<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3960.8321743448223!2d79.84593407468942!3d6.910660993088803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTQnMzguNCJOIDc5wrA1MCc1NC42IkU!5e0!3m2!1sen!2slk!4v1690349688938!5m2!1sen!2slk" width="80%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </section>

</body>

</html>
<?php
include('include-files/footer.php');
?>