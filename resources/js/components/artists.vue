<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Artists table</h3>

                        <div class="card-tools">
                            <button class="btn btn-success"  @click="newModal">New Artist <i
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
                            <th>Full_name</th>
                            <th>Specialization</th>
                            <th>date_birthday</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="artist in artists" :key="artist.artist_id">
                            <td>{{ artist.artist_id }}</td>
                            <td>{{artist.full_name}}</td>
                            <td>{{artist.specialization}}</td>
                            <td>{{artist.date_birthday}}</td>
                            <td>
                                <a href="#" @click="editModal(artist)">
                                    <i class="fa fa-edit"></i>
                                </a>
                                /
                                <a href="#" @click="deleteArtist(artist.artist_id)">
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
        <div class="modal fade" id="addNewArtist" tabindex="-1" role="dialog" aria-labelledby="addNewArtist"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewArtist">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewArtist">Update title info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateArtist() : createArtist()" >
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.full_name" type="text" name="full_name"
                                       placeholder="full_name"
                                       class="form-control" :class="{'is-invalid': form.errors.has('full_name')}">
                                <has-error :form="form" field="full_name"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.specialization" type="text" name="specialization"
                                       placeholder="specialization"
                                       class="form-control" :class="{'is-invalid': form.errors.has('specialization')}">
                                <has-error :form="form" field="specialization"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.date_birthday" type="date" name="date_birthday"
                                       placeholder="date_birthday"
                                       class="form-control" :class="{'is-invalid': form.errors.has('date_birthday')}">
                                <has-error :form="form" field="date_birthday"></has-error>
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
                artists: {},
                form: new Form({
                    artist_id: '',
                    full_name: '',
                    specialization: '',
                    date_birthday: '',
                })
            }
        },
        methods: {
            updateArtist(){
                // console.log('Editing data');
                this.$Progress.start();
                this.form.put('api/Artist/'+this.form.artist_id)
                    .then(()=>{
                        //succes
                        $('#addNewArtist').modal('hide');
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
                $('#addNewArtist').modal('show');
            },
            editModal(main_title){
                this.editmode = true;
                this.form.reset();
                $('#addNewArtist').modal('show');
                this.form.fill(main_title);
            },
            deleteArtist(id){
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
                        this.form.delete('api/Artist/' + id)
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
            loadArtists() {
                axios.get("api/Artist").then((data)=>{
                    this.artists=data.data;
                });
            },
            createArtist() {
                this.$Progress.start();

                this.form.post('api/Artist')
                    .then(()=>{
                        Fire.$emit('AfterCreated');
                        $('#addNewArtist').modal('hide');
                        this.loadArtists();
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
            this.loadArtists()  ;
            Fire.$on('AfterCreated', ()=>{
                this.loadArtists();
            });
         //   setInterval(()=>this.loadUsers(), 3000);
        }
    }
</script>
