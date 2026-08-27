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
        question: "When the eye is focused on an object very far away, the focal length of the eye-lens is :",
        options: {
            A: "maximum",
            B: "minimum",
            C: "equal to that of the crystalline lens",
            D: "half its maximum focal length"
        },
        correctAnswer: "A"
    },
    {
        question: "The potential at a point is 20 V. The work done in bringing a charge of 0.5 C from infinity to this point will be :",
        
        options: {
            A: "20 J",
            B: "10 J",
            C: "5 J",
            D: "40 J"
        },
        correctAnswer: "B"
    },
    {
        question: "Joule / coulomb is the same as",
        options: {
            A: "watt",
            B: "volt",
            C: "ampere",
            D: "ohm"
        },
        correctAnswer: "B"
    },
    {
        question: "An ammeter is always connected in ....... and a voltmeter in ...... . The suitable words, in order, for the blanks are",
        options: {
            A: "series; series",
            B: "parallel; parallel",
            C: "parallel; series",
            D: "series; parallel"
        },
        correctAnswer: "D"
    },
    {
        question: "Which of the following involves electromagnetic induction ?"
        ,
        
        options: {
            A: "A rod is charged with electricity",
            B: "An electric current produces a magnetic field",
            C: "A magnetic field exerts a force on a current-carrying wire",
            D: "The relative motion between a magnet and a coil produces an electric current"
        },
        correctAnswer: "D"
    },
    {
        question: " Which of the following describes the common domestic power supplied in India ?",
        options: {
            A: "220 V, 100 Hz",
            B: "110 V, 100 Hz",
            C: "220 V, 50 Hz",
            D: "110 V, 50 Hz"
        },
        correctAnswer: "C"
    },
    {
        question: "An electric fuse can prevent accidents arising from",
        options: {
            A: "an overload but not due to a short circuit",
            B: "a short circuit but not due to an overload",
            C: "an overload as well as a short circuit",
            D: "neither an overload nor a short circuit"
        },
        correctAnswer: "C"
    },
    {
        question: "Sodium is obtained by the electrolysis of :",
        options: {
            A: "an aqueous solution of sodium chloride",
            B: "an aqueous solution of sodium hydroxide",
            C: "fused sodium chloride",
            D: "fused sodium sulphate"
        },
        correctAnswer: "C"
    },
    {
        question: "The functional group present in CH3COOC2H5 is :",
        options: {
            A: "Ketone",
            B: "Aldehyde",
            C: "Ester",
            D: "Carboxylic acid"
        },
        correctAnswer: "C"
    },
    {
        question: " The functional group present in an organic acid is :",
        options: {
            A: "–OH",
            B: "–CHO",
            C: "–COOH",
            D: ">C = O"
        },
        correctAnswer: "C"
    },
    {
        question: "Element X forms a chloride with the formula XCl2 which is a solid with a high melting point. The X would be most likely be in the same group of the Periodic Table as",
        options: {
            A: "Na",
            B: "Mg",
            C: "Al",
            D: "Si"
        },
        correctAnswer: "B"
    },
    {
        question: "The soaps are formed by the saponification of",
        options: {
            A: "Alcohols",
            B: "Simple ester",
            C: "Carboxylic acids",
            D: "Glycerides"
        },
        correctAnswer: "D"
    },
    {
        question: "The Functional group of butanone is",
        options: {
            A: "Carboxylic",
            B: "Ketone",
            C: "Aldehyde",
            D: "Alcohol"
        },
        correctAnswer: "B"
    },
    {
        question: "The rectified spirit is",
        
        options: {
            A: "50% ethanol",
            B: "80% ethanol",
            C: "95% ethanol",
            D: "40 to 50% ethanol"
        },
        correctAnswer: "C"
    },
    {
        question: "The magnetism of the bar magnet is due to",
        options: {
            A: "Earth’s magnetism",
            B: "Cosmic rays",
            C: "The spin motion of electron",
            D: "Pressure of big magnet inside the earth"
        },
        correctAnswer: "C"
    },
    {
        question: "Magnification of a concave mirror",
       
        options: {
            A: "Is always positive",
            B: "Is always negative",
            C: "Can be positive as well as negative",
            D: "Is always zero"
        },
        correctAnswer: "C"
    },
    {
        question: "A converging beam is incident on a convex lens of glass placed in air. The image formed is",
        options: {
            A: "Real, erect and enlarged",
            B: "Real, erect and diminished",
            C: "Virtual, erect and diminished",
            D: "Virtual, erect and enlarged"
        },
        correctAnswer: "B"
    },
    {
        question: "The focal length of a concave lens is 50 cm, its optical power is",

        options: {
            A: "1 D",
            B: "-2 D",
            C: "0.5 D",
            D: "-4 D"
        },
        correctAnswer: "B"
    },
    {
        question: "Two light beams of intensity I & 4I are used to interference experiment. What is the resultant intensity, when the two beams superimpose with a phase difference of p?",
        
        options: {
            A: "9I",
            B: "I",
            C: "5I",
            D: "3I"
        },
        correctAnswer: "B"
    },
    {
        question: " In a Young’s double slit experiment, the separation between the slits is doubled and the distance between the plane of slits and screen is halved. The fringe width is",
        options: {
            A: "Halved",
            B: "Doubled",
            C: "Quadrupled",
            D: "Quartered"
        },
        correctAnswer: "D"
    },
    {
        question: "In a nuclear reaction which of the following conservation is valid?",
        options: {
            A: "Charge conservation",
            B: "Energy-mass conservation",
            C: "Momentum conservation",
            D: "All of these"
        },
        correctAnswer: "D"
    },
    {
        question: "Two coherent monochromatic light beams of intensities I and 4I are superposed. The maximum and minimum possible intensities in the resulting beam are:",
        
        options: {
            A: "5I and I",
            B: "5I and 3I",
            C: "9I and I",
            D: "9I and 3I"
        },
        correctAnswer: "B"
    },
    {
        question: "How many coulomb of electricity will be consumed when 100 mA current is passed through a solution of AgNO3 for half an hour during electrolysis",
        options: {
            A: "108",
            B: "180",
            C: "1800",
            D: "18000"
        },
        correctAnswer: "B"
    },
    {
        question: "Xenon crystallizes in face centre cubic lattice and the edge of the unit cell is 620 pm, then the radius of xenon-atom is",

        options: {
            A: "438.5 pm",
            B: "219.25 pm",
            C: "536.94 pm",
            D: "265.5 pm"
        },
        correctAnswer: "B"
    },
    {
        question: " Osmotic pressure of blood is 7.40 atm at 270C. Number of mol of glucose to be used per L for an intravenous injection that is to have the same osmotic pressure as blood, is",
        options: {
            A: "0.3",
            B: "0.2",
            C: "0.1",
            D: "0.4"
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