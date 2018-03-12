<template>
	<form @submit.prevent>
		<div class="form-group">
			<label for="event-name">Name</label>
			<input
				type="text"
				class="form-control"
				id="event-name"
				placeholder="Name"
				v-model="event.name">
		</div>
		<div class="form-group">
			<label for="event-description">Description</label>
			<textarea
				type="text"
				class="form-control"
				id="event-description"
				rows="4"
				v-model="event.description"
			></textarea>
		</div>
		<button
			type="submit"
			class="btn btn-default"
			@click="handleSubmission(event.name, event.description, event.id)">
			<template v-if="this.event.id">Update</template><template v-else>Create</template>
		</button>
	</form>
</template>

<script>
export default {
	props: {
		placeId: {
			required: true,
		},
		event: {
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
			const url = window.route('places.events.store', this.placeId);
			axios.post(url, data).then(this.eventSaved, console.error);
		},
		updatePlace(data, id) {
			const url = window.route('places.events.update', { place: this.placeId, event: id });
			axios.put(url, data).then(this.eventSaved, console.error);
		},
		eventSaved(response) {
			window.location.href = window.route('places.show', this.placeId);
		},
	},
}
</script>