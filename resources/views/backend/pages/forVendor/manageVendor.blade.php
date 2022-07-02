@extends('backend.masterTemplate.mastertemplate')
@section('foreditvendor')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Vendor</h4>
          <div class="new ">
          <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#AddVendorModal"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add venDor</button>
        </div>
        </div>
         <div class="ml-auto">
          <a href="{{ Route('backenddashboard') }}">Dashboard</a> /
          <a href="{{ Route('vendormanage') }}">manage vendor</a>
        </div>
        
      </div>
<!--VENDOR  ADDMODAL START -->
<!-- Modal -->
<div class="modal fade" id="AddVendorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-bold text-warning ml-auto" id="exampleModalLabel">VENDOR ADDED</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                <!-- vendor name -->
                  <div class="form-group">
                    <label for="">vendor name :</label>
                    <input type="text" class="form-control name" id="" placeholder="Enter VEndor Name">
                    <span class="text-danger nameError"></span>
                  </div>
               <!-- vendor name END -->
              <!-- description -->
                  <div class="form-group">
                    <label for="">Vendor description :</label>
                    <textarea class="form-control description" placeholder="VEndor Description" id="" cols="5" rows="1"></textarea>
                    <span class="text-danger descriptionError"></span>
                  </div>
               <!-- description END -->
              <!-- office_address -->
                  <div class="form-group">
                    <label for="">Vendor office_address :</label>
                    <textarea class="form-control office_address" placeholder="VEndor office_address" id="" cols="5" rows="1"></textarea>
                    <span class="text-danger office_addressError"></span>
                  </div>
               <!-- office_address END -->

              <!-- VENDOR email  -->
                  <div class="form-group">
                    <label for=""> VEndor Email :</label>
                    <input type="email" class="form-control email" id="" placeholder="Vendor Email">
                    <span class="text-danger emailError"></span>
                  </div>
               <!-- VENDOR email END -->
              <!-- VENDOR phone  -->
                  <div class="form-group">
                    <label for=""> VEndor phone :</label>
                    <input type="text" class="form-control phone" id="" placeholder="Vendor phone">
                    <span class="text-danger phoneError"></span>
                  </div>
               <!-- VENDOR email END -->
                </div>
                <div class="col-md-6">
                  <!-- VENDOR operator_name -->
                  <div class="form-group">
                  <label for="">Vendor operator_name :</label>
                    <input type="text" class="form-control operator_name" id="" placeholder="VEndor operator_name">
                    <span class="text-danger operator_nameError"></span>
                  </div>
                  <!-- VENDOR operator_name END -->
                  <!-- VENDOR operator_phone -->
                  <div class="form-group">
                  <label for="">Vendor operator_phone :</label>
                    <input type="text" class="form-control operator_phone" id="" placeholder="VEndor operator_phone">
                    <span class="text-danger operator_phoneError"></span>
                  </div>
                  <!-- VENDOR operator_phone END -->

                  <!-- VENDOR tin Number -->
                  <div class="form-group">
                  <label for="">Vendor tin Number :</label>
                    <input type="text" class="form-control tin" id="" placeholder="VEndor tin">
                    <span class="text-danger tinError"></span>
                  </div>
                  <!-- VENDOR tin END -->

                  <!-- VENDOR trade_number -->
                  <div class="form-group">
                  <label for="">Vendor trade_number  :</label>
                    <input type="text" class="form-control trade_number" id="" placeholder="VEndor trade_number">
                    <span class="text-danger trade_numberError"></span>
                  </div>
                  <!-- VENDOR trade_number END -->

                  <!-- Status-->
                  <div class="form-group">
                    <label for="">Vendor Status : </label>
                    <select class="status form-control" id="">
                      <option value="">---status---</option>
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                    </select>
                    <span class="text-danger statusError"></span>
                  </div>
                  <!-- Ending Date END -->
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-dark btn-sm AddedVendorButton" >Added Vendor</button>
            </div> 
          </div>
        </div>
</div>
<!-- modal end -->
<!-- VENDOR ADDMODAL END -->

