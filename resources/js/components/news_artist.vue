<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Artists table</h3>

                        <div class="card-tools">
                            <button class="btn btn-success"  @click="newModal">New news  <i
                                    class="fas fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Artist</th>
                            <th>category english</th>
                            <th>category china</th>
                            <th>date news</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="news in newsArtists" :key="news.news_id">
                            <td>{{news.news_id }}</td>
                            <td>{{news.artist.full_name}}</td>
                            <td>{{news.category_english}}</td>
                            <td>{{news.category_china}}</td>
                            <td>{{news.date_news}}</td>
                            <td>
                                <a href="#" @click="editModal(news)">
                                    <i class="fa fa-edit"></i>
                                </a>
                                /
                                <a href="#" @click="deleteNews(news.news_id)">
                                    <i class="fa fa-trash-alt text-red"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNewNews" tabindex="-1" role="dialog" aria-labelledby="addNewNews"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewNews">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewNews">Update title info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" @submit.prevent="editmode ? updateNews() : createNews()" >
                        <div class="modal-body">
                            <div class="form-group">
                                <select v-model="form.artist_id" name="artist_id">
                                    <option  v-for="artist in artists"
                                            :value="artist.artist_id"
                                    >{{artist.full_name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input v-model="form.category_english" type="text" name="category_english"
                                       placeholder="category_english"
                                       class="form-control" :class="{'is-invalid': form.errors.has('category_english')}">
                                <has-error :form="form" field="category_english"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.category_china" type="text" name="category_china"
                                       placeholder="category_china"
                                       class="form-control" :class="{'is-invalid': form.errors.has('category_china')}">
                                <has-error :form="form" field="category_china"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.date_news" type="date" name="date_news"
                                       placeholder="date_news"
                                       class="form-control" :class="{'is-invalid': form.errors.has('date_news')}">
                                <has-error :form="form" field="date_news"></has-error>
                            </div>
                            <div class="form-group" v-for="(row , index) in form.rows">
                                    <input placeholder="Titel to your photo" class="form-control mb-2" type="text" v-model="row.photo_title">

                                    <input  class="mb-2" name="photo"  type="file" @change="setFilename($event, row)"  :id="index">
                                    <input placeholder="China text" class="form-control mb-2" type="text" v-model="row.text_china">
                                    <input placeholder="English text" class="form-control mb-2" type="text" v-model="row.text_english">
                                    <a v-on:click="removeElement(index)"  class="btn btn-warning" >Remove row</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                            <button v-show="!editmode" type="button" class="btn btn-success" @click="addRow">Add row</button>
                            <button v-show="editmode" type="button" class="btn btn-success" @click="fillRows">Show Content</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                artists:{},
                editmode: false,
                newsArtists: {},
                form: new Form({
                    news_id: '',
                    artist_id: '',
                    category_english: '',
                    category_china: '',
                    date_news:'',
                    rows: [],
                })
            }
        },
        methods: {
            addRow: function() {
                var elem = document.createElement('div');
                this.form.rows.push({
                    photo_title: "",
                    photo: "",
                    text_english: "",
                    text_china: ""
                });
            },
            fillRows: function(){
                axios.get('api/NewsContent/'+this.form.news_id).then((data)=>{
                    if(data.data['content'].length < 0){
                       // console.log(data.data['content']);
                    }
                        this.form.rows=data.data['content'];
                });

            },
            removeElement: function(index) {
                this.form.rows.splice(index, 1);
            },
            setFilename: function(event, row) {
                let file = event.target.files[0];
                console.log(file);
                let reader = new FileReader();

                let vm = this;
                if(file['size'] < 12111775){
                    reader.onloadend = (file)=>{
                        // console.log('RESULT', reader.result)
                       row.photo = reader.result;
                    };
                    reader.readAsDataURL(file);
                }else{
                }
            },
            updateNews(){

                // console.log('Editing data');
                this.$Progress.start();
               // this.form.rows.get('api/NewsArtist/getNews', this.form.id);
                this.form.put('api/NewsArtist/'+this.form.news_id)
                    .then(()=>{
                        //succes
                        $('#addNewNews').modal('hide');
                        swal.fire(
                            'Updated!',
                            'Information has been updated',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreated');
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },
            newModal(){
                this.editmode = false;

                this.form.reset();
                $('#addNewNews').modal('show');
            },
            editModal(main_title){
                this.editmode = true;
                this.form.reset();
                $('#addNewNews').modal('show');
                this.form.fill(main_title);


            },
            deleteNews(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //Send ajax request to the server
                    if(result.value) {
                        this.form.delete('api/NewsArtist/' + id)
                            .then(() => {
                                swal.fire(
                                    'Deleted!',
                                    'Your title has been deleted.',
                                    'success'
                                )
                                Fire.$emit('AfterCreated');
                            })
                            .catch(() => {
                                swal.fire(
                                    'Faild!',
                                    'There was somesing wronge.',
                                    'warning'
                                )
                            });
                    }
                })
            },
            loadNews() {
                axios.get("api/NewsArtist").then((data)=>{
                    this.newsArtists=data.data['news'];
                    this.artists = data.data['artists'];
                });
            },
            createNews() {
                this.$Progress.start();
                this.form.post('api/NewsArtist', {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(()=>{
                        Fire.$emit('AfterCreated');
                        $('#addNewNews').modal('hide');
                       // this.loadNews();
                        toast.fire({
                            type: 'success',
                            title: 'Title Created in successfully'
                        });
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            },
        },
        created() {
            this.loadNews()  ;
            Fire.$on('AfterCreated', ()=>{
                this.loadNews();
            });
         //   setInterval(()=>this.loadUsers(), 3000);
        }
    }
</script>
