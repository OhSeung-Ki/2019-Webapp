window.onload = function() {
    $("b_xml").onclick=function(){
      new Ajax.Request("books.php", {
        method : "get",
        parameters : {category: getCheckedRadio($$('input[name="category"]'))},
        onSuccess: showBooks_XML,
        onFailure: ajaxFailed,
        onException: ajaxFailed
        });
    }
    $("b_json").onclick=function(){
      new Ajax.Request("url", {
        option : value,
        });
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
  var books = ajax.responseXML.getElementsByTagName("book");
  alert(books);
  for(var i=0 ; i < books.length ; i++){
    var title = books[i].getAttribute("title");
    var author = books[i].getAttribute("author");
    var year = books[i].getAttribute("year");
	 $("books").innerHTML += title[i]+", by "+author[i]+" ("+year[i]+")\n";
 }
}

function showBooks_JSON(ajax) {
	alert(ajax.responseText);
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
