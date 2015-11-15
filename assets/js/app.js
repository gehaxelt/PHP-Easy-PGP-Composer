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
	if(publicKey == null) {
		return displayError("Public key still not loaded!");
	}
	var message = $("#message").val();
	var email = $("#mailfrom").val();
	message += "\n\nFrom: " + email;

	openpgp.encryptMessage(publicKey.keys, message).then(function(pgpMessage) {
		$("#output").text(pgpMessage);
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