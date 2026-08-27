<?php
session_start();
$userid=$_SESSION['userid'];
if($_SESSION['flag']=='')
{
    header('Location:form2.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Quiz</title>
    <link rel="stylesheet" href="conductquiz1.css">
</head>
<body>
    <div class="quiz-container">
        <h1></h1>
        <div class="question-navigation" id="question-navigation">
            <!-- Question numbers will be injected here by JavaScript -->
        </div>
        <form id="quiz-form">
            <div class="quiz-content" id="quiz-content">
                <!-- Questions will be injected here by JavaScript -->
            </div>
            <div class="navigation-buttons">
                <button type="button" id="prevBtn" onclick="prevQuestion()">Previous</button>
                <button type="button" id="nextBtn" onclick="nextQuestion()">Next</button>
                <button type="submit" id="submitBtn" onclick="calculateScore()">Submit</button>
            </div>
        </form>
        <div id="results" class="results" onclick="calculateScore()">
            
            <p id="score"></p>

            
        </div>
    </div>

    


<script>// script.js

 

let currentQuestion = 0;
const questions = [
    {
        question: " The angle of incidence is the angle between ?",
        options: {
            A: "the incident ray and the surface of the ",
            B: "the reflected ray and the surface of the mirror",
            C: "the normal to the surface and the incident ray",
            D: " the normal to the surface and the reflected ray"
        },
        correctAnswer: "C"
    },
    {
        question: " An object is placed at the centre of curvature of a concave mirror. The distance between its image and the pole is :",
        
        options: {
            A: "equal to f",
            B: "between f and 2f",
            C: "equal to 2f",
            D: "greater than 2f"
        },
        correctAnswer: "C"
    },
    {
        question: " If an incident ray passes through the centre of curvature of a spherical mirror, the reflected ray will ",
        options: {
            A: "pass through the pole",
            B: " pass through the pole",
            C: "retrace its path",
            D: "retrace its path"
        },
        correctAnswer: "C"
    },
    {
        question: "  A ray of light goes from a medium of refractive index n1 to a medium of refractive index n2. The angle of incidence is i and the angle of refraction is r. Then, sin i / sin r is equal to",
        options: {
            A: "n1",
            B: " n2",
            C: "n1/n2",
            D: "n2/n1"
        },
        correctAnswer: "D"
    },
    {
        question: "A thin lens and a spherical mirror have a focal length of +15 cm each.",
        
        options: {
            A: "Both are convex",
            B: "The lens is convex and the mirror is concave",
            C: "The lens is concave and the mirror is convex",
            D: " Both are concave"
        },
        correctAnswer: "A"
    },
    {
        question: " A convex lens forms a virtual image when an object is placed at a distance of 18 cm from it. The focal length must be",
        options: {
            A: "greater than 36 cm",
            B: "greater than 36 cm",
            C: "less than 9 cm",
            D: "less than 18 cm"
        },
        correctAnswer: "B"
    },
    {
        question: "A lens has a power of +0.5 D. It is :",
        options: {
            A: "a concave lens of focal length 5 m",
            B: "a convex lens of focal length 5 cm",
            C: "a convex lens of focal length 2 m",
            D: "a concave lens of focal length 2 m"
        },
        correctAnswer: "C"
    },
    {
        question: "What happens when copper rod is dipped in iron sulphate solution :",
        options: {
            A: "copper displaces iron",
            B: "blue colour of copper sulphate solution is obtained",
            C: "no reaction takes place",
            D: "reaction is exothermic"
        },
        correctAnswer: "C"
    },
    {
        question: " The reaction in which two compounds exchange their ions to form two new compounds is :",
        options: {
            A: "a displacement reaction",
            B: "a decomposition reaction",
            C: "an isomerization reaction",
            D: "a double displacement reaction"
        },
        correctAnswer: "D"
    },
    {
        question: "The acid used in making of vinegar is :",
        options: {
            A: "formic acid",
            B: "acetic acid",
            C: "sulphuric acid",
            D: "nitric acid"
        },
        correctAnswer: "B"
    },
    {
        question: "A solution reacts with crushed egg-shells to give a gas that turns lime-water milky. The solution contains",
        options: {
            A: "NaCI",
            B: "HCI",
            C: "LiCI",
            D: "KCI"
        },
        correctAnswer: "B"
    },
    {
        question: " Which of the following is not an atomic characteristic of metal :",
        options: {
            A: "Malleable nature",
            B: "Electropositive nature",
            C: "Ductile nature",
            D: "None of these"
        },
        correctAnswer: "D"
    },
    {
        question: "Heating of concentrated ore in absence of air for conversion into oxide ore is known as :",
        options: {
            A: "roasting",
            B: "calcination",
            C: "reduction",
            D: "none of these"
        },
        correctAnswer: "B"
    },
    {
        question: "Which reducing agent is used in chemical reduction :",
        
        options: {
            A: "C",
            B: "CO",
            C: "Al",
            D: "All of these"
        },
        correctAnswer: "D"
    },
    {
        question: "If two numbers when divided by a certain divisor give remainder 35 and 30 respectively and when their sum is divided by the same divisor, the remainder is 20, then the divisior is",
        options: {
            A: "40",
            B: "45",
            C: "50",
            D: "55"
        },
        correctAnswer: "B"
    },
    {
        question: "The least number which is a perfect square and is divisible by each of 16, 20 and 24 is :",
       
        options: {
            A: "240",
            B: "1600",
            C: "2400",
            D: "3600"
        },
        correctAnswer: "D"
    },
    {
        question: "x & y are 2 different digits. If the sum of the two digit numbers formed by using both the digits is a perfect square, then value of x+y is :",
        options: {
            A: "10",
            B: "11",
            C: "12",
            D: "13"
        },
        correctAnswer: "B"
    },
    {
        question: "The number of terms of the series 5, 7, 9, ....... that must be taken in order to have sum of 1020 is :",

        options: {
            A: "20",
            B: "30",
            C: "40",
            D: "50"
        },
        correctAnswer: "B"
    },
    {
        question: "If a,b,c,d,e,f are in A.P., then e – c is equal to :",
        
        options: {
            A: "2(c a)",
            B: "2(d c)",
            C: "2(f d)",
            D: "(d c)"
        },
        correctAnswer: "B"
    },
    {
        question: "If the nth term of an A.P. is given by an = 5n 3, then the sum of first 10 terms is :",
        options: {
            A: "225",
            B: "245",
            C: "255",
            D: "270"
        },
        correctAnswer: "B"
    },
    {
        question: "The number of observations in a group is 40. If the average of first 10 is 4.5 and that of the remaining 30 is 3.5, then the average of the whole group is :",
        options: {
            A: "1/5",
            B: "15/4",
            C: "4",
            D: "8"
        },
        correctAnswer: "B"
    },
    {
        question: "If the length of the shadow of a tower is root 3 times that of its height, then the angle of elevation of the sun is :",
        
        options: {
            A: "15 deg",
            B: "30 deg",
            C: "45 deg",
            D: "60 deg"
        },
        correctAnswer: "b"
    },
    {
        question: "The greatest possible number with which when we divide 37 and 58, leaves the respective remainder of 2 and 3, is:"
      ,
        options: {
            A: "2",
            B: "5",
            C: "10",
            D: "None of these"
        },
        correctAnswer: "B"
    },
    {
        question: "The largest possible number with which when 60 and 98 are divided, leaves the remainder 3 in each case, is",

        options: {
            A: "38",
            B: "18",
            C: "19",
            D: "None of these"
        },
        correctAnswer: "C"
    },
    {
        question: " The largest possible number with which when 38, 66 and 80 are divided the remainders remain the same is:",
        options: {
            A: "14",
            B: "7",
            C: "28",
            D: "None of these"
        },
        correctAnswer: "A"
    }
];

const totalQuestions = questions.length;

document.addEventListener("DOMContentLoaded", function() {
    const quizContent = document.getElementById("quiz-content");
    const questionNavigation = document.getElementById("question-navigation");

    // Generate questions
    for (let i = 0; i < totalQuestions; i++) {
        const questionDiv = document.createElement("div");
        questionDiv.classList.add("question");
        if (i === 0) questionDiv.classList.add("active");

        const questionObj = questions[i];
        questionDiv.innerHTML = `
            <h2>Question ${i + 1}</h2>
            <p>${questionObj.question}</p>
            <label>
                <input type="radio" name="q${i + 1}" value="A"> ${questionObj.options.A}
            </label><br>
            <label>
                <input type="radio" name="q${i + 1}" value="B"> ${questionObj.options.B}
            </label><br>
            <label>
                <input type="radio" name="q${i + 1}" value="C"> ${questionObj.options.C}
            </label><br>
            <label>
                <input type="radio" name="q${i + 1}" value="D"> ${questionObj.options.D}
            </label>
        `;
        quizContent.appendChild(questionDiv);

        // Generate question navigation numbers
        const questionNumberBtn = document.createElement("button");
        questionNumberBtn.classList.add("question-number");
        questionNumberBtn.textContent = i + 1;
        questionNumberBtn.addEventListener("click", () => {
            jumpToQuestion(i);
        });
        questionNavigation.appendChild(questionNumberBtn);
    }

    updateButtons();

    // Form submission
    document.getElementById("quiz-form").addEventListener("submit", function(event) {
        event.preventDefault();
        calculateScore();
    });
});

function nextQuestion() {
    const questions = document.querySelectorAll(".question");
    questions[currentQuestion].classList.remove("active");
    currentQuestion++;
    questions[currentQuestion].classList.add("active");
    updateButtons();
}

function prevQuestion() {
    const questions = document.querySelectorAll(".question");
    questions[currentQuestion].classList.remove("active");
    currentQuestion--;
    questions[currentQuestion].classList.add("active");
    updateButtons();
}

function jumpToQuestion(index) {
    const questions = document.querySelectorAll(".question");
    questions[currentQuestion].classList.remove("active");
    currentQuestion = index;
    questions[currentQuestion].classList.add("active");
    updateButtons();
}

function updateButtons() {
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const submitBtn = document.getElementById("submitBtn");

    if (currentQuestion === 0) {
        prevBtn.disabled = true;
    } else {
        prevBtn.disabled = false;
    }

    if (currentQuestion === totalQuestions - 1) {
        nextBtn.style.display = "none";
        submitBtn.style.display = "inline-block";
    } else {
        nextBtn.style.display = "inline-block";
        submitBtn.style.display = "none";
    }
}
function calculateScore() {
    let score = 0;
    for (let i = 0; i < totalQuestions; i++) {
        const selectedOption = document.querySelector(`input[name="q${i + 1}"]:checked`);
        if (selectedOption && selectedOption.value === questions[i].correctAnswer) {
            score++;
        }
    }

    //alert(`Your score is ${score} out of ${totalQuestions}`);

    document.getElementById("test").value=score;

    const username = localStorage.getItem('username');
    //localStorage.setItem('score', score);
    window.location.href = 'dashboard.php?id='+score;


}


</script>
<input type="hidden" name="test" id="test">
</body>
</html>
