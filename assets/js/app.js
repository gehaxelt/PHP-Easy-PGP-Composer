$(document).ready(function() {
	$("#message").on('change keydown', function(event) {
		encryptMessage();
	});

	$("#mailfrom").on('change keydown', function(event) {
		encryptMessage();
	})
	encryptMessage();
});

function encryptMessage() {
	var message = $("#message").val();
	var email = $("#mailfrom").val();
	message += "\n\nFrom: " + email;
	openpgp.encrypt({
        message: openpgp.message.fromText(message),
        publicKeys: thePublicKey,
    }).then(function(data) {
		$("#output").text(data.data);
	});
}

function displayError(msg) {
	//Show error message to user;
	console.log("An error occured" + msg);
	enableInputs(true);
	return false;
}

function displaySuccess(msg) {
	//Show success message to user;
	console.log("Success!" + msg);
	enableInputs(true);
	return false;
}