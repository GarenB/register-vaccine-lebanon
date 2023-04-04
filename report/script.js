function display2() {
    //alert("Button gone !");
      var category = document.getElementsByName("question");
      
          if (category.checked) {
           
        document.getElementById("advanceButton").style.display = "none";
        alert("Button gone !");
    }



    const rbs = document.querySelectorAll('input[name="question"]');
            let selectedValue;
            for (const rb of rbs) {
                if (rb.checked) {
                    document.getElementById("advanceButton").style.display = "none";
                    break;
                }
            }
} 
  
  