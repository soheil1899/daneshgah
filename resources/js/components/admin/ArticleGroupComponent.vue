<template>

    <div>
        <h4 class="admin-title py-3 px-4"> لیست گروه های مطالب </h4>

        <input type="button" @click="addgroup" class="btn btn-success btn-sm my-2" data-toggle="modal"
               data-target="#Modal" value="افزودن گروه جدید">
        <input type="button" class="btn btn-dark btn-sm my-2 mr-1" value="بازخوانی">

        <a :href="'../dashboard'" class="back-btn btn btn-sm btn-dark my-2 mr-1">داشبورد</a>
        <input type="button" class="back-btn btn btn-danger btn-sm my-2 mr-3" @click="deletearticle" value="حذف">



        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col">عنوان گروه</th>
                <th scope="col" class="p-0">
                    <i class="fas fa-cogs fa-2x mb-2"></i>
                </th>
                <th scope="col" width="10%">حذف</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in articlelist" :key="item.id">
                <th class="py-2" scope="row">{{index+1}}</th>
                <td class="py-2">{{item.name}}</td>
                <td class="py-1 icons">
                    <a :href="'articles/'+item.id">
                        <i title="مطالب" class="fas fa-stream fa-lg mt-2 mx-1"></i>
                    </a>
                    <i title="ویرایش" class="far fa-edit fa-lg mt-2 mx-1"
                       @click="editgroup(item.id, item.name)"
                       data-toggle="modal" data-target="#Modal"></i>
                </td>
                <td class="py-1 text-center">
                    <input v-if="item.articles.length == 0" type="checkbox" v-model="deleteart[item.id]" class="form-check-input mx-auto">
                    <small v-else>
                        شامل مطلب
                    </small>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- Add & Edit Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" v-if="editflag == true" v-text="'ویرایش گروه'"></h5>
                        <h5 class="modal-title" v-else v-text="'افزودن گروه جدید'"></h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>

                        <form>
                            <div class="form-group mb-1">
                                <input type="text" v-model="groupname" class="form-control"
                                       placeholder="نام گروه">
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" @click="savegroup" class="btn btn-primary">ذخیره</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>


    export default {
        name: "ArticleGroupComponent",
        data() {
            return {
                editflag: false,
                articlelist: [],
                groupname: null,
                error: [],
                groupid: null,


                deleteart: [],
            }
        },

        methods: {

            reloadPage() {
                let that = this;
                axios.post('/dashboard/getarticlegroups')
                    .then(function (response) {
                        that.articlelist = response.data;
                    });
            },

            deletearticle(){
                let that = this;
                let data = {
                    groups: this.deleteart,
                };
                axios.post('/dashboard/deletegroup', data)
                    .then(function (response) {
                        that.reloadPage();
                    });
            },
            addgroup() {
                this.error = [];
                this.editflag = false;
                this.groupname = null;
                this.groupid = null;
            },

            editgroup(id, name) {
                this.error = [];
                this.editflag = true;
                this.groupname = name;
                this.groupid = id;
            },

            savegroup() {
                let that = this;
                let data = {
                    editflag: this.editflag,
                    groupid: this.groupid,
                    groupname: this.groupname,
                };
                axios.post('/dashboard/savegroup', data)
                    .then(function (response) {
                        $('#Modal').modal('toggle');
                        that.reloadPage();
                    }).catch((error) => {
                    that.error = error.response.data.errors;
                });
            },

        },

        mounted() {
            this.reloadPage();
        }


    }
</script>

<style scoped>

</style>
