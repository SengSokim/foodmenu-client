<div class="row">
    <div class="col-md-12">
        <div class="row mx-2 mt-3">
            <h5><i class="nav-icon fas fa-users"></i><label class="px-1">Customer</label></h5>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Main</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-read" value="customers-read" v-model="data.data">
                                            <label class="custom-control-label" for="customers-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-create" value="customers-create" v-model="data.data">
                                            <label class="custom-control-label" for="customers-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-update" value="customers-update" v-model="data.data">
                                            <label class="custom-control-label" for="customers-update">Update</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-delete" value="customers-delete" v-model="data.data">
                                            <label class="custom-control-label" for="customers-delete">Delete</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Document</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-document-read" value="customers-document-read" v-model="data.data">
                                            <label class="custom-control-label" for="customers-document-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-document-create" value="customers-document-create" v-model="data.data">
                                            <label class="custom-control-label" for="customers-document-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Note</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-note-read" value="customers-note-read" v-model="data.data">
                                            <label class="custom-control-label" for="customers-note-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-note-create" value="customers-note-create" v-model="data.data">
                                            <label class="custom-control-label" for="customers-note-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Status</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customers-status-update" value="customers-status-update" v-model="data.data">
                                            <label class="custom-control-label" for="customers-status-update">Update</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>