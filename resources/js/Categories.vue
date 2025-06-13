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
	
	var highest_bid = ref({
		href: "",
		title: "",
		seller: "",
		current_bid: 0,
	});
	
	var most_bids = ref({
		href: "",
		title: "",
		seller: "",
	})

	var ending_soon = ref({
		href: "",
		title: "",
		seller: "",
		current_bid: 0,
		ending: "",
	});
	
	var most_recent = ref({
		href: "",
		title: "",
		seller: "",
		current_bid: 0,
		ending: "",
	})


	async function get_special(){
		var response = await fetch("/api/categories/readspecial");
		return await response.text()
	}

	onMounted(async () => {
		var categories = JSON.parse(await get_categories());
		console.log(categories);
		for(var i = 0; i < categories[0].length; i++){
			add_categories(categories[0][i].id, categories[0][i].category_name, categories[1][i].count);
		}
		var spec = JSON.parse( await get_special());
		highest_bid.value.href = "/listing?id=" + spec[0].listing_id;
		highest_bid.value.current_bid = spec[0].amount;
		highest_bid.value.seller = spec[0].user_id;
		highest_bid.value.title = spec[0].title;
	
		most_bids.value.href = "/listing?id=" + spec[1].listing_id;
		most_bids.value.title =  spec[1].title;
		most_bids.value.seller =  spec[1].user_id;
		most_bids.value.total_bids = spec[1].total_bids;

		if(spec[2]){
			ending_soon.value.href = "/listing?id=" + spec[2].id;
 			ending_soon.value.title =  spec[2].title;
			ending_soon.value.seller =  spec[2].user_id;
 			ending_soon.value.ending =  spec[2].valid_until;
 		}
		most_recent.value.href = "/listing?id=" + spec[3].id;
 		most_recent.value.title =  spec[3].title;
		most_recent.value.seller =  spec[3].user_id;
 		most_recent.value.ending =  spec[3].valid_until;
 	
  
		most_recent
		//most_bids
		//ending_soon
		//most_recent
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
		<a class="clickable_box" id="highest_bid" v-bind:href="highest_bid.href">
			<h2>Highest bid: </h2>
			<p>Title: {{ highest_bid.title }}</p>
			<p>Seller: {{ highest_bid.seller }}</p>
			<p>Current bid: {{ highest_bid.current_bid }} </p>
		</a>
		
		<a class="clickable_box" id="most_bids" v-bind:href="most_bids.href">
			<h2>Most bids:</h2>
			<p>Title: {{ most_bids.title }} </p>
			<p>Seller: {{ most_bids.seller }}</p>
			<p>Total bids: {{most_bids.total_bids}}</p>
		</a>
		
		<a class="clickable_box" id="ending_soon" v-bind:href="ending_soon.href">
			<h2>Ending soon:</h2>
			<p>Title: {{ending_soon.title}} </p>
			<p>Seller: {{ending_soon.seller}}</p>
			<p>Current bid: {{ending_soon.current_bid}}</p>
			<p>Ending: {{ending_soon.ending}}</p>
		</a>
		<a class="clickable_box" id="most_recent" v-bind:href="most_recent.href">
			<h2>Most recent:</h2>
			<p>Title: {{most_recent.title}} </p>
			<p>Seller: {{most_recent.seller}}</p>
			<p>Current bid: {{most_recent.current_bid}}</p>
			<p>Ending: {{most_recent.ending}}</p>
		</a>

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
