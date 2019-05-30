<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Agency table</h3>

                        <div class="card-tools">
                            <button class="btn btn-success"  @click="newModal">New Agency <i
                                    class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>title_english</th>
                            <th>title_china</th>
                            <th>text_english</th>
                            <th>text_china</th>
                            <th>help_text_english</th>
                            <th>help_text_china</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="cont in agency" :key="cont.agency_id">
                            <td>{{cont.agency_id }}</td>
                            <td>{{cont.title_english}}</td>
                            <td>{{cont.title_china}}</td>
                            <td>{{cont.text_english}}</td>
                            <td>{{cont.text_china}}</td>
                            <td>{{cont.help_text_e}}</td>
                            <td>{{cont.help_text_c}}</td>
                            <td>
                                <a href="#" @click="editModal(cont)">
                                    <i class="fa fa-edit"></i>
                                </a>
                                /
                                <a href="#" @click="deleteCont(cont.agency_id)">
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
        <div class="modal fade" id="addNewCont" tabindex="-1" role="dialog" aria-labelledby="addNewCont"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewCont">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewCont">Update title info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" @submit.prevent="editmode ? updateCont() : createCont()" >
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.title_english" type="text" name="title_english"
                                       placeholder="title_english"
                                       class="form-control" :class="{'is-invalid': form.errors.has('title_english')}">
                                <has-error :form="form" field="title_english"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.title_china" type="text" name="title_china"
                                       placeholder="title_china"
                                       class="form-control" :class="{'is-invalid': form.errors.has('title_china')}">
                                <has-error :form="form" field="title_china"></has-error>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.text_english" type="text" name="text_english"
                                       placeholder="text_english"
                                       class="form-control" :class="{'is-invalid': form.errors.has('text_english')}">
                                </textarea>
                                <has-error :form="form" field="text_english"></has-error>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.text_china" type="text" name="text_china"
                                       placeholder="text_china"
                                       class="form-control" :class="{'is-invalid': form.errors.has('text_china')}">
                                </textarea>
                                <has-error :form="form" field="text_china"></has-error>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.help_text_e" type="text" name="help_text_e"
                                          placeholder="help_text_e"
                                          class="form-control" :class="{'is-invalid': form.errors.has('help_text_e')}">
                                </textarea>
                                <has-error :form="form" field="help_text_e"></has-error>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.help_text_c" type="text" name="help_text_c"
                                          placeholder="help_text_c"
                                          class="form-control" :class="{'is-invalid': form.errors.has('help_text_c')}">
                                </textarea>
                                <has-error :form="form" field="help_text_c"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
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
                editmode: false,
                agency:{},
                form: new Form({
                    agency_id: '',
                    title_english:'',
                    title_china: '',
                    text_english: '',
                    text_china:'',
                    help_text_c: '',
                    help_text_e:''
                })
            }
        },
        methods: {

            updateCont(){
                // console.log('Editing data');
                this.$Progress.start();
               // this.form.rows.get('api/NewsArtist/getNews', this.form.id);
                this.form.put('api/Agency/'+this.form.agency_id)
                    .then(()=>{
                        //succes
                        $('#addNewCont').modal('hide');
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
                $('#addNewCont').modal('show');
            },
            editModal(main_title){
                this.editmode = true;
                this.form.reset();
                $('#addNewCont').modal('show');
                this.form.fill(main_title);

            },
            deleteCont(id){
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
                        this.form.delete('api/Agency/' + id)
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
            loadCont() {
                axios.get("api/Agency").then((data)=>{
                    this.agency=data.data['agency'];
                });
            },
            createCont() {
                this.$Progress.start();
                this.form.post('api/Agency', {
                })
                    .then(()=>{
                        Fire.$emit('AfterCreated');
                        $('#addNewCont').modal('hide');
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
            this.loadCont()  ;
            Fire.$on('AfterCreated', ()=>{
                this.loadCont();
            });
         //   setInterval(()=>this.loadUsers(), 3000);
        }
    }
</script>
