<template>
	<h1>Event Form</h1>
</template>

<script>
export default {
	props: {
		placeId: {
			required: true,
		}
	},
	data() {
		return {
			name: '',
			description: ''
		};
	},
}
</script>