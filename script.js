//Author Shinyoung Caleb Lee
function equipmentReservation() {
	var result = $('result');
	var form = $('submit_reservation');
	
	if (form) {
		result.innerHTML = '';

		form.onsubmit = function() {
			new Ajax.Request('submit_reservation.php', {
				method: 'GET',
				parameters: form.serialize(),
				onSuccess: function(transport, response) {
					var success = transport.responseText == 'true';
					var message = success
						? 'Registration successful.'
						: 'Registration failure. Please select another time slot.';

					result.innerHTML = message;
					alert(message);
						
					if (success)
						result.style = 'font-weight: bold; color: green';
					
					else
						result.style = 'font-weight: bold; color: red';
				},
				onFailure: function(error) {
					alert(error)
				}
			})
			return false;
		}
	}
	console.log('successfully loaded equipmentReservation()');
}

equipmentReservation();

