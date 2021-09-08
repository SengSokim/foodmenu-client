<form method="GET" @submit.prevent="submit" id="createProductVariant" v-cloak>
    <div class="modal fade" id="createVariant" tabindex="-1" role="dialog" aria-hidden="true" style="width: 100vw">
        <div class="modal-dialog" role="document" style="max-width: 80vw">
            <div class="modal-content" style="max-width: 70vw">
                <div class="modal-header">
                <h5 class="modal-title">Product Variants</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="row pt-3 pl-3">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-left"></i> Back</button>
                        <button type="sumbit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="variant_name">Name</label>
                        <input type="text" class="form-control name" v-model="data.name" placeholder="Variant Name..." required>
                    </div>
                    <div class="form-group">
                        <label for="display_sequence">Dispaly Sequence</label>
                        <input type="number" class="form-control" v-model="data.sequence" placeholder="Dispaly Sequence...">
                    </div>
                    <div class="form-group m-0">
                        <input type="checkbox" v-model="data.enable_status">
                        <label for="status"> Active</label>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="card-tools">
                            <button class="btn btn-warning btn-sm rounded-pill" :disabled="isAddNew || isEdit" @click="addVariantValue"  title="Create Variant"><i class="far fa-plus fa-fw"></i>Create New</button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th class="text-center">#</th>
                                  <th scope="col">Variant Name</th>
                                  <th scope="col" class="text-center">Extra Price</th>
                                  <th scope="col" class="text-center">Display Sequence</th>
                                  <th scope="col" class="text-center">Status</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="(value, index) in data.values" :key="index + '-' + value.isEdit">
                                      <!-- Edit -->
                                      <template v-if="value.isEdit">
                                          <td></td>
                                          <td><input type="text" name="name" class="form-control" v-model="data_adding.name"></td>
                                          <td><input type="number" step="0.05" name="extra_price" class="form-control" v-model="data_adding.extra_price"></td>
                                          <td><input type="number" name="sequence" class="form-control" v-model="data_adding.sequence"></td>
                                          <td class="text-center"><input type="checkbox" name="enable_status" v-model="data_adding.enable_status"></td>
                                          <td class="text-center">
                                              <button v-if="!!data_adding.name && !!data_adding.name" type="button" @click="confirmEdit(); Object.assign(value, data_adding); value.isEdit = false;" class="btn btn-success btn-sm" title="Confirm"><i class="fa fa-check"></i></button>
                                              <button type="button" @click="cancelEdit(); value.isEdit = false;" class="btn btn-danger btn-sm" title="Cancel"><i class="fa fa-ban"></i></button>
                                          </td>                        
                                      </template>
                  
                                      <!-- Display -->
                                      <template v-else>
                                          <td>@{{ index + 1 }}</td>
                                          <td>@{{ value.name }}</td>
                                          <td>@{{ value.extra_price }}</td>
                                          <td>@{{ value.sequence }}</td>
                                          <td class="text-center">@{{ value.enable_status == 1 ? 'Active' : 'Deactive' }} </td>
                                          <td class="text-center">
                                              <template v-if="!isEdit">
                                                  <button type="button" class="btn btn-success btn-sm" @click="editVariantValue(); data_adding = Object.assign({}, value); value.isEdit = true" title="Edit Variant">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" @click="selected_variant_index = index; removeVariantValue()" class="btn btn-danger btn-sm" title="Delete Variant">
                                                      <i class="fa fa-trash" title="Delete"></i>
                                                  </button>
                                              </template>
                                          </td>
                                      </template>
                                  </tr>
                                  
                                  <!-- Empty data-->
                                  <tr v-if="data.values.length == 0"> 
                                      <td colspan="99" class="text-center">No data</td>
                                  </tr>
                  
                                  <!-- Add New-->
                                  <tr v-if="isAddNew">
                                      <td></td>
                                      <td><input type="text" name="name" class="form-control" v-model="data_adding.name"></td>
                                      <td><input type="number" step="0.05" name="extra_price" class="form-control" v-model="data_adding.extra_price"></td>
                                      <td><input type="number" name="sequence" class="form-control" v-model="data_adding.sequence"></td>
                                      <td class="text-center"><input type="checkbox" name="enable_status" v-model="data_adding.enable_status"></td>
                                      <td class="text-center">
                                          <button @click="confirmAdd" v-if="data_adding.name" class="btn btn-success btn-sm" title="Confirm"><i class="fa fa-check"></i></button>
                                          <button @click="cancelAdd" class="btn btn-danger btn-sm" title="Cancel"><i class="fa fa-ban"></i></button>
                                      </td>
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="card-footer">
                          @include('layouts.pagination') 
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
