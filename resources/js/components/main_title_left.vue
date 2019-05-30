<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Main titles left side</h3>

                        <div class="card-tools">
                            <button class="btn btn-success"  @click="newModal">New Title <i
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
                            <th>Text English</th>
                            <th>Text China</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="main_title in main_title_lefts" :key="main_title.main_title_id">
                            <td>{{ main_title.main_title_id }}</td>
                            <td>{{main_title.english_text}}</td>
                            <td>{{main_title.china_text}}</td>

                            <td>
                                <a href="#" @click="editModal(main_title)">
                                    <i class="fa fa-edit"></i>
                                </a>
                                /
                                <a href="#" @click="deleteTitle(main_title.main_title_id)">
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
        <div class="modal fade" id="addNewTitle" tabindex="-1" role="dialog" aria-labelledby="addNewTitleLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewTitleLabel">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewTitleLabel">Update title info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateTitle() : createTitle()" >
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.english_text" type="text" name="english_text"
                                       placeholder="Text english"
                                       class="form-control" :class="{'is-invalid': form.errors.has('english_text')}">
                                <has-error :form="form" field="english_text"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.china_text" type="text" name="china_text"
                                       placeholder="Text china"
                                       class="form-control" :class="{'is-invalid': form.errors.has('china_text')}">
                                <has-error :form="form" field="china_text"></has-error>
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
                main_title_lefts: {},
                form: new Form({
                    main_title_id: '',
                    english_text: '',
                    china_text: '',
                })
            }
        },
        methods: {
            updateTitle(){
                // console.log('Editing data');
                this.$Progress.start();
                this.form.put('api/MainTitleLeft/'+this.form.main_title_id)
                    .then(()=>{
                        //succes
                        $('#addNewTitle').modal('hide');
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
                $('#addNewTitle').modal('show');
            },
            editModal(main_title){
                this.editmode = true;
                this.form.reset();
                $('#addNewTitle').modal('show');
                this.form.fill(main_title);
            },
            deleteTitle(id){
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
                        this.form.delete('api/MainTitleLeft/' + id)
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
            loadTitles() {
                axios.get("api/MainTitleLeft").then((data)=>{
                    this.main_title_lefts=data.data;
                });
            },
            createTitle() {
                this.$Progress.start();

                this.form.post('api/MainTitleLeft')
                    .then(()=>{
                        Fire.$emit('AfterCreated');
                        $('#addNewTitle').modal('hide');
                        this.loadTitles();
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
            this.loadTitles();
            Fire.$on('AfterCreated', ()=>{
                this.loadTitles();
            });
         //   setInterval(()=>this.loadUsers(), 3000);
        }
    }
</script>
