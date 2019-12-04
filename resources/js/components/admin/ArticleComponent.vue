<template>

    <div id="articlecomponent">
        <h4 class="admin-title py-3 px-4"> لیست مطالب گروه
            {{groupname}}
        </h4>

        <input type="button" @click="addarticle" class="btn btn-success btn-sm my-2" data-toggle="modal"
               data-target="#Modal" value="افزودن مطلب جدید">
        <input type="button" @click="reloadPage" class="btn btn-info btn-sm my-2 mr-1" value="بازخوانی">
        <v-select v-model="groupselect" class="select-group mr-3" :options="groups" label="name" @input="reloadPage"
                  :clearable="false" placeholder="یکی از گروه ها را انتخاب کنید"></v-select>

        <a :href="'../../dashboard'" class="back-btn btn btn-sm btn-dark my-2 mr-1">داشبورد</a>

        <a :href="'../article'" class="back-btn btn btn-sm btn-dark my-2 mr-1">برگشت</a>
        <input type="button" class="back-btn btn btn-sm btn-danger my-2 mr-3" @click="deletearticle" value="حذف">

        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col">عنوان مطلب</th>
                <th scope="col">لینک</th>
                <th scope="col">انتشار</th>
                <th scope="col" v-if="groupid==6">خبرمهم</th>
                <th scope="col" class="p-0">
                    <i class="fas fa-cogs fa-2x mb-2"></i>
                </th>
                <th scope="col">محتوی</th>
                <th scope="col" width="5%">حذف</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in this.articlelist" :key="item.id">
                <th class="py-2" scope="row">{{index+1}}</th>
                <td class="py-2">{{item.title}}</td>
                <td class="py-2">{{item.url}}</td>
                <td class="py-1 icons" v-if="item.publish">
                    <i class="far fa-check-circle fa-lg pointer mt-2" title="انتشار"
                       @click="changepublish(item.id ,false)"></i>
                </td>
                <td class="py-1 icons" v-else>
                    <i class="fas fa-ban fa-lg pointer mt-2" title="عدم انتشار"
                       @click="changepublish(item.id, true)"></i>
                </td>

                <td class="py-1 icons" v-if="groupid==6 && item.important">
                    <i class="far fa-check-circle fa-lg pointer mt-2" title="خبرمهم"
                       @click="changeimportant(item.id ,false)"></i>
                </td>
                <td class="py-1 icons" v-if="groupid==6 && !item.important">
                    <i class="fas fa-ban fa-lg pointer mt-2" title="بی اهمیت"
                       @click="changeimportant(item.id, true)"></i>
                </td>

                <td class="py-1 icons">

                    <i title="تصویر مطلب" class="fas fa-camera fa-lg mx-1 mt-2"
                       @click="browsefile2(item.id)"></i>

                    <i title="ویرایش" class="far fa-edit fa-lg mx-1 mt-2" data-toggle="modal"
                       data-target="#Modal"
                       @click="editarticle(item.id, item.title, item.url, item.minitext, item.publish)"></i>
                </td>
                <td class="py-1 icons">
                    <i title="محتوی" class="fas fa-clipboard-list fa-lg mx-1 mt-2" @click="content(item.id, item.title, item.description)"></i>
                </td>
                <td>
                    <input type="checkbox" v-model="deleteart[item.id]" class="form-check-input mx-auto">
                </td>
            </tr>
            </tbody>
        </table>

        <input type="file" class="d-none" id="browse2" ref="image2"
               @change="selectimage2" accept=".jpg, .png, .jpeg">


        <!-- Add & Edit Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" v-if="editflag == true" v-text="'ویرایش مطلب'"></h5>
                        <h5 class="modal-title" v-else v-text="'افزودن مطلب جدید'"></h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>

                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" v-model="articletitle" @keyup="changeurl"
                                           class="form-control mt-2" placeholder="عنوان مطلب">

                                    <div class="input-group mt-2" dir="ltr">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">/</div>
                                        </div>
                                        <input type="url" v-model="articleurl" @keyup="changeurl2" class="form-control"
                                               placeholder="لینک مطلب">
                                    </div>


                                    <textarea v-model="minitext" class="form-control mt-2" placeholder="متن کوتاه..."
                                              rows="9"></textarea>
                                    <div class="form-group mt-1">
                                        <input type="checkbox" v-model="publish"
                                               class="form-check-input publish-checkbox mr-2">
                                        <label class="form-check-label pr-2 mt-1 mr-4">نمایش</label>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" @click="savearticle" class="btn btn-primary">ذخیره</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- content Modal -->
        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">محتوی مطلب {{articletitle}}</h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>
                        <div class="row">
                            <div class="col-12 col-lg-9" dir="ltr">
                                <editor v-model="text" ref="editor"
                                        api-key="qc1sdre33bdx4lkj24aw4ffoeyx1rvbohr9ow2hzhjgfu2mi"
                                        :init="{plugins: 'wordcount','directionality': 'rtl','height':300}"></editor>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="card">
                                    <div class="card-header row m-0 p-1 pt-2">
                                        <div class="col-8">
                                            مدیریت فایل
                                        </div>
                                        <div class="col-4 icons">
                                            <i @click="browsefile" class="fas fa-plus-square fa-2x"></i>
                                        </div>
                                        <input type="file" class="d-none" id="browse" ref="imagetext"
                                               @change="selectimage" accept=".jpg, .png, .jpeg">
                                    </div>
                                    <div class="card-body p-2">
                                        <div v-for="(file, index) in filemanagerids" :key="file.id"
                                             class="m-1 float-right position-relative">
                                            <img :src="file.small" @click="selectImage(file.original)">
                                            <i class="fas fa-trash position-absolute delete-filemanager"
                                               @click="deletefilemanager(file.small, file.original, index)"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" @click="savecontent" class="btn btn-primary">ذخیره</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>

    import Editor from '@tinymce/tinymce-vue';

    export default {
        name: "ArticleComponent",
        data() {
            return {
                groupid: null,
                editflag: false,
                articlelist: [],
                articlelistlength: null,
                groupname: null,
                articletitle: null,
                articleurl: null,
                description: null,
                minitext: null,
                publish: null,
                error: [],
                articleid: null,
                groups: [],
                groupselect: null,
                deleteart: [],

                text: '',
                filemanagerids: [],
            }
        },
        components: {
            'editor': Editor
        },
        props: ['articlegroupid'],

        methods: {
            content(id, title, des){
                let that = this;
                this.articletitle = title;
                this.text = des;
                if (des == null){
                    this.text = '';
                }
                this.articleid = id;
                let data = {
                    articleid: id,
                };
                axios.post('/dashboard/getfilemanager', data)
                    .then(function (response) {
                        try {
                            that.filemanagerids = [];
                            for (var i = 0; i < response.data.length; i++) {
                                let newfile = [];
                                newfile['small'] = '/media/filemanager/' + id + '/itemsmall_' + response.data[i]['image'] + '.png';
                                newfile['original'] = '/media/filemanager/' + id + '/item_' + response.data[i]['image'] + '.png';
                                that.filemanagerids.push(newfile);
                            }
                        } catch (e) {

                        }
                    });
                $('#Modal2').modal('show');
            },
            deletefilemanager(small, original, index) {
                let that = this;
                let data = {
                    flag: 'article',
                    small: small,
                    original: original,
                };
                axios.post('/dashboard/deletefilemanager', data)
                    .then(function (response) {
                        that.filemanagerids.splice(index, 1);
                        that.reloadPage();
                    });
            },
            selectImage(original) {
                let Imagetag = '<img src="'+ original +'" data-mce-src="'+ original +'" width="200px">';
                this.text += Imagetag;
            },
            browsefile() {
                document.getElementById("browse").click();
            },
            selectimage() {
                let that = this;
                let formData = new FormData();
                formData.append('image', this.$refs.imagetext.files[0]);
                formData.append('articleid', this.articleid);
                axios.post('/dashboard/savefile'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    })
                    .then(function (response) {
                        let newfile = [];
                        newfile['small'] = '/media/filemanager/' + that.articleid + '/itemsmall_' + response.data + '.png';
                        newfile['original'] = '/media/filemanager/' + that.articleid + '/item_' + response.data + '.png';
                        that.filemanagerids.push(newfile);
                    });
            },
            savecontent(){
                let that = this;
                let data = {
                    articleid: this.articleid,
                    des: this.text,
                };
                axios.post('/dashboard/savearticledes', data)
                    .then(function (response) {
                        that.reloadPage();
                        $('#Modal2').modal('hide');
                    });
            },

            reloadPage() {
                let that = this;
                let data;
                if (this.groupselect == null) {
                    data = {
                        groupid: this.articlegroupid,
                    };
                } else {
                    data = {
                        groupid: this.groupselect['id'],
                    };
                }
                axios.post('/dashboard/getarticles', data)
                    .then(function (response) {
                        that.groupname = response.data[0]['name'];
                        that.groupid = response.data[0]['id'];
                        that.articlelist = response.data[0]['articles'];

                        that.groups = response.data[1];

                        that.articlelistlength = that.articlelist.length;

                        for (var i = 0; i < response.data[1].length; i++) {
                            if (that.groupid == response.data[1][i]['id']) {
                                that.groupselect = response.data[1][i];
                            }
                        }
                    });
            },


            changepublish(id, changeto) {
                let that = this;
                let data = {
                    id: id,
                    publish: changeto,
                };

                axios.post('/dashboard/changepublisharticle', data)
                    .then(function (response) {
                        that.reloadPage();
                    });
            },

            changeimportant(id, changeto) {
                let that = this;
                let data = {
                    id: id,
                    important: changeto,
                };

                axios.post('/dashboard/changeimportantarticle', data)
                    .then(function (response) {
                        that.reloadPage();
                    });
            },
            changeurl() {
                this.articleurl = this.articletitle.replace(/\s+/g, '-').toLowerCase();
            },
            changeurl2() {
                this.articleurl = this.articleurl.replace(/\s+/g, '-').toLowerCase();
            },
            closeimagemodal() {
                $('#imagemodal').modal('hide');
                this.reloadPage();
            },
            browsefile2(id) {
                this.articleid = id;
                document.getElementById("browse2").click();
            },
            selectimage2() {
                let that = this;
                let formData = new FormData();
                formData.append('image', this.$refs.image2.files[0]);
                formData.append('articleid', this.articleid);

                axios.post('/dashboard/savearticleimage'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function (response) {
                        that.reloadPage();
                    });
            },


            deletearticle(id) {
                let that = this;
                let data = {
                    articles: this.deleteart,
                };
                axios.post('/dashboard/deletearticle', data)
                    .then(function (response) {
                        that.reloadPage();
                    });
            },
            editarticle(id, title, url, minitext, publish) {
                this.error = [];
                this.editflag = true;
                this.articletitle = title;
                this.articleurl = url;
                this.minitext = minitext;
                this.articleid = id;
                this.publish = publish;

            },
            addarticle() {
                this.error = [];
                this.editflag = false;
                this.articletitle = null;
                this.articleurl = null;
                this.minitext = null;
                this.articleid = null;
                this.publish = null;
            },
            savearticle() {
                let that = this;

                let data = {
                    editflag: this.editflag,
                    articleid: this.articleid,
                    groupid: this.groupid,
                    articletitle: this.articletitle,
                    url: this.articleurl,
                    minitext: this.minitext,
                    publish: this.publish,
                };

                axios.post('/dashboard/savearticle', data)
                    .then(function (response) {
                        $('#Modal').modal('toggle');
                        that.reloadPage();
                    }).catch((error) => {
                    that.error = error.response.data.errors;
                });
            },


        },

        mounted() {

            this.groupid = this.articlegroupid;
            this.reloadPage();
        }


    }
</script>

<style scoped>

    .select-group {
        min-width: 250px;
        width: fit-content;
        display: inline-block;
    }
</style>
