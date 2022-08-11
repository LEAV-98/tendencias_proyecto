function obtener_tokens() {
	$.ajax({
		url:'https://www.reniec.softnetpe.com/api/auth/login',
		type:'POST',
		headers: { 
			'Content-Type': 'application/json' ,
			'X-Requested-With': 'XMLHttpRequest'
		},
		data:JSON.stringify({
			email : "pruebacorreocode@gmail.com",
			password: "pruebacorreocode@gmail.com",
		    remember_me: true
		})
	})
	.done(function(resp) {
		alert(resp);
		localStorage.setItem('_token', resp['access_token']);
	})
	.fail(function( jqXHR, textStatus, errorThrown){
		if (jqXHR.status == 401) {
			localStorage.removeItem('_token');
	  	} 
	})
}