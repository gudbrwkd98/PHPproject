$(".rotate").click(function () {
    $(this).toggleClass("down");
})

$(".rotate").toggleClass("toggled");
if ($(".rotate").hasClass("toggled")) {
  	$('.rotate .collapse').collapse('hide');
};

/* --------------------  --------------------  -------------------- */
/* --------------------  custom select box js  -------------------- */
/* --------------------  --------------------  -------------------- */
    $(document).ready(function() {
        $('table.display').DataTable();
    } );



    //sets max date to current date
    function maxCheckDate(textbox) {
        var textbox = textbox.id;
        //gets the current date and timestamp
        var today = new Date();
        //extracts the value for the current day value
        var dd = today.getDate();
        //extracts the value for the current month
        var mm = today.getMonth()+1; //January is 0!
        //extracts the full year from current date
        var yyyy = today.getFullYear();
        //concatenates a zero (0) to front if single digit date
        if(dd<10){
            dd='0'+dd
        } 
        //concatenates a zero (0) to front if single digit month value
        if(mm<10){
            mm='0'+mm
        } 
        //joins the whole date value and saves to variable 'today'
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById(textbox).setAttribute("max", today);
    }
    
    //sets min date to current date
    function minCheckDate(textbox) {
        var textbox = textbox.id;
        //gets the current date and timestamp
        var today = new Date();
        //extracts the value for the current day value
        var dd = today.getDate();
        //extracts the value for the current month
        var mm = today.getMonth()+1; //January is 0!
        //extracts the full year from current date
        var yyyy = today.getFullYear();
        //concatenates a zero (0) to front if single digit date
        if(dd<10){
            dd='0'+dd
        } 
        //concatenates a zero (0) to front if single digit month value
        if(mm<10){
            mm='0'+mm
        } 
        //joins the whole date value and saves to variable 'today'
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById(textbox).setAttribute("min", today);
    }