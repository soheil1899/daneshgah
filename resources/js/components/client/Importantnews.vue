<template>
    <div class="card">
        <div class="card-header text-center font14 font-weight-bolder py-2 bg-info text-white">
            مهمترین خبرها
        </div>
        <div class="card-body importantbody text-right px-1 py-2">
            <a class="font12 plusnews mb-2" :href="mya(item.id, item.title)" v-for="(item, index) in important">
                <i class="fas fa-angle-left plusicon fa-lg"></i>
                {{item.title}}
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Importantnews",
        data(){
            return{
                important: [],
            }
        },
        methods:{
            mya(id, title) {
                var mytitle = title.replace(/\s+|\//g, '-').toLowerCase();
                return '/' + id + '/' + mytitle;
            },
        },
        mounted() {
            let that = this;
            axios.post('/getimportantnews')
                .then(function (response) {
                    that.important = response.data;
                })
        }
    }
</script>

<style scoped>

    .importantbody{
        max-height: 620px;
        overflow: auto;
    }
    .plusicon{
        color: #007bff;
    }
    .plusnews{
        display: block;
        text-decoration: none;
        color: #222;
    }
    .plusnews:hover{
        color: darkblue;
        font-weight: bolder;
        text-decoration: none;
    }
</style>
