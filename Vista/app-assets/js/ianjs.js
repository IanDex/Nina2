
/*

$(".result").hover(
	alert("SIiiiiii");
  function () {
    $('#elm').addClass("result_hover");
  },
  function () {
    $('#elm').removeClass("result_hover");
  }
);

$("#lol").click(function(){
    alert("The paragraph was clicked.");
});

/*/

function validate() {
var linkid = document.getElementById("linkid");
var check = document.getElementById('LetterNeed');
check.value = "0"
    if (check.checked) {
       linkid.style.backgroundColor = "#eceff1";
        linkid.disabled = true;
        check.value = "1"

    } else {
        linkid.style.backgroundColor = "#fff";
        linkid.disabled = false;
        check.value = "0"
    }
}    