<!--VENDOR  EDIT START -->
<!-- Modal -->
<div class="modal fade" id="vendorEditbutton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-bold text-warning ml-auto" id="exampleModalLabel">VENDOR EDITED</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                <!-- vendor name -->
                  <div class="form-group">
                    <label for="">vendor name :</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter VEndor Name">
                    <span class="text-danger nameError"></span>
                  </div>
               <!-- vendor name END -->
              <!-- description -->
                  <div class="form-group">
                    <label for="">Vendor description :</label>
                    <textarea class="form-control" placeholder="VEndor Description" id="description" cols="5" rows="1"></textarea>
                    <span class="text-danger descriptionError"></span>
                  </div>
               <!-- description END -->
               <input type="hidden" id="id">
              <!-- office_address -->
                  <div class="form-group">
                    <label for="">Vendor office_address :</label>
                    <textarea class="form-control" placeholder="VEndor office_address" id="office_address" cols="5" rows="1"></textarea>
                    <span class="text-danger office_addressError"></span>
                  </div>
               <!-- office_address END -->

              <!-- VENDOR email  -->
                  <div class="form-group">
                    <label for=""> VEndor Email :</label>
                    <input type="email" class="form-control" id="email" placeholder="Vendor Email">
                    <span class="text-danger emailError"></span>
                  </div>
               <!-- VENDOR email END -->
              <!-- VENDOR phone  -->
                  <div class="form-group">
                    <label for=""> VEndor phone :</label>
                    <input type="text" class="form-control" id="phone" placeholder="Vendor phone">
                    <span class="text-danger phoneError"></span>
                  </div>
               <!-- VENDOR email END -->
                </div>
                <div class="col-md-6">
                  <!-- VENDOR operator_name -->
                  <div class="form-group">
                  <label for="">Vendor operator_name :</label>
                    <input type="text" class="form-control" id="operator_name" placeholder="VEndor operator_name">
                    <span class="text-danger operator_nameError"></span>
                  </div>
                  <!-- VENDOR operator_name END -->
                  <!-- VENDOR operator_phone -->
                  <div class="form-group">
                  <label for="">Vendor operator_phone :</label>
                    <input type="text" class="form-control" id="operator_phone" placeholder="VEndor operator_phone">
                    <span class="text-danger operator_phoneError"></span>
                  </div>
                  <!-- VENDOR operator_phone END -->

                  <!-- VENDOR tin Number -->
                  <div class="form-group">
                  <label for="">Vendor tin Number :</label>
                    <input type="text" class="form-control" id="tin" placeholder="VEndor tin">
                    <span class="text-danger tinError"></span>
                  </div>
                  <!-- VENDOR tin END -->

                  <!-- VENDOR trade_number -->
                  <div class="form-group">
                  <label for="">Vendor trade_number  :</label>
                    <input type="text" class="form-control" id="trade_number" placeholder="VEndor trade_number">
                    <span class="text-danger trade_numberError"></span>
                  </div>
                  <!-- VENDOR trade_number END -->

                  <!-- Status-->
                  <div class="form-group">
                    <label for="">Vendor Status : </label>
                    <select class="form-control" id="status">
                      <option value="">---status---</option>
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                    </select>
                    <span class="text-danger statusError"></span>
                  </div>
                  <!-- Ending Date END -->
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-warning btn-sm UpdatefinallyVendor" >Update Vendor</button>
            </div> 
          </div>
        </div>
</div>
<!-- modal end -->
<!-- VENDOR Edit END -->

<!--VENDOR  DELETE START -->
<!-- Modal -->
<div class="modal fade" id="vendorDeleteButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-bold text-warning ml-auto" id="exampleModalLabel"> DELETED VENDOR</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="did">
              <div class="text-warning font-weight-bold display-4">
                OPPSSS !! are you Sure! 
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-warning btn-sm DeleteFinally" >delete Vendor</button>
            </div> 
          </div>
        </div>
</div>
<!-- modal end -->
<!-- VENDOR DELETE END -->

<!-- Edit Coupon Delete END -->






      <div class="br-pagebody">
          <div class="msg"></div>
        <div class="card bd-0 shadow-base">
          <table id="mydataTable" class="display">
            <thead>
              <tr>
                <th>name</th>
                <th>description</th>
                <th>office_address</th>
                <th>email</th>
                <th>phone</th>
                <th>operator_name</th>
                <th>operator_phone</th>
                <th>tin</th>
                <th>trade_number</th>
                <th>status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="vendorDetails">
              <tr>
                <td>name</td>
                <td>description</td>
                <td>office_address</td>
                <td>email</td>
                <td>phone</td>
                <td>operator_name</td>
                <td>operator_phone</td>
                <td>tin</td>
                <td>trade_number</td>
                <td>status</td>
                <td>
                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#CouponEdit"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#CouponDelete"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <!-- modal -->
            </tbody>
          </table>
        </div>
      </div><!-- br-pagebody -->
@endsection