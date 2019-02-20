$("document").ready(function() {
    //answers key 2,
    let answerPopulator = [
        //2
        "Hal Incandensa",
        "Mario Incandensa",
        "John Wayne", //correct
        "Ortho Styce",
        "Randy Lentz",
        //5
        "Year of the Whopper", // correct
        "Year of the Depend Adult Undergarment",
        "Year of the Purdue Wonder Chicken",
        "Year of Glad",
        "Year of the Trial-Size Dove Bar",
        //11
        "True",
        "False", //correct
        //13
        "Don Gately",
        "Hugh Steeply", //correct
        "Pat Montesian",
        "Joelle Van Dyne",
        //18
        "Quebecios Uprising",
        "ONAN Treaty",
        "Pollution", //correct
        "War",
        "Terrorism", 
        //21
        "Himself",
        "Madam Psychosis",
        "Orin Incandenza",
    ]

    let questionPopulator = [
        "1. Who is the top ranked boy at the Alston Tennis Academy?",
        "2. What was the name of the first year of subsidized time?",
        "3. True or False: The PGOAT is Avril Incandensa",
        "4. Select the person who is NOT a member of Ennet House",
        "5. What was the cause of the great concavity?",
        "6. Who killed Himself?"
    ]
    let answerKey = [2, 5, 11, 13, 18, 21];

    var resultParas = document.querySelectorAll('.resultParas label');
    var resultParas2 = document.querySelectorAll('.resultParas2 label');


    for (var i = 0; i < answerPopulator.length; i++) {
        $(resultParas[i]).html(answerPopulator[i]);
    }
    for (var z = 0; z < questionPopulator.length; z++) {
        $(resultParas2[z]).html(questionPopulator[z]);
    }

    $('#submitData').click(


        function checkGuess() {
            let correctTotal = 0;
            let correctQuestions = [];
            let answers = [];

            for (var i = 0; i < answerPopulator.length; i++) {
                if ($("#choice" + String(i)).is(":checked")) {
                    answers.push(i);
                }
            }

            for (var i = 0; i < answers.length; i++) {
                if (answerKey.indexOf(answers[i]) != -1) {
                    correctTotal += 1;
                    correctQuestions.push(answerKey.indexOf(answers[i]));
                }
            }
            console.log("correct total: " + correctTotal)
            console.log("correct questionsL: " + correctQuestions)
            if (correctTotal == 6) {
                $("#myModal").css("display", "block")
            }
            else {
                for (var i = 0; i < questionPopulator.length; i++) {
                    if (correctQuestions.includes(i)) {
                        $("#form" + String(i + 1)).css("background-image", "url('images/tick.png')");
                    }
                    else {
                        $("#form" + String(i + 1)).css("background-image", "url('images/x.jpg')");
                        $("#form" + String(i + 1)).css("background-repeat", "none");
                    }
                }
            }
            $("#Score").html("Correct: " + correctTotal + " Wrong: " + (6 - correctTotal) + " Score: " + ((correctTotal) / 6) + "%");
            return;

        }
    );

    $('#reset').click(


        function checkGuess() {
            for (var i = 0; i < questionPopulator.length; i++) {
                $("#form" + String(i + 1)).css("background-image", "none");
            }
            for (var i = 0; i < answerPopulator.length; i++) {
                $("#choice" + String(i)).prop("checked", false);
            }
            return;
        }
    );

})