window.onload = pageLoad;

// Author: Andrew Peterson

function pageLoad() {
    // setting the machines //
    cardio1 = $("cr_1");
    cardio2 = $("cr_2");
    cardio3 = $("cr_3");
    cardio4 = $("cr_4");
    cardio5 = $("cr_5");
    cardio6 = $("cr_6");
    cardio7 = $("cr_7");
    cardio8 = $("cr_8");

    weight1 = $("wrr_1");
    weight2 = $("wrr_2");
    weight3 = $("wrr_3");
    weight4 = $("wrr_4");

    // setting the hover events for each machine //
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

    weight1.onmouseover = mouseOverw1;
    weight1.onmouseout = mouseOutw1;

    weight2.onmouseover = mouseOverw2;
    weight2.onmouseout = mouseOutw2;

    weight3.onmouseover = mouseOverw3;
    weight3.onmouseout = mouseOutw3;

    weight4.onmouseover = mouseOverw4;
    weight4.onmouseout = mouseOutw4;
}

function displayWeightInfo(ajax) {
    var r = ajax.responseText;
    $('info').innerHTML = r;

    var str = "Hello world, welcome to the universe.";
    var n = r.includes("nobody"); //generally means there is nobody on the machine currently
    var c = r.includes("not open yet"); //if you are not in the correct hours, this will be in the string

    if (n && !c) {
        $('info').style.background = 'green';
    } else {
        $('info').style.background = '#ff3333';
    }
}

function mouseOverc1() {
    cardio1.style.background = "gold"
    var c_machine = 1;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc1() {
    cardio1.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverc2() {
    cardio2.style.background = "gold"
    var c_machine = 2;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc2() {
    cardio2.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverc3() {
    cardio3.style.background = "gold"
    var c_machine = 3;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc3() {
    cardio3.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverc4() {
    cardio4.style.background = "gold"
    var c_machine = 4;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc4() {
    cardio4.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverc5() {
    cardio5.style.background = "gold"
    var c_machine = 5;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc5() {
    cardio5.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverc6() {
    cardio6.style.background = "gold"
    var c_machine = 6;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc6() {
    cardio6.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverc7() {
    cardio7.style.background = "gold"
    var c_machine = 7;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc7() {
    cardio7.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverc8() {
    cardio8.style.background = "gold"
    var c_machine = 8;
    var w_machine = 0;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutc8() {
    cardio8.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}

/* 

BELOW ARE THE FUNCTIONS FOR THE WEIGHT ROOM MACHINES 

*/

function mouseOverw1() {
    weight1.style.background = "gold"
    var c_machine = 0;
    var w_machine = 9;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}


function mouseOutw1() {
    weight1.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverw2() {
    weight2.style.background = "gold"
    var c_machine = 0;
    var w_machine = 10;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutw2() {
    weight2.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverw3() {
    weight3.style.background = "gold"
    var c_machine = 0;
    var w_machine = 11;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}


function mouseOutw3() {
    weight3.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}
//
function mouseOverw4() {
    weight4.style.background = "gold"
    var c_machine = 0;
    var w_machine = 12;

    new Ajax.Request("whos_in_results.php", {
        method: "get",
        parameters: {
            cardio_id: c_machine,
            weights_id: w_machine
        },
        onSuccess: displayWeightInfo
    });
}

function mouseOutw4() {
    weight4.style.background = "grey"
    $('info').style.background = "grey";
    $('info').innerHTML = '';
}