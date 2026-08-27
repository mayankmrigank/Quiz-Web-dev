<?php
session_start();
if(!isset($_SESSION['flag']) || $_SESSION['flag'] != 1) {
    header('Location: form2.php');
    exit();
}
$userid = $_SESSION['userid'];

// Fetch previous quiz scores
include 'connection1.php';
$scores = [];
if ($conn) {
    $safe_userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT test, submitted_at FROM result WHERE student_email = '$safe_userid' ORDER BY submitted_at DESC";
    $result_data = mysqli_query($conn, $query);
    if ($result_data) {
        while ($row = mysqli_fetch_assoc($result_data)) {
            $scores[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | CCL</title>
    <link rel="stylesheet" href="global-theme.css">
    <style>
        .quiz-card {
            background: var(--white);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .quiz-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }
        .quiz-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
            transition: box-shadow 0.3s ease;
        }
        .quiz-btn:hover {
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }
        .score-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .score-table th, .score-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #E5E7EB;
        }
        .score-table th {
            background-color: var(--primary-light);
            color: white;
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
                <a href="logout.php" style="color: white; font-size: 1.1rem; border: 1px solid white; padding: 5px 15px; border-radius: 8px;">Logout</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="card text-center" style="margin-bottom: 20px; background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%); border: none;">
            <h1 style="margin-bottom: 10px;">Welcome Students!</h1>
            <p style="font-size: 1.2rem; color: var(--primary); font-weight: 600;">Dashboard for: <?php echo htmlspecialchars($userid); ?></p>
        </section>

        <section class="card" style="margin-bottom: 20px;">
            <h2 class="text-center">Your Past Quiz Scores</h2>
            <?php if (count($scores) > 0): ?>
                <table class="score-table">
                    <thead>
                        <tr>
                            <th>Score</th>
                            <th>Date & Time Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($scores as $s): ?>
                            <tr>
                                <td><strong style="color: var(--primary); font-size: 1.2rem;"><?php echo htmlspecialchars($s['test']); ?></strong></td>
                                <td><?php echo htmlspecialchars($s['submitted_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center mt-4">You have not taken any quizzes yet.</p>
            <?php endif; ?>
        </section>

        <div class="grid-2">
            <div class="quiz-card">
                <h2 style="color: var(--primary);">Quiz 1</h2>
                <p class="mt-4">Test your knowledge with Quiz 1.</p>
                <button class="quiz-btn" onclick="location.href='Quiz1.php'">Start Quiz 1</button>
            </div>
            <div class="quiz-card">
                <h2 style="color: var(--secondary);">Quiz 2</h2>
                <p class="mt-4">Challenge yourself with Quiz 2.</p>
                <button class="quiz-btn" onclick="location.href='Quiz2.php'">Start Quiz 2</button>
            </div>
        </div>
    </main>
</body>
</html>