<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
        body {
            font-family: 'Inter', Arial, sans-serif
        }
        .p-l {
            padding: 1.5rem 1.8rem 1.5rem 1.8rem; 
        }

        .button {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.5rem 0.8rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-outlined-dark {
            color: #343a40;
            border-color: #343a40;
        }

        .btn-outlined-dark:hover {
            color: #fff;
            background-color: #343a40;
            border-color: #343a40;
        }
    </style>
  </head>
  <body style="background-color: #5e72e4;">
        <div class="row justify-content-center container mx-auto " style="margin-top: 5rem">
            <div class="col-xl-9 col-lg-9 col-md-10 p-l bg-light border rounded shadow">
                <h2 class="font-weight-bold">Minat Karir</h2>
                <hr>
                <div class="quiz">
                    <div id="question" class="mb-4">
                        Gak bahaya tah ?
                    </div>
                    <div id="answer-buttons" class="mb-2">
                        <button class="button btn-outlined-dark w-100 text-left mb-3">Yo Gak</button>
                        <button class="button btn-outlined-dark w-100 text-left mb-3">Bahaya Poll</button>
                        <button class="button btn-outlined-dark w-100 text-left mb-3">YNTKTS</button>
                    </div>
                    <button id="next-button" class="btn btn-primary ml-auto" style="display: none;">Next</button>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    {{-- <script src="{{url('assets/js/quiz.js')}}"></script> --}}
    <script>
    //     const questions = [
    //     {
    //         question : 'Siapa dalang pembunuhan Munir ?',
    //         answers : [
    //             {text : 'SpongeBob', point : 4},
    //             {text : 'BoboiBoy', point : 2},
    //             {text : 'Shiva', point : 5},
    //         ]
    //     },
    //     {
    //         question : 'Apa kepanjangan PKI ?',
    //         answers : [
    //             {text : 'Pusat Komunikasi dan Informasi', point : 5},
    //             {text : 'Pusat Kerajaan Indonesia', point : 1},
    //             {text : 'Pusat Kendali Iman', point : 3},
    //         ]
    //     },
    //     {
    //         question : 'Apa yang membuat kamu kuat ?',
    //         answers : [
    //             {text : 'Gala', point : 5},
    //             {text : 'Cipung', point : 4},
    //             {text : 'Ameena', point : 3},
    //         ]
    //     },
    // ];

    let questions = {!! json_encode($questions) !!};



    const questionElement = document.getElementById('question');
    const answerButtons = document.getElementById('answer-buttons');
    const nextButton = document.getElementById('next-button');

    let currentQuestionIndex = 0;
    let score = parseInt(0);

    
    function startQuiz() {
        console.log(questions);
        currentQuestionIndex = 0;
        score = 0;
        nextButton.innerHTML = 'Next';
        showQuestions();
    }

    function showQuestions() {
        resetState();
        let currentQuestion = questions[currentQuestionIndex];
        let questionNo = currentQuestionIndex +1;
        questionElement.innerHTML = questionNo + ". " + currentQuestion.pertanyaan;
        currentQuestion.answers.forEach(answer => {
            const button = document.createElement('button');
            button.innerHTML = answer.jawaban;
            button.classList.add("btn-outlined-dark");
            button.classList.add("button");
            button.classList.add("w-100");
            button.classList.add("mb-3");
            button.classList.add("text-left");
            answerButtons.appendChild(button);
            button.dataset.bobot = answer.bobot;
            // if (answer.point == 5) {
            // } else {
            //     button.dataset.point = answer.point;
            // }
            console.log(button.dataset.bobot);
            button.addEventListener("click", selectAnswer);
        });
    }

    function resetState() {
        nextButton.style.display = "none";
        while (answerButtons.firstChild ) {
            answerButtons.removeChild(answerButtons.firstChild);
        }
    }

    function selectAnswer(e) {
        const selectedBtn = e.target;
        let bobot = selectedBtn.dataset.bobot;
        score = parseInt(score) + parseInt(bobot);
        // score += parseInt(bobot);
        console.log(bobot);
        // if (bobot == 5) {
        //     selectedBtn.classList.add("btn-success");
        // } else {
        //     selectedBtn.classList.add("btn-danger");
        // }
        Array.from(answerButtons.children).forEach(button => {
            // if (button.dataset.bobot == 5) {
            //     button.classList.add("btn-success");
            // } else {
            //     button.classList.add("btn-danger");

            // }
            if (button.dataset.bobot == bobot) {
                button.classList.add('btn-dark')
                button.classList.remove('btn-outlined-dark')
            }
            button.classList.add('disabled');
            button.disabled = true;
        });
        nextButton.style.display = "block";
    }

    function handleNextButton() {
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            showQuestions();
        } else {
            showScore();
        }
    }

    nextButton.addEventListener("click", ()=> {
        if (currentQuestionIndex < questions.length) {
            handleNextButton();
        } else {
            startQuiz();
        }
    }); 

    function showScore() {
        resetState();
        questionElement.innerHTML = 'Your score is ' + parseInt(score) ;

    }

    startQuiz();

    </script>
  </body>
</html>