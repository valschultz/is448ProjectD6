window.onload = pageLoad;

function pageLoad() {
    cardio1 = $("cr_1");
    cardio2 = $("cr_2");
    cardio3 = $("cr_3");
    cardio4 = $("cr_4");
    cardio5 = $("cr_5");
    cardio6 = $("cr_6");
    cardio7 = $("cr_7");
    cardio8 = $("cr_8");

    cardio1.onmouseover = mouseOverc1; //will check the output of the other php file to see if available and turn it red or green
    cardio1.onmouseout = mouseOutc1; //will just grey out the box

    cardio2.onmouseover = mouseOverc2;
    cardio2.onmouseout = mouseOutc2;

    cardio3.onmouseover = mouseOverc3;
    cardio3.onmouseout = mouseOutc3;

    cardio4.onmouseover = mouseOverc4;
    cardio4.onmouseout = mouseOutc4;

    cardio5.onmouseover = mouseOverc5;
    cardio5.onmouseout = mouseOutc5;

    cardio6.onmouseover = mouseOverc6;
    cardio6.onmouseout = mouseOutc6;

    cardio7.onmouseover = mouseOverc7;
    cardio7.onmouseout = mouseOutc7;

    cardio8.onmouseover = mouseOverc8;
    cardio8.onmouseout = mouseOutc8;
}

function checkPassword() {
    var password = $("password").value;
    new Ajax.Request("strongornot.php", {
        method: "get",
        parameters: {
            pass: password
        },
        onSuccess: displayStrength
    });
}

function displayStrength(ajax) {
    var r = ajax.responseText;
    $('comment').innerHTML = r;
}

function mouseOverc1() {
    cardio1.style.background = "green"
}

function mouseOutc1() {
    cardio1.style.background = "grey"
}
//
function mouseOverc2() {
    cardio2.style.background = "green"
}

function mouseOutc2() {
    cardio2.style.background = "grey"
}
//
function mouseOverc3() {
    cardio3.style.background = "green"
}

function mouseOutc3() {
    cardio3.style.background = "grey"
}
//
function mouseOverc4() {
    cardio4.style.background = "green"
}

function mouseOutc4() {
    cardio4.style.background = "grey"
}
//
function mouseOverc5() {
    cardio5.style.background = "green"
}

function mouseOutc5() {
    cardio5.style.background = "grey"
}
//
function mouseOverc6() {
    cardio6.style.background = "green"
}

function mouseOutc6() {
    cardio6.style.background = "grey"
}
//
function mouseOverc7() {
    cardio7.style.background = "green"
}

function mouseOutc7() {
    cardio7.style.background = "grey"
}
//
function mouseOverc8() {
    cardio8.style.background = "green"
}

function mouseOutc8() {
    cardio8.style.background = "grey"
}