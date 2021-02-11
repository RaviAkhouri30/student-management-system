function mar_val1() {
    var x = document.getElementById("marks_12").max;
    
    var y = $("#marks_12").val();

     if (y > 100) {
     	alert("Please enter the valid marks");
     	document.getElementById("marks_12").value = "";
     } 
}