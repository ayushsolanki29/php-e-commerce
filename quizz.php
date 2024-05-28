<!DOCTYPE html>
<html lang="en">

<head>
    <!--- primary meta tag-->
    <title>E Learning - The  Best Program to Enroll for Exchange</title>
    <meta name="title" content="EduWeb - The Best Program to Enroll for Exchange">
    <meta name="description" content="This is an education html template made by codewithsadee">
    <?php include 'pages/header.php' ?>
    <style>
        .quizz_app {
            background: #fff;
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            border-radius: 10px;
            padding: 10px;
        }

        .quizz_app h1 {
            font-size: 25px;
            color: #001e4d;
            font-weight: 600;
            border-bottom: 1px solid #333;
            padding-bottom: 30px;
        }

        .quizz_app .quiz {
            padding: 20px 0;
        }

        .quizz_app .quiz h2 {
            font-size: 18px;
            color: #001e4d;
            font-weight: 600;

        }

        .quizz_app .btn {
            background: #fff;
            color: #222;
            font-weight: 500;
            width: 100%;
            border: 1px solid #222;
            padding: 10px;
            margin: 10px 0;
            text-align: left;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s ease;

        }

        .quizz_app .btn:hover:not([disabled]) {
            background: #222;
            color: #fff;

        }

        .quizz_app .btn:disabled {
            cursor: no-drop;
        }

        #timer {
            display: block;
            color: red;
        }

        .quizz_app #next-btn {
            background: #001e4d;
            color: #fff;
            font-weight: 500;
            width: 150px;
            border: 0;
            padding: 10px;
            margin: 20px auto 0;
            border-radius: 5px;
            cursor: pointer;
            display: none;

        }

        .quizz_app #submit-btn {
            background: #001e4d;
            color: #fff;
            font-weight: 200;
            font-size: 12px;
            width: 150px;
            border: 0;
            padding: 10px;
            margin: 20px auto 0;
            border-radius: 5px;
            cursor: pointer;
            display: none;

        }



        .quizz_app .correct {
            background: #9aeabc;

        }

        .quizz_app .incorrect {
            background: #ff9393;
        }

        @media screen and (max-width: 768px) {
            .quizz_app {
                width: 100%;
                margin: 20px auto;
                padding: 10px;
            }

            .quizz_app h1 {
                font-size: 20px;
            }

            .quizz_app .quiz h2 {
                font-size: 16px;
            }
        }

        @media screen and (max-width: 650px) {
            .quizz_app {
                width: 70%;
                margin: 40px;

                padding: 10px;
            }

            .quizz_app h1 {
                font-size: 20px;
            }

            .quizz_app .quiz h2 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body id="top">

    <!-- 
    - #HEADER
  -->
    <?php include 'pages/navabar.php' ?>
    <?php
    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];
        $sql = "SELECT * FROM questions WHERE cource_id='$cid'";
        $questions_result = $con->query($sql);

        $questions = array();

        if ($questions_result->num_rows > 0) {
            while ($row = $questions_result->fetch_assoc()) {
                $question = array(
                    "question" => array($row['qno'] . "."  . $row['question']),
                    "answers" => array(
                        array("text" => $row['ans1'], "correct" => $row['correct_answer'] == 1),
                        array("text" => $row['ans2'], "correct" => $row['correct_answer'] == 2),
                        array("text" => $row['ans3'], "correct" => $row['correct_answer'] == 3),
                        array("text" => $row['ans4'], "correct" => $row['correct_answer'] == 4)
                    )
                );
                $questions_count = count($questions);
                array_push($questions, $question);
            }
        }
        $questions_count = count($questions);
        echo $questions_count;
    } else {
        header("location:index.php");
        exit;
    }

    ?>
    <main>
   
        <article>
            <section class="section blog has-bg-image" id="blog" aria-label="blog" style="background-image: url('./assets/images/blog-bg.svg')">
                <div class="container">
                    <div class="quizz_app">
                        <?php
                        $cid = $_GET['cid'];
                        $select_title = "SELECT * FROM `courses` WHERE `id`='$cid '";
                        $run_cources = mysqli_query($con, $select_title);

                        if (!mysqli_num_rows($run_cources) > 0) {
                            header("location:cources.php");
                            exit;
                        }
                        while ($row_cource = mysqli_fetch_array($run_cources)) { ?>
                            <h1><?= $row_cource['title'] ?> <br>Total <?= $questions_count ?> Questions : </h1>
                            
                            <div class="quiz">
                                <h2 id="question">Your Question is here</h2>
                                <div id="answer-buttons">
                                    <button class="btn">Answer1</button>
                                    <button class="btn">Answer2</button>
                                    <button class="btn">Answer3</button>
                                    <button class="btn">Answer4</button>
                                </div>
                                <button id="next-btn">Next</button>


                                <p id="timer">Time Left: <strong id="countdown"></strong> S</p>
                                <button id="submit-btn"> submit quizz</button>

                            </div>
                        <?php
                            $con->close();
                        } ?>

                    </div>

                    <!-- JavaScript  -->
                    <script>
                        let cource_id_new = '<?php echo $cid; ?>';
                        const questions = <?php echo json_encode($questions); ?>;
                        const questions_count = <?php echo json_encode($questions_count); ?>;
                        const questionElement = document.getElementById("question");
                        const answerButtons = document.getElementById("answer-buttons");
                        const nextButton = document.getElementById("next-btn");
                        const submitButton = document.getElementById("submit-btn");
                        const timerElement = document.getElementById("timer");
                        const countdownElement = document.getElementById("countdown");
                        let currentQuestionIndex = 0;
                        let score = 0;
                        let timeLeft = questions_count * 20;

                        let timerInterval;




                        //  start the timer
                        function startTimer() {
                            timerInterval = setInterval(() => {
                                timeLeft--;
                                countdownElement.textContent = timeLeft;

                                if (timeLeft === 0) {
                                    clearInterval(timerInterval);
                                    hideNextButton();
                                    showSubmitButton();
                                    showScore();
                                }
                            }, 1000);
                        }

                        // stop the timer
                        function stopTimer() {
                            clearInterval(timerInterval);
                        }

                        //  hide the Next button
                        function hideNextButton() {
                            nextButton.style.display = "none";
                        }

                        //  hide the submit button
                        function hideSubmitButton() {
                            submitButton.style.display = "none";
                        }

                        // show the Next button
                        function showNextButton() {
                            nextButton.style.display = "block";
                        }
                        //  show the Sumit button
                        function showSubmitButton() {
                            submitButton.style.display = "block";
                        }

                        //  show a question
                        function showQuestion() {
                            resetState();
                            const currentQuestion = questions[currentQuestionIndex];
                            questionElement.innerHTML = currentQuestion.question;
                            currentQuestion.answers.forEach((answer, index) => {
                                const button = document.createElement("button");
                                button.innerHTML = answer.text;
                                button.classList.add("btn");
                                button.addEventListener("click", () => selectAnswer(index));
                                answerButtons.appendChild(button);
                            });
                            startTimer();
                        }

                        //  reset the answer buttons
                        function resetState() {
                            while (answerButtons.firstChild) {
                                answerButtons.removeChild(answerButtons.firstChild);
                            }
                            countdownElement.textContent = timeLeft;
                        }

                        //  handle answer selection
                        function selectAnswer(selectedIndex) {
                            stopTimer(); // Stop the timer  answer is selected
                            const currentQuestion = questions[currentQuestionIndex];
                            const isCorrect = currentQuestion.answers[selectedIndex].correct;
                            if (isCorrect) {
                                score = score + 1;
                            }
                            answerButtons.childNodes[selectedIndex].classList.add(isCorrect ? "correct" : "incorrect");
                            answerButtons.childNodes.forEach((button) => (button.disabled = true));
                            showNextButton();
                        }

                        //  handle next question
                        function handleNextButtonClick() {
                            currentQuestionIndex++;
                            if (currentQuestionIndex < questions.length) {
                                showQuestion();
                            } else {
                                showScore();
                                showSubmitButton();
                            }
                        }

                        //  show the final score
                        function showScore() {
                            resetState();
                            questionElement.innerHTML = `Your score: ${score} out of ${questions.length * 1}`;
                            hideNextButton();
                        }

                        //   start the quiz
                        function startQuiz() {
                            currentQuestionIndex = 0;
                            score = 0;
                            showQuestion();
                        }

                        //  quiz start
                        startQuiz();

                        // Event listener  the Next button
                        nextButton.addEventListener("click", handleNextButtonClick);

                        //deteailes form

                        document.addEventListener("DOMContentLoaded", function() {
                            submitButton.addEventListener("click", function() {
                                var xhr = new XMLHttpRequest();
                                xhr.open("POST", "php/actions.php?submit_data=true", true);
                                xhr.setRequestHeader("Content-Type", "application/json");

                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState === 4 && xhr.status === 200) {
    
                                        alert(xhr.responseText);
                                        window.location.href = "cources.php";
                                    }
                                };
                                
                                var data = {
                                    "score": score,
                                    "total_score":questions.length * 1,
                                    "cource_id": cource_id_new
                                };

                                xhr.send(JSON.stringify(data));
                            });

                        });
                    </script>
                </div>
            </section>
        </article>
    </main>

    <?php include 'pages/footer.php' ?>
</body>

</html>