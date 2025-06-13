<script setup>
	import {ref, onMounted} from 'vue';
	
	var listing = ref("");

	function getListingId(){
		var listingId = 0;
		var curNum;
		for(var i = window.location.href.length-1; !isNaN(window.location.href[i]); i-- ){
			curNum = Number(window.location.href[i]) 
			listingId += curNum + (curNum-1) * (10 * (window.location.href.length-1 - i) )
		}
		return listingId;
	}

	async function getListingData(){
		
		var listingId = getListingId();

		var data = new FormData();
		data.append("listing", listingId);

		var response = await fetch("/api/listings/read", {
			method: "POST",
			body: data,
		});
		data = await response.text();
		return JSON.parse( data );
	}

	async function bid(){
		var listingId = getListingId();
		var bid_amount = Number(document.getElementById("bid_amount").value);

		var data = new FormData();
		data.append("listing", listingId);
		data.append("bid_amount", bid_amount);

		var response = await fetch("/api/offers/create", {
			method: "POST",
			body: data,
		});
	}

	onMounted(async () => {
		var data = await getListingData();
		console.log(data);
		if(!data[1]){
			data[1] = [];
		}
		listing.value = data[0].created_time + " created <br>" + data[0].title + "<br>" + data[0].description + "<br> Price: " + data[0].starting_price + "<br>" + data[0].valid_until + " ends" + "<br>User: " + data[0].user_id + "<br>Attachments: " + data[1].length + "<br>Highest bid: " + data[2].amount + "<br>Highest bidder: " + data[2].user_id;
	});


</script>
<template>

<div v-html="listing">
</div>

<hr>

<input id="bid_amount" placeholder="bid">
<button @click="bid">bid</button>
</template>
<style>
</style>

