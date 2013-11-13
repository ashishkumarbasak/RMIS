function onRequestEnd(e) {
    //debugger;
	var msg ="";
    if (e.type == "update" && !e.response.Errors) {
        msg += "Update record is successfull";
    }else if (e.type == "create" && !e.response.Errors) {
        msg += "Create record is successfull";
    }else if (e.type == "destroy" && !e.response.Errors) {
        msg += "Record is deleted successfull";
    }
	
	if(msg){
	 $( document ).ready(function() {
            var n = noty({
		text: msg,
		type: 'alert',
		layout: 'topRight',
		closeWith: ['hover'],
            });
        });
	}
}
function onError(e) {
	//console.log(e);
	$( document ).ready(function() {
		var n = noty({
		text: e.xhr.responseText,
		type: 'alert',
		layout: 'topRight',
		closeWith: ['hover'],
		});
	});
}


