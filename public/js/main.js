// document.addEventListener("DOMContentLoaded", function(){
//     const textarea = document.getElementById("aboutBox");
//     const fixedText = "About Client are :\n";

//     if(!textarea.value.startsWith(fixedText)){
//         textarea.value = fixedText;
//     }

//     textarea.addEventListener("keydown", function(e){
//         if(textarea.selectionStart < fixedText.length){
//             if(e.key === "Backspace" || e.key == "Delete"){
//                 e.preventDefault();
//             }
//         }
//     });

//     textarea.addEventListener("select", function(){
//         if(textarea.selectionStart < fixedText.length){
//             textarea.setSelectionRange(fixedText.length, fixedText.length);
//         }
//     });

// });
///////////////////////////////////////// Search function
function checkSearch(input){
    if(input.value.trim() === ''){
        const url = input.getAttribute('data-index-url');
        window.location = url;
    }
}

