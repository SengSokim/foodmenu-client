
    <div class="modal fade" id="editVariant" tabindex="-1" role="dialog" aria-hidden="true" style="width: 100vw; margin-top: 5vh">
        <div class="modal-dialog" role="document" style="max-width: 80vw">
            <div class="modal-content" style="max-width: 65vw">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('app.product.vaiants.update-variant') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="row pt-3 pl-3">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.back') }}</button>
                        <button type="submit" form="editProductVariant" class="btn btn-warning rounded-pill btn-sm">{{ __('app.global.save-change') }}</button>
                    </div>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit" id="editProductVariant" v-cloak>
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="variant_name" class="required">{{ __('app.product.vaiants.value.name') }}</label>
                                    <input type="text" class="form-control" :class="{'is-invalid': errors.has('name') }" name="name" v-model="data.name" v-validate="'required'" placeholder="Variant Name...">
                                    <div class="invalid-feedback">@{{ errors.first('name') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="display_sequence">{{ __('app.product.display-sequence') }}</label>
                                    <input type="number" class="form-control" v-model="data.sequence">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group m-0">
                                <input type="checkbox" v-model="data.enable_status">
                                <label for="status"> Active</label>
                            </div>
                            <div class="form-group m-0">
                                <input type="checkbox" v-model="data.is_required">
                                <label for="status"> {{ __('app.product.vaiants.required') }}</label>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row px-3">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>{{ __('app.product.vaiants.variant-values') }}</h5>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="card-tools">
                                        <button class="btn btn-warning btn-sm rounded-pill" :disabled="isAddNew || isEdit" @click="addVariantValue"  title="Create"><i class="far fa-plus fa-fw"></i>{{ __('app.global.create-new') }}</button>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                              <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th scope="col" class="required"><div style="width: 90px"></div> {{ __('app.product.vaiants.value.name') }}</th>
                                    <th scope="col" class="text-center"><div style="width: 130px"></div>{{ __('app.product.vaiants.value.extra-price') }}</th>
                                    <th scope="col" class="text-center">{{ __('app.global.sequence') }}</th>
                                    <th scope="col" class="text-center">{{ __('app.global.status') }}</th>
                                    <th class="text-center"><div style="width: 120px"></div>{{ __('app.global.actions') }}</th>
                                </tr>           
                              <tbody>
                                  <tr v-for="(value, index) in data.values" :key="index + '-' + value.isEdit">
                                      <!-- Edit -->
                                      <template v-if="value.isEdit">
                                          <td></td>
                                          <td><input type="text" name="name" class="form-control" v-model="data_adding.name"></td>
                                          <td><input type="number" step="0.01" name="extra_price" class="form-control" v-model="data_adding.extra_price"></td>
                                          <td><input type="number" name="sequence" class="form-control" v-model="data_adding.sequence"></td>
                                          <td class="text-center"><input type="checkbox" name="enable_status" v-model="data_adding.enable_status"></td>
                                          <td class="text-center">
                                              <button v-if="data_adding.name" type="button" @click="confirmEdit(); Object.assign(value, data_adding); value.isEdit = false;"  class="btn btn-warning rounded-pill btn-sm" style="padding: .425rem .55rem" title="Confirm"><i class="fa fa-check"></i></button>
                                              <button type="button" @click="cancelEdit(); value.isEdit = false;" class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" title="Cancel"><i class="fa fa-ban"></i></button>
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
                                                  <button type="button" class="btn btn-primary rounded-pill btn-sm" style="padding: .425rem .55rem" @click="editVariantValue(); data_adding = Object.assign({}, value); value.isEdit = true" title="Edit Variant">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" @click="selected_variant_index = index; removeVariantValue()" class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" title="Delete Variant">
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
                                      <td><input type="number" step="0.01" name="extra_price" class="form-control" v-model="data_adding.extra_price"></td>
                                      <td><input type="number" name="sequence" class="form-control" v-model="data_adding.sequence"></td>
                                      <td class="text-center"><input type="checkbox" name="enable_status" v-model="data_adding.enable_status"></td>
                                      <td class="text-center">
                                          <button @click="confirmAdd" v-if="data_adding.name" class="btn btn-warning rounded-pill btn-sm" style="padding: .425rem .55rem" title="Confirm"><i class="fa fa-check"></i></button>
                                          <button @click="cancelAdd" class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" title="Cancel"><i class="fa fa-ban"></i></button>
                                      </td>
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
