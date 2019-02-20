$(document).ready( function(){
    let totalCorrect = 0;  //start at zero, will increment if correct guess
    let totalPossible = 6; //number of questions in test
    
    
    $('#submitTestButton').on('click', function(){
        
        
        console.log("You submitted your test!");
        var answer1 = $('input[name=q1radio]:checked').val();
        console.log(answer1 === "correct" );
    })
    

    
})
