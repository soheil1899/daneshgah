<template>
    <div class="text-right py-4">
        <h4 class="font-weight-bolder font18">
            {{article['title']}}
        </h4>
        <div class="undertitle mb-5"></div>

        <div class="row mx-0 justify-content-center" v-if="article['image']">
            <div class="col-md-8 col-12 mb-3">
                <img :src="'/media/article/'+ article['id'] + '_original.png'" width="100%">
            </div>
            <div class="col-12 px-0 mb-3 overflow-hidden">
                <p v-html="article.description"></p>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Showarticle",
        props:['article'],
        mounted() {
        }
    }
</script>

<style scoped>

</style>
