<style>
.widget-user-header {
    background-position: center center;
    background-size: cover;
    height: 250px !important;
}
.widget-user .card-footer {
    padding: 0;
}
</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div
                        class="widget-user-header text-white"
                        style="background-image:url('img/user-cover.jpg');"
                    >
                        <h3 class="widget-user-username text-right">
                            Elizabeth Pierce
                        </h3>
                        <h5 class="widget-user-desc text-right">
                            Web Designer
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="" alt="User Avatar" />
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">3,200</h5>
                                    <span class="description-text">SALES</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">13,000</h5>
                                    <span class="description-text"
                                        >FOLLOWERS</span
                                    >
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">35</h5>
                                    <span class="description-text"
                                        >PRODUCTS</span
                                    >
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
            <!-- end tabs -->
            <div class="col-md-12 mt-1">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    href="#activity"
                                    data-toggle="tab"
                                    >Activity</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="#settings"
                                    data-toggle="tab"
                                    >Settings</a
                                >
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Activity Tab -->
                            <div class="tab-pane active" id="activity">
                                <h1>
                                    ACTIVITY PANE
                                </h1>
                            </div>
                            <!-- /.Activity Tab -->
                            <!-- Setting Tab -->
                            <div class="tab-pane active show" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label
                                            for="inputName"
                                            class="col-sm-2 control-label"
                                            >Name</label
                                        >

                                        <div class="col-sm-12">
                                            <input
                                                type=""
                                                class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('name') }"
                                                id="inputName"
                                                placeholder="Name"
                                                v-model="form.name"
                                            />
                                            <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="inputEmail"
                                            class="col-sm-2 control-label"
                                            >Email</label
                                        >

                                        <div class="col-sm-12">
                                            <input
                                                type="email"
                                                class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('email') }"
                                                id="inputEmail"
                                                placeholder="Email"
                                                v-model="form.email"
                                            />
                                            <has-error :form="form" field="email"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="inputExperience"
                                            class="col-sm-2 control-label"
                                            >Experience</label
                                        >

                                        <div class="col-sm-12">
                                            <textarea
                                                class="form-control"
                                                id="inputExperience"
                                                placeholder="Experience"
                                            ></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="photo"
                                            class="col-sm-2 control-label"
                                            >Profile Photo</label
                                        >
                                        <div class="col-sm-12">
                                            <input
                                                @change="updateProfile"
                                                type="file"
                                                name="photo"
                                                class="form-input"
                                            />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="password"
                                            class="col-sm-12 control-label"
                                            :class="{ 'is-invalid': form.errors.has('password') }"
                                            >Password (Leave empty if not
                                            changing)</label
                                        >
                                        <div class="col-sm-12">
                                            <input
                                                v-model="form.password"
                                                type="password"
                                                class="form-control"
                                                id="password"
                                                placeholder="Password"
                                            />
                                            <has-error :form="form" field="password"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <button
                                                @click.prevent="updateInfo"
                                                type="submit"
                                                class="btn btn-success"
                                            >
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.Settings Tab -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                id: "",
                name: "",
                email: "",
                password: "",
                type: "",
                bio: "",
                photo: ""
            })
        };
    },
    mounted() {
        console.log("Component mounted");
    },
    methods: {
        updateInfo() {
            this.$Progress.start();
            this.form
                .put("api/profile")
                .then(() => {
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        updateProfile(e) {
            let file = e.target.files[0];
            let reader = new FileReader();

            if (file.size < 2111775) {
                reader.onloadend = file => {
                    this.form.photo = reader.result;
                };
                reader.readAsDataURL(file);
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: "You are uploading a very big file"
                });
            }
        }
    },
    created() {
        axios.get("api/profile").then(({ data }) => this.form.fill(data));
    }
};
</script>
