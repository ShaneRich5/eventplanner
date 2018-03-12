<template>
	<div>
		<ul class="list-group">
			<li class="list-group-item" v-for="(review, index) in reviews">
				<star-rating
					:rating="review.rating"
					read-only
					:show-rating="false"
					:star-size="25">
				</star-rating>
				{{ review.body }} by {{ review.user.name }} on {{ formatDate(review['updated_at']) }}
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
	methods: {
		formatDate(string) {
			const date = new Date(string);
			return [(date.getMonth() + 1), date.getDate(), date.getFullYear()].join('/');
		}
	}
}
</script>