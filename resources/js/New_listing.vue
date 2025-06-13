<script setup>

	async function submit(){
		var title = document.getElementById("title").value;
		var description = document.getElementById("description").value;
		var valid_until = document.getElementById("valid_until").value;
		var starting_price = parseFloat( document.getElementById("starting_price").value );
		var category = parseInt( document.getElementById("categories").value );

		var data = new FormData();
		data.append("title", title);
		data.append("description", description);
		data.append("valid_until", valid_until);
		data.append("starting_price", starting_price);
		data.append("category", category);

		var request = await fetch("/api/listings/create", {
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

	<div>
		<input id="title" placeholder="title"> <br>
		<input id="description" placeholder="description"> <br>
		<input id="valid_until" type="datetime-local"> <br>
		<input id="starting_price" placeholder="starting price"> <br>
		<select id="categories"> <br>
			<option value="1">Art</option>
			<option value="2">Oddities</option>
			<option value="3">Used goods</option>
			<option value="4">Historical</option>
			<option value="5">Real estate</option>
		</select>
		<button @click="submit">Create</button>
	</div>

</template>
<style>
</style>
