@extends('layouts.master')

@section('content')
<!-- ############ PAGE START-->
<div class="row-col">
  <div class="col-sm-3 col-lg-2 b-r">
    <div class="p-y">
      <div class="nav-active-border left b-primary">
        <ul class="nav nav-sm">
          <li class="nav-item">
            <a class="nav-link block active" href="#" data-toggle="tab" data-target="#tab-1">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-2">CargoDrive Settings</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-3">Emails</a>
          </li>
          -->
          <!--
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-4">Notifications</a>
          </li>
          -->
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-5">Security</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-9 col-lg-10 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Company profile</div>
        {!! Form::open(array('url' => '/appsetting/' . $appSetting->id . '/edit', 'role' => 'form', 'method'=>'PUT', 'class' => 'p-a-md col-md-6')) !!}
          <div class="form-group">
            <label>Company logo</label>
            <div class="form-file">
              <input type="file">
              <button class="btn white">Upload Company Logo</button>
            </div>
          </div>
          <div class="form-group">
            <label>Company name</label>
            <input type="text" class="form-control" name="company_title" value="{{$appSetting->company_title}}" placeholder="Enter company name">
          </div>
          
          <div class="form-group">
            <p><label class="md-check"><input class="has-value" name="rank_is_king" type="checkbox" {{$appSetting->rank_is_king ? 'checked' : ''}}> <i class="indigo"></i> Let app use a rank-based salary</label></p>
          </div>
          <input type="hidden" name="tab" value="company_profile"/>
          <button type="submit" class="btn btn-info m-t">Update</button>
        {!! Form::close() !!}
      </div>
      <div class="tab-pane" id="tab-2">
        <div class="p-a-md b-b _600">CargoDrive settings</div>
        {!! Form::open(array('url' => '/appsetting/' . $appSetting->id . '/edit', 'role' => 'form', 'method'=>'PUT', 'class' => 'p-a-md col-md-6')) !!}
          <div class="form-group">
            <label>Client ID</label>
            <input type="text" disabled class="form-control" name="cargodriveClientId" value="{{$appSetting->cargodriveClientId}}">
          </div>
          <div class="form-group">
            <label>Secret Key</label>
            <input type="text" disabled class="form-control" name="cargodriveSecret" value="{{$appSetting->cargodriveSecret}}">
          </div>
          <input type="hidden" name="tab" value="cargodrive"/>
          <button type="submit" class="btn btn-info m-t" disabled="disabled">Update</button>
          {!! Form::close() !!}
        </form>
      </div>
      <!-- <div class="tab-pane" id="tab-3">
        <div class="p-a-md b-b _600">Emails</div>
        <form role="form" class="p-a-md col-md-6">
          <p>E-mail me whenever</p>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone posts a comment
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone follow me
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
            </label>
          </div>
          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>
      </div> -->
      <!-- <div class="tab-pane" id="tab-4">
        <div class="p-a-md b-b _600">Notifications</div>
        <form role="form" class="p-a-md col-md-6">
          <p>Notice me whenever</p>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone seeing my profile page
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone follow me
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
            </label>
          </div>
          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>
      </div> -->
      <div class="tab-pane" id="tab-5">
        <div class="p-a-md b-b _600">Security</div>
        <div class="p-a-md">
          <div class="clearfix m-b-lg">
            {!! Form::open(array('url' => '/appsetting/' . $appSetting->id . '/edit', 'role' => 'form', 'method'=>'PUT', 'class' => 'col-md-6 p-a-0')) !!}
              <div class="form-group">
                <label>Old Password</label>
                <input type="password" name="oldpassword" class="form-control">
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label>New Password Again</label>
                <input type="password" name="confirm_password" class="form-control">
              </div>
              <input type="hidden" name="tab" value="security"/>
              <button type="submit" class="btn btn-info m-t">Update</button>
            {!! Form::close() !!}
          </div>
          <!--
          <p><strong>Delete account?</strong></p>
          <button type="submit" class="btn btn-danger m-t" data-toggle="modal" data-target="#modal">Delete Account</button>
          -->

        </div>
      </div>
    </div>
  </div>
</div>


<!-- .modal -->
<div id="modal" class="modal fade animate black-overlay" data-backdrop="false">
  <div class="row-col h-v">
    <div class="row-cell v-m">
      <div class="modal-dialog modal-sm">
        <div class="modal-content flip-y">
          <div class="modal-body text-center">          
            <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
            <p>Are you sure to delete your account?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn white p-x-md" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">Yes</button>
          </div>
        </div><!-- /.modal-content -->
      </div>
    </div>
  </div>
</div>
<!-- / .modal -->

<!-- ############ PAGE END-->

@stop


@section('jsFooter')

@stop