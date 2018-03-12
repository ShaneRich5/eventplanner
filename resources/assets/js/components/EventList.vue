<template>
	<ul class="list-group">
		<li class="list-group-item" v-for="(event, index) in events">
			<a :href="routeForEvent(event.id)">{{ event.name }}</a>
		</li>
	</ul>
</template>
<script>
export default {
	props: {
		placeId: {
			type: String,
			required: true,
		},
		events: {
			type: Array,
			default() {
				return [];
			},
		},
	},
	methods: {
		routeForEvent(id) {
			return window.route('places.events.show', { place: this.placeId, event: id });
		},
	},
}
</script>
