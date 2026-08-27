<?php
session_start();
if(!isset($_SESSION['flag']) || $_SESSION['flag'] != 1) {
    header('Location: form2.php');
    exit();
}
$userid = $_SESSION['userid'];
$score = isset($_GET['id']) ? $_GET['id'] : 0;

include 'connection1.php';
if ($conn) {
    // Basic protection against SQL injection
    $safe_userid = mysqli_real_escape_string($conn, $userid);
    $safe_score = mysqli_real_escape_string($conn, $score);
    
    $query = "INSERT INTO result (student_email, test) VALUES ('$safe_userid', '$safe_score')";
    mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Dashboard | CCL</title>
    <link rel="stylesheet" href="global-theme.css">
</head>
<body>
    <header>
        <nav>
            <div class="left">
                <a href="index.html"><img src="CCL_LOGO2_final.jpg" alt="CCL Logo"></a>
                <img src="ccl-ke-lal-ccl-ki-laadli.jpg" alt="CCL Ke Lal Logo">
            </div>
            <div class="right">
                <a href="register.php" style="color: white; font-size: 1.1rem; margin-right: 15px;">Dashboard</a>
                <a href="logout.php" style="color: white; font-size: 1.1rem; border: 1px solid white; padding: 5px 15px; border-radius: 8px;">Logout</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="card text-center" style="max-width: 600px; margin: 40px auto;">
            <h1>Quiz Submitted Successfully!</h1>
            <div class="mt-4" style="background: rgba(79, 70, 229, 0.1); padding: 30px; border-radius: 12px; border: 1px solid var(--primary-light);">
                <h2 style="color: var(--text-main); margin-bottom: 10px;">Your Score</h2>
                <p style="font-size: 3rem; font-weight: 700; color: var(--primary); margin: 0; line-height: 1;"><?php echo htmlspecialchars($score); ?></p>
            </div>
            
            <a href="register.php" class="mt-4" style="display: inline-block; background: var(--primary); color: white; padding: 12px 24px; border-radius: 8px; font-weight: 600; text-decoration: none;">Return to Dashboard</a>
        </section>
    </main>
</body>
</html>
