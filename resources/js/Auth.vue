<script setup>
	async function submit_login(){
		var name = document.getElementById("login_username");
		var pass = document.getElementById("login_password");

		var data = new FormData();
		data.append("username", name.value);
		data.append("password", pass.value);
	
		var request = await fetch("/api/auth/login", {
			method: "POST",
			body: data
		});
		var text = await request.text();
		if(text != ""){
			alert(text);
		}


	}
	
	async function submit_register(){
		var name = document.getElementById("register_username");
		var dispname = document.getElementById("register_display_name");
		var email = document.getElementById("email");
		
		var pass = document.getElementById("register_password");
		var pass_confirm = document.getElementById("register_password_confirm");
		
		if(pass.value != pass_confirm.value){
			return;
		}

		var data = new FormData();
		data.append("username", name.value);
		data.append("display_name", dispname.value);
		data.append("password", pass.value);
		data.append("email", email.value)
	
		var request = await fetch("/api/auth/register", {
			method: "POST",
			body: data
		});
		var text = await request.text();
		if(text != ""){
			alert(text);
		}

	}

</script>

<template>
	<div id="flexyboye">
		<div id="login">
			<h1>Login</h1>
			<hr>
			<input id="login_username" placeholder="Username" /> <br>
			<input type="password" id="login_password" placeholder="Password"/> <br>
			<button id="login_submit" @click="submit_login">Login</button>
		</div>
		<hr>
		<div id="register">
			<h1>Register</h1>
			<hr>
			<input id="register_username" placeholder="Username" title="Not displayed anywhere, just the name that identifies you, must be unique" /> <br>
			<input id="register_display_name" placeholder="Display name" title="What everyone else will see as your name when looking at your profile" /><br>
			<input id="email" placeholder="Email"/><br>

			<input type="password" id="register_password" placeholder="Password"/> <br>
			<input type="password" id="register_password_confirm" placeholder="Confirm password"/> <br>

			<button id="register_submit" @click="submit_register">Register</button>

		</div>
	</div>
</template>

<style>
*{
font-family: Arial;
}
#login{
	margin-left: auto;
}
#register{
	margin-right: auto;
}
#flexyboye hr{
	margin-left: 50px;
	margin-right: 50px;
}
input{
	border-radius: 25px;
	padding: 4px 10px 4px 10px;
	margin: 5px;
}
button{
	border-radius: 25px;
	margin: 5px;
	padding: 4px 10px 4px 10px;
}
#flexyboye{
	display: flex;
}
</style>
