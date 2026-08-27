<?php  
error_reporting(E_ERROR | E_PARSE);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationform";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$status_msg = '';

if(isset($_POST['submit_status']) && $_POST['submit_status'] == 1)
{
    $email = $_POST['sgmail'];  
    $dob = $_POST['dob'];  
      
    $sql = "select * from form1 where student_email = '$email' and dob = '$dob'";  
    $result = mysqli_query($conn, $sql);  
    if($result) {
        $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
            session_start();
            $_SESSION['flag'] = 1; 
            $_SESSION['userid'] = $email; 
            header('Location: register.php');
            exit();
        } else {  
            $status_msg = '<div class="alert-box" style="margin-bottom: 20px;"><h3>Login Failed</h3>Invalid Email or Date of Birth.</div>';  
        }  
    } else {
        $status_msg = '<div class="alert-box" style="margin-bottom: 20px;"><h3>Database Error</h3>Could not connect or table missing. Please ensure database is setup via XAMPP.</div>';
    }
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login | CCL</title>
    <link rel="stylesheet" href="global-theme.css">
    <style>
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }
        .input-group label {
            font-weight: 600;
            color: var(--text-main);
            font-size: 0.95rem;
        }
        .input-group input {
            padding: 14px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }
        .input-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .submit-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="left">
                <a href="index.html"><img src="CCL_LOGO2_final.jpg" alt="CCL Logo"></a>
                <img src="ccl-ke-lal-ccl-ki-laadli.jpg" alt="CCL Ke Lal Logo">
            </div>
            <div class="right">
                <p>Login</p>
            </div>
        </nav>
    </header>

    <main>
        <section class="card" style="max-width: 500px; margin: 0 auto; margin-top: 40px;">
            <h1 style="font-size: 2rem;">Student Login</h1>
            <p class="text-center mb-4">Welcome back to the portal</p>
            
            <?php if ($status_msg != '') { echo $status_msg; } ?>

            <form action="form2.php" method="post">
                <div class="input-group">
                    <label>User ID (Student's Email)</label>
                    <input type="email" id="emailid" name="sgmail" required placeholder="example@email.com">
                </div>
    
                <div class="input-group">
                    <label>Password (Student's DOB)</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
    
                <div class="input-group">
                    <input type="hidden" id="submit_status" name="submit_status" value="1">
                    <button type="submit" class="submit-btn">Login to Dashboard</button>
                </div>
            </form>
            
            <p class="text-center mt-4" style="font-size: 0.95rem;">Don't have an account? <a href="form1.php">Register here</a></p>
        </section>
    </main>
</body>
</html>