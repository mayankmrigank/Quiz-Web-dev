<?php include("connection1.php"); ?>
<?php
$status_msg = '';
if(isset($_POST['registration']))
{
    $fname   =   $_POST['fname'] ?? '';
    $lname   =   $_POST['lname'] ?? '';
    $dob     =   $_POST['dob'] ?? '';
    $gender  =   $_POST['gender'] ?? '';
    $sno     =   $_POST['sno'] ?? '';
    $sgmail  =   $_POST['sgmail'] ?? '';
    $faname  =   $_POST['faname'] ?? '';
    $fno     =   $_POST['fno'] ?? '';
    $mname   =   $_POST['mname'] ?? '';
    $mno     =   $_POST['mno'] ?? '';
    $address =   $_POST['address'] ?? '';
    $category=   $_POST['category'] ?? '';
    $boardname=  $_POST['boardname'] ?? '';
    $roll    =   $_POST['roll'] ?? '';
    $per     =   $_POST['per'] ?? '';
    $ccl     =   $_POST['ccl'] ?? '';

    // Fixed typo in column name from the original table query assumptions
    if($conn) {
        $query = "INSERT INTO form1 (fname, lname, dob, gender, sno, student_email, faname, fno, mname, mno, address, category, boardname, roll, per, ccl) 
                  VALUES ('$fname','$lname','$dob','$gender','$sno','$sgmail','$faname','$fno','$mname','$mno','$address','$category','$boardname','$roll','$per','$ccl')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            $status_msg = '<div class="alert-box" style="background: rgba(16, 185, 129, 0.1); border-left-color: #10B981; color: #065F46; margin-bottom: 20px;"><h3>Success!</h3>Registration successful. You can now login.</div>';
        } else {
            $status_msg = '<div class="alert-box"><h3>Error</h3>Registration failed. Please try again.</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | CCL</title>
    <link rel="stylesheet" href="global-theme.css">
    <style>
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .input-group label {
            font-weight: 600;
            color: var(--text-main);
            font-size: 0.95rem;
        }
        .input-group input, .input-group select, .input-group textarea {
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }
        .input-group input:focus, .input-group select:focus, .input-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .input-group textarea {
            resize: vertical;
            min-height: 100px;
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
            margin-top: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        .full-width {
            grid-column: 1 / -1;
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
                <p>Register</p>
            </div>
        </nav>
    </header>

    <main>
        <section class="card" style="max-width: 800px; margin: 0 auto;">
            <h1 style="font-size: 2rem;">Student Registration Form</h1>
            <p class="text-center mb-4">Join the CCL Ke Lal · CCL Ki Laadli initiative</p>
            
            <?php if($status_msg != '') echo $status_msg; ?>

            <form action="form1.php" method="POST">
                <div class="form-grid">
                    <div class="input-group">
                        <label>First Name</label>
                        <input type="text" name="fname" required>
                    </div>
                    <div class="input-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" required>
                    </div>
                    <div class="input-group">
                        <label>Date Of Birth</label>
                        <input type="date" name="dob" required>
                    </div>
                    <div class="input-group">
                        <label>Gender</label>
                        <select name="gender" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Student's WhatsApp No.</label>
                        <input type="number" name="sno" required>
                    </div>
                    <div class="input-group">
                        <label>Student's Email</label>
                        <input type="email" name="sgmail" required>
                    </div>
                    <div class="input-group">
                        <label>Father's Name</label>
                        <input type="text" name="faname" required>
                    </div>
                    <div class="input-group">
                        <label>Father's Contact No.</label>
                        <input type="number" name="fno" required>
                    </div>
                    <div class="input-group">
                        <label>Mother's Name</label>
                        <input type="text" name="mname" required>
                    </div>
                    <div class="input-group">
                        <label>Mother's Contact No.</label>
                        <input type="number" name="mno" required>
                    </div>
                    <div class="input-group full-width">
                        <label>Address</label>
                        <textarea name="address" required></textarea>
                    </div>
                    <div class="input-group">
                        <label>Category</label>
                        <select name="category" required>
                            <option value="">Select</option>
                            <option value="GE">GE</option>
                            <option value="OBC">OBC</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Name Of The Board</label>
                        <select name="boardname" required>
                            <option value="">Select</option>
                            <option value="CBSE">CBSE</option>
                            <option value="ICSE">ICSE</option>
                            <option value="JAC">JAC</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>10th Roll No.</label>
                        <input type="number" name="roll" required>
                    </div>
                    <div class="input-group">
                        <label>10th Percentage</label>
                        <input type="text" name="per" required>
                    </div>
                    <div class="input-group">
                        <label>Whether son/daughter of CCL Employee</label>
                        <select name="ccl" required>
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="input-group full-width">
                        <input type="submit" value="SUBMIT REGISTRATION" class="submit-btn" name="registration">
                    </div>
                </div>
            </form>
            <p class="text-center mt-4" style="font-size: 0.95rem;">Already have an account? <a href="form2.php">Login here</a></p>
        </section>
    </main>
</body>
</html>