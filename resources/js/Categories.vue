<script setup>
	import { ref, onMounted } from 'vue';
	async function get_categories(){
		var categories = await fetch("/api/categories/read");
		return await categories.text();
	}

	function category_go(id){
		console.log(id);
		window.location.href = "/listings/" + id;
	}

	function add_categories(id, name, listings){
		var new_element = '<a class="clickable_box" href="/listings?c=' + id + '" id="cat' + id +  '"> <h2>' + name + '</h2> <p>Listings: ' + listings + '</p></a>';
		categories_html.value +=  new_element;
	}
	var categories_html = ref("");

	onMounted(async () => {
		var categories = JSON.parse(await get_categories());
		console.log(categories);
		for(var i = 0; i < categories.length; i++){
			add_categories(categories[i].id, categories[i].category_name, 0);
		}
	});
</script>

<template>
	<h1> Welcome to EchoAuctions </h1> <p class="explain_text">We hope you enjoy your stay</p> <br />
	<h1> Categories </h1> <p class="explain_text"> Explore our various categories for goods</p>
	<hr />
	<div v-html="categories_html" class="category_container">
	</div>
	<hr />
	<h1> Featured Listings </h1> <p class="explain_text"> Most active, highest bidding, and other interesting listings! </p>
	<hr />
	<div class="category_container">
		<div class="clickable_box" id="highest_bid">
			<h2>Highest bid:</h2>
			<p>Title: </p>
			<p>Seller: </p>
			<p>Current bid: </p>
		</div>
		
		<div class="clickable_box" id="most_bids">
			<h2>Most bids:</h2>
			<p>Title: </p>
			<p>Seller: </p>
			<p>Current bid: </p>
		</div>
		
		<div class="clickable_box" id="ending_soon">
			<h2>Ending soon:</h2>
			<p>Title: </p>
			<p>Seller: </p>
			<p>Current bid: </p>
			<p>Ending: </p>
		</div>
		<div class="clickable_box" id="most_recent">
			<h2>Most recent:</h2>
			<p>Title: </p>
			<p>Seller: </p>
			<p>Current bid: </p>
			<p>Ending: </p>
		</div>

	</div>

	<hr />
</template>


<style>
*{
	font-family: Arial;
}
a{
	color: black;
}
h1{
	margin-left: 35px;
	margin-top: 35px;
	display: inline-block;
}
.explain_text{
	display: inline-block;
	margin-left: 45px;
	margin-top: 35px;
}
.category_container{
	display: flex;
}
h2{
	margin: 25px;
}
.clickable_box p{
	margin: 5px 0 0 20px;
}
.clickable_box{
	display: inline-block;
	width: 300px;
	height: 200px;
	background-color: #F1F1F1;
	border-radius: 25px;
	margin: 15px;
	
}
</style>
