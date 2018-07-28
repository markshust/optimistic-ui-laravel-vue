<template>
    <div>
        <div class="tweetbox">
            <form @submit.prevent="handleSubmit">
                <textarea name="tweet" v-model="tweetInput"></textarea>
                <input type="submit" value="Tweet!" />
            </form>
        </div>
        <div class="timeline">
            <div class="tweet" v-for="tweet in tweets">
                <div class="user-info">
                    <img :src="`images/${tweet.username}.jpg`" class="avatar" />
                    <div class="username">
                        {{ tweet.username }}
                    </div>
                </div>
                <div class="content">
                    {{ tweet.tweet }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tweets: [],
                tweetInput: ''
            };
        },
        props: ['initialTweets'],
        mounted() {
            this.tweets = _.orderBy(this.initialTweets, 'created_at', 'desc');
        },
        methods: {
            handleSubmit() {
                const self = this;
                const newTweet = {
                    tweet: this.tweetInput,
                    username: 'markshust',
                };

                // optimistic UI
                self.tweets.unshift(newTweet);
                self.tweetInput = '';

                axios.post('/tweet', newTweet)
                    .then(function(response) {
                        console.log('posted to server, we do not have to do anything here as ui is already updated!');
                    })
                    .catch(function(error) {
                        console.log('an error occured, tell user and back out optimistic ui update');
                        alert(error);
                        self.tweets.shift();
                    });
            }
        }
    }
</script>
