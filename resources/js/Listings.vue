<script setup>
	import {ref, onMounted} from 'vue';
	var listo = ref("");


	function getCategory(){
		return window.location.href[window.location.href.length-1];
	}

	async function getListings(){
		var cat = getCategory();
		var data = new FormData();
		data.append("category", cat);
		var request = await fetch("/api/listings/getfromcategory", {
			method: "POST",
			body: data
		});

		var text = await  request.text();

		text = JSON.parse(text);
		addListing(text);

	}
	function addListing(list){
		//list = document.getElementById("listingList")
		listo.value = ""//.innerHTML = "";
		console.log("AA");
		for(var i = 0; i < list.length; i++){
			console.log("niggah")
			listo.value += '<a class="listing" id="' + list[i].id + '" href="/listing?id=' + list[i].id + '"><h1>' + list[i].title + '</h1><p>' + list[i].description + '</p> </a>';
		}
		console.log(listo);
	}

	onMounted(async () => {
		console.log("aey");
		console.log(listo);
		await getListings();
	});



</script>
<template>

<div id="listingList" v-html="listo">
</div>

</template>
<style>
.listing{
	display: block;
	height: 200px;
	width: 300px;
	border-radius: 25px;
	background-color: #F1F1F1;
	padding: 5px;
	padding-left: 15px;
}

</style>
