function mar_val() {
    var x = document.getElementById("marks_10").max;
    
    var y = $("#marks_10").val();

     if (y > 100) {
     	alert("Please enter the valid marks");
     	document.getElementById("marks_10").value = "";
     	
     } 
}

