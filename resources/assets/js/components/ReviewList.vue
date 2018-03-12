<template>
	<div>
		<ul>
			<li v-for="(review, index) in reviews">
				{{ review.rating }}
				{{ review.body }}
			</li>
		</ul>
	</div>
</template>
<script>
export default {
	props: {
		reviews: {
			type: Array,
			default() {
				return [];
			},
		},
	},
}
</script>