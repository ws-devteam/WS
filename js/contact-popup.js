$("#popupMail").submit(function (event) {
    callAjax('popupMail', 'contactMail');
    event.preventDefault();
});

$("#frmPrewedding").submit(function (event) {
    callAjax('frmPrewedding', 'CustomizedEnquiry',"&subject=Customized PreWedding Query");
    event.preventDefault();
});

$("#frmWedding").submit(function (event) {
    callAjax('frmWedding', 'CustomizedEnquiry',"&subject=Customized Wedding Query");
    event.preventDefault();
});

$("#frmBaby").submit(function (event) {
    callAjax('frmBaby', 'CustomizedEnquiry',"&subject=Customized Rice Ceremony Query");
    event.preventDefault();
});

$("#frmCorporate").submit(function (event) {
    callAjax('frmCorporate', 'CustomizedEnquiry',"&subject=Customized Corporate Query");
    event.preventDefault();
});

function callAjax(formID, mode, optParam = "") {
    $.ajax({
        type: "POST",
        url: 'BL/sender.php',
        dataType: 'html',
        data: $("#" + formID).serialize() + "&mode=" + mode + "&FireEmail=1" + optParam,
        success: function (result) {
            $("#" + formID)[0].reset();
            $("#" + formID + "_Msg").slideDown();
        },
        error: function (xhr, status, result) {
            alert(result);
        }
    });
}