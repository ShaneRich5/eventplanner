<template>
	<form @submit.prevent>
		<div class="form-group">
			<label for="place-name">Name</label>
			<input
				type="text"
				class="form-control"
				id="place-name"
				placeholder="Name"
				v-model="place.name">
		</div>
		<div class="form-group">
			<label for="place-description">Description</label>
			<textarea
				type="text"
				class="form-control"
				id="place-description"
				rows="4"
				v-model="place.description"
			></textarea>
		</div>
		<button
			type="submit"
			class="btn btn-default"
			@click="handleSubmission(place.name, place.description, place.id)">
			<template v-if="this.place.id">Update</template><template v-else>Create</template>
		</button>
	</form>
</template>

<script>
export default {
	props: {
		place: {
			type: Object,
			default() {
				return { name: '', description: '' };
			},
		},
	},
	methods: {
		handleSubmission(name, description, id) {
			if (name.length == 0) {
				console.log('Must provide a name');
				return;
			}

			const data = { name, description };

			if (id) {
				this.updatePlace(data, id);
			} else {
				this.createPlace(data);
			}
		},
		createPlace(data) {
			const url = window.route('places.store');
			axios.post(url, data).then(this.placeSaved, error => {

			});
		},
		updatePlace(data, id) {
			const url = window.route('places.update', id);
			axios.put(url, data).then(this.placeSaved, error => {

			});
		},
		placeSaved(response) {
			window.location.href = window.route('places.index');
		},
	},
}
</script>