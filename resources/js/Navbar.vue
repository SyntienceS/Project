<script setup>
	import {ref} from 'vue';
	var unregvis = ref(0);
	var regvis = ref(0);
	var logged_in = false;
	var cookies = document.cookie;
	cookies = decodeURIComponent(cookies);
	cookies = cookies.split(";")
	for(var i = 0; i < cookies.length; i++){
		while(cookies[i][0] == " "){
			cookies[i] = cookies[i].substring(1);
		}
		console.log(cookies[i].substring(0,13) == "session_token");
		if(cookies[i].substring(0, 13) == "session_token"){
			console.log("HOLY SHIT OG MY GAWD")
			logged_in = true;
		}
	}
	if(logged_in){
		regvis = "inline-block";
		unregvis = "none";
	}
	else{
		regvis = "none";
		unregvis = "inline-block";
	}
</script>
<template>
	<div class="vertical_center">
		<div id="navbar_left_half">
			<a class="navbutton" href="/">HOME</a>
			<a :style="{display: unregvis }" class="navbutton" href="/auth">AUTH</a>
			<a :style="{display: regvis }" class="navbutton" href="/listings/saved">SAVED LISTINGS</a>
			<a :style="{display: regvis }" class="navbutton" href="listings/new">NEW LISTING</a>
		</div>
		<div id="search_bar">
			<button id="seach_button">⚲</button>
			<input type="text" placeholder="Search for stuff">
		</div>
		<div id="navbar_right_half">
			<a :style="{display: regvis }" class="navbutton" @click="logout">LOGOUT</a>
			<a class="navbutton" href="/about">ABOUT</a>
			<a class="navbutton" href="/help">HELP</a>
			<a class="navbutton" href="/contacts">CONTACTS</a>
		</div>
	</div>
</template>
<style>
*{
	font-family: Arial;
}
#navbar{
	display: flex;
	position: sticky;
	top: 0;
	left: 0;
	width: 95%;
	background-color: #FAFAFA;
	height:75px;
	border-radius: 35px;
	padding-left: 2.5%;
	padding-right: 2.5%;
	border: 2px solid grey;
}
#navbar_left_half{
	text-align: left;
	display: inline-block;
}
#navbar_right_half{
	justify-content: flex-end;
	display: inline-block;
}
.navbutton{
	display: inline-block;
	text-decoration: none;
	border: none;
	padding: 5px;
	height: 20px;;
	font-size: 15px;
	/*height: 100%; */
	background-color: rgb(0, 0, 0, 0);
	transition: color 0.5s, background-color 0.5s;
	color: #000000;
	cursor: pointer;
}
.navbutton:hover{
	color: #FFFFFF;
	background-color: #000000;
}
.vertical_center{
	margin: 0;
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	display: flex;
	flex: 1;
	width: 95%;
	box-sizing: border-box;
}
#search_bar{
	display: flex;
	flex-grow: 1;
	background-color: #FFFFFF;
	border-radius: 25px;
	padding: 5px 5px 5px 5px;
	margin: 0 5px 0 5px;
}
#search_bar input{
	flex-grow: 1;
	margin-left: 3px;
	border-radius: 0 25px 25px 0;
	border: none;
	font-size: 15px;
}
#search_bar input:focus{
	outline: none;
	outline-width: 0;
}

#search_bar button{
	height: 100%;
	width: 30px;
	height: 30px;
	border-radius: 25px;
	margin: 0;
	padding: 0;
	border: none;
	transform: rotate(-30deg);
}
#search_bar button:active{
	border-top: 1px solid gray;
	border-left: 1px solid grey;
}
</style>
