<template>
	<form>
		<div class="form-group">
			<label for="place-name">Name</label>
			<input type="text" class="form-control" id="place-name" placeholder="Name">
		</div>
		<div class="form-group">
			<label for="place-description">Description</label>
			<textarea type="text" class="form-control" id="place-description" rows="4"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Create</button>
	</form>
</template>

<script>
export default {

}
</script>