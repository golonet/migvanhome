
if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
} else {// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = showSuggestions;

function showSuggestions() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
		var stringText = new String(xmlhttp.responseText);

		var resTags = stringText.split(",");
		
		$(function() {
			var availableTags = resTags;
			$( "#tags" ).autocomplete({
				source: availableTags,				position: {			        my : "right top",			        at: "right bottom"			    }
			});
		});
  	}
} 
  $('#searchBtn').click(function() {		var textl = document.getElementById('tags').value.length;		if(textl<1){			alert("תיבת החיפוש ריקה");			return false;		}else{						var sName = $(this).next('input[id=tags]').val();		    window.location.href = "search.php?byText="+sName;		}         });

function onKeyUp() {
	var txt = document.getElementById('tags');
	var value = txt.value;
	if (value.length < 1) return;
	
	xmlhttp.open('GET','parts/getResultsName.php?sitetxt=' + value,true);
	xmlhttp.send();
}

$('.hide_me').click(function() {	$(this).parent(".dialog").hide("slow");});
















