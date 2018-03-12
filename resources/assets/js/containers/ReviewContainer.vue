<template>
	<div class="panel-default">
		<div class="panel-heading">
			Reviews <star-rating :rating="overallRating"></star-rating>
		</div>
		<div class="panel-body">
			<p>Your review</p>
			<p v-if="user == null">Please <a :href="loginUrl">login</a> in make a review</p>
			<div v-else>
				<star-rating v-model="userReview.rating"></star-rating>
				<input type="text" v-model="userReview.body"/>
				<button @click="handleUserReviewChange(userReview.rating, userReview.body)">Update</button>
			</div>
			<div>
				<p>Others</p>
				<review-list
					v-if="reviewList.length > 0"
					:reviews="reviewList"
				></review-list>
				<p v-else>
					No reviews added yet
				</p>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		user: {
			type: Object,
			required: false,
		},
		parent: {
			type: Object,
			required: true,
		},
		resource: {
			type: String,
			required: true,
		},
	},
	computed: {
		overallRating() {
			if (this.reviewList.length == 0) return 0;
			return this.reviewList.reduce((total, review) => review.rating + total, 0) / this.reviewList.length;
		}
	},
	data() {
		return {
			loginUrl: window.route('login'),
			userReview: { rating: 0, body: '' },
			reviewList: [],
		};
	},
	mounted() {
		const url = window.route(`${this.resource}.reviews.index`, this.parent.id);
		axios.get(url).then(response => this.handleReviewsLoaded(response.data), console.error);
	},
	methods: {
		handleReviewsLoaded(data) {
			const { reviews } = data;
			this.reviewList = reviews;

			if (this.user == null) return;

			const found = reviews.find(review => review['user_id'] == this.user.id);
			if (found) {
				this.userReview = Object.assign({}, found);
			}
		},
		handleUserReviewChange(rating, body) {
			const data = { rating, body };
			let request;
			if ('id' in this.userReview) {
				request = this.updateReview(data);
			} else {
				request = this.saveReview(data);
			}
			request.then(res => this.handleUserReviewLoaded(res.data), console.error);
		},
		updateReview(data) {
			let params = {};
			params[this.resource.slice(0, -1)] = this.parent.id;
			params['review'] = this.userReview.id;

			const url = window.route(`${this.resource}.reviews.update`, params);
			console.log('url', url);
			return axios.put(url, data);
		},
		saveReview(data) {
			const url = window.route(`${this.resource}.reviews.store`, this.parent.id);
			console.log('url', url);
			return axios.post(url, data);
		},
		handleUserReviewLoaded(data) {
			const { review } = data;
			this.userReview = review;

			const index = this.reviewList.findIndex(review => review['user_id'] == this.user.id);
			console.log('index', index);
			if (index > -1) {
				this.$set(this.reviewList, index, review);
			} else {
				this.reviewList.push(review);
			}
		},
	},
}
</script>