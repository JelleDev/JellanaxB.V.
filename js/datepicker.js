$( function chooseDate() {
    $( "#datepicker" ).datepicker({
        showOn: "button",
        buttonImage: "../img/icons/calendar.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        dateFormat: "yy-mm-dd"
    });
} );