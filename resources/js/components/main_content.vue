<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Main Content</h3>

                        <div class="card-tools">
                            <button class="btn btn-success"  @click="newModal">New Content <i
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
                            <th>Title English</th>
                            <th>Title China</th>
                            <th>Photo</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="main_content in main_contents" :key="main_content.main_content_id">
                            <td>{{main_content.main_content_id }}</td>
                            <td>{{main_content.title_english}}</td>
                            <td>{{main_content.title_china}}</td>
                            <td>{{main_content.photo}}</td>
                            <td>
                                <a href="#" @click="editModal(main_content)">
                                    <i class="fa fa-edit"></i>
                                </a>
                                /
                                <a href="#" @click="deleteContent(main_content.main_content_id)">
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
        <div class="modal fade" id="addNewContent" tabindex="-1" role="dialog" aria-labelledby="addNewContent"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewContent">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewContent">Update title info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateContent() : createCont()" >
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
                                <label for="photo"  class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file"  @change="addPhoto"  name="photo" id="photo">
                                </div>
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
                main_contents: {},
                form: new Form({
                    main_content_id:'',
                    title_english: '',
                    title_china: '',
                    photo: '',
                })
            }
        },
        methods: {
            addPhoto(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                let vm = this;
                if(file['size'] < 222111775){
                    reader.onloadend = (file)=>{
                        // console.log('RESULT', reader.result)
                        this.form.photo = reader.result;
                    };
                    reader.readAsDataURL(file);
                }else{
                    swal.fire(
                        'Oops...',
                        'You are uploading to large file!',
                        'error'
                    )
                }
            },
            updateContent(){
                // console.log('Editing data');
                this.$Progress.start();
                this.form.put('api/MainContent/'+this.form.main_content_id)

                    .then(()=>{
                        //succes
                        console.log(this);
                        $('#addNewContent').modal('hide');
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
                $('#addNewContent').modal('show');
            },
            editModal(main_title){
                this.editmode = true;
                this.form.reset();
                $('#addNewContent').modal('show');
                this.form.fill(main_title);
            },
            deleteContent(id){
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
                        this.form.delete('api/MainContent/' + id)
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
                axios.get("api/MainContent").then((data)=>{
                    this.main_contents=data.data;
                });
            },
            createCont() {
                this.$Progress.start();

                this.form.post('api/MainContent')
                    .then(()=>{
                        Fire.$emit('AfterCreated');
                        $('#addNewContent').modal('hide');
                        this.loadCont();
                        toast.fire({
                            type: 'success',
                            title: 'Content Created in successfully'
                        });
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                    })
            },

        },
        created() {
            this.loadCont();
            Fire.$on('AfterCreated', ()=>{
                this.loadCont();
            });
         //   setInterval(()=>this.loadUsers(), 3000);
        }
    }
</script>
