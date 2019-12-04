<template>
    <div>
        <div :class="myclass(index)" v-for="(item, index) in lastnews">
            <div class="col-3 pr-0 pl-1">
                <a :href="mya(item.id, item.title)">
                    <img :src="'/media/article/'+item.id+'_original.png'" width="100%" class="pointer" v-if="item.image">
                    <img :src="'/media/article/'+item.id+'_original.png'" width="100%" class="pointer" v-else>
                </a>
            </div>
            <div class="col-9 pl-1 pr-2 pt-1 text-right">
                <a :href="mya(item.id, item.title)">
                    <label class="font14 font-weight-bolder newstitle pointer mb-0">
                        {{item.title}}
                    </label>
                </a>
                <p class="font12 pl-4 mt-2" v-html="item.minitext"></p>
                <label class="headerdate d-block">
                    {{item.created_at}}
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Lastnews",
        data() {
            return {
                lastnews: [],
            }
        },
        methods: {
            mya(id, title){
                var mytitle = title.replace(/\s+|\//g, '-').toLowerCase();
                return '/'+ id + '/' + mytitle;
            },
            myclass(index) {
                if (index == this.lastnews.length - 1) {
                    return ' row mx-0 my-2 pb-2';
                } else {
                    return ' row mx-0 my-2 pb-2 border-bottom';
                }
            },
        },
        mounted() {
            let that = this;
            axios.post('/getlastnews')
                .then(function (response) {
                    that.lastnews = response.data;
                })
        }
    }
</script>

<style scoped>

</style>
