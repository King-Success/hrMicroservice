@extends('layouts.master')

@section('content')

  <div class="item">
    <div class="item-bg">
      <img src="/images/a2.jpg" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href="#" class="pull-left m-r-md">
            <span class="avatar w-96">
              <img src="/images/a2.jpg">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h4 class="m-a-0 m-b-sm">{{$employee->surname}} {{$employee->other_names}}</h4>
            <p class="text-muted"><span class="m-r">UX/UI Director</span> <small><i class="fa fa-map-marker m-r-xs"></i>{{$employee->address}}</small></p>
            <div class="block clearfix m-b">
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook indigo"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-twitter"></i>
                <i class="fa fa-twitter light-blue"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus red"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-linkedin cyan-600"></i>
              </a>
            </div>
            <!--
            <a href="#" class="btn btn-sm warn rounded success active m-b" data-ui-toggle-class="success">
              <span class="inline">Follow</span>
              <span class="none">Following</span>
            </a>
            -->
          </div>
        </div>
        <!--
        <div class="col-sm-5">
          <p class="text-md profile-status">I am feeling good!</p>
          <button class="btn btn-sm rounded btn-outline b-success" data-toggle="collapse" data-target="#editor">Edit</button>
          <div class="collapse box m-t-sm" id="editor">
            <textarea class="form-control no-border" rows="2" placeholder="Type something..."></textarea>
          </div>
        </div>
        -->
      </div>
    </div>
  </div>
  <div class="white bg b-b p-x">
    <div class="row">
      <div class="col-sm-6 push-sm-6">
        <div class="p-y text-center text-sm-right">
            <a href="/employee/{{$employee->id}}/edit" class="btn rounded b-dark">Edit</a>
          <!--
          <a href="#" class="inline p-x b-l b-r text-center">
            <span class="h4 block m-a-0">250</span>
            <small class="text-xs text-muted">Following</small>
          </a>
          <a href="#" class="inline p-x text-center">
            <span class="h4 block m-a-0">89</span>
            <small class="text-xs text-muted">Activities</small>
          </a>
          -->
        </div>
      </div>
      <div class="col-sm-6 pull-sm-6">
        <div class="p-y-md clearfix nav-active-dark">
          <ul class="nav nav-pills nav-sm">
            <li class="nav-item active">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_1">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_2">Department</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_3">Rank</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_4">Pay Grade</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_5">Bank</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_6">Pension</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_7">Allowances</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="padding">
    <div class="row">
      <div class="col-sm-8 col-lg-9">
        <div class="tab-content">      
          <div class="tab-pane p-v-sm active" id="tab_1">
            <div class="streamline m-b">
                <!-- Begin -->
                <div class="row m-b">
                  <div class="col-xs-6">
                    <small class="text-muted">Home Phone</small>
                    <div class="_500">{{$employee->mobile_home}}</div>
                  </div>
                  <div class="col-xs-6">
                    <small class="text-muted">Work Phone</small>
                    <div class="_500">{{$employee->mobile_work}}</div>
                  </div>
                </div>
                <div class="row m-b">
                  <div class="col-xs-6">
                    <small class="text-muted">Gender</small>
                    <div class="_500">{{$employee->gender}}</div>
                  </div>
                  <div class="col-xs-6">
                    <small class="text-muted">Date of Birth</small>
                    <div class="_500">{{$employee->dob}}</div>
                  </div>
                </div>
                <div>
                  <small class="text-muted">Bio</small>
                  <div>Nil</div>
                </div>
                <!-- End -->
            </div>
          </div>
          
          <div class="tab-pane p-v-sm" id="tab_2">
            <div class="streamline">
                <!-- Begin -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Department</h2><small></small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    {!! Form::open(array('url' => '/employeedepartmentinfo/create', 'id'=>'department', 'role' => 'form', 'method'=>'POST')) !!}
                                    <div class="form-group">
                                      <label>Department</label>
                                        <select class="form-control c-select" name="department" id="InputDepartment">
                                            @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->title}}</option>
                                            @endforeach
                                        </select>                        
                                    </div>
                                    <input type="hidden" name="employee" value="{{$employee->id}}">
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
          </div>
          
          <div class="tab-pane p-v-sm" id="tab_3">
            <div class="streamline">
                <!-- Begin -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Rank</h2><small></small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    {!! Form::open(array('url' => '/employeerankinfo/create', 'id'=>'rank', 'role' => 'form', 'method'=>'POST')) !!}
                                    <div class="form-group">
                                      <label>Rank</label>
                                        <select class="form-control c-select" name="rank" id="InputRank">
                                            @foreach($ranks as $rank)
                                            <option value="{{$rank->id}}">{{$rank->title}}</option>
                                            @endforeach
                                        </select>        
                                    </div>
                                    <input type="hidden" name="employee" value="{{$employee->id}}">
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  {!! Form::close() !!}
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
          </div>
          
          <div class="tab-pane p-v-sm" id="tab_4">
            <div class="streamline">
                <!-- Begin -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Pay Grade</h2><small></small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    {!! Form::open(array('url' => '/employeepaygradeinfo/create', 'id'=>'paygrade', 'role' => 'form', 'method'=>'POST')) !!}
                                    <div class="form-group">
                                      <label>Pay Grade</label>
                                        <select class="form-control c-select" name="paygrade" id="InputPaygrade">
                                            @foreach($paygrades as $paygrade)
                                            <option value="{{$paygrade->id}}">{{$paygrade->title}}</option>
                                            @endforeach
                                        </select>                      
                                    </div>
                                    <input type="hidden" name="employee" value="{{$employee->id}}">
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
          </div>
          
          
          <div class="tab-pane p-v-sm" id="tab_5">
              <div class="row row-sm">
                <!-- BEGIN -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Bank Setup</h2><small>Bank Information.</small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    {!! Form::open(array('url' => '/employeebankinfo/create', 'id'=>'bank', 'role' => 'form', 'method'=>'POST')) !!}
                                    <div class="form-group">
                                      <label>Account Name</label>
                                      <input type="text" name="account_name" class="form-control" required>                        
                                    </div>
                                    <div class="form-group">
                                      <label>Account Number</label>
                                      <input type="text" name="account_number" class="form-control" required>                        
                                    </div>
                                    <div class="row m-b">
                                      <div class="col-sm-6">
                                        <label>Bank</label>
                                        <select class="form-control c-select" name="bank" id="InputBank">
                                            @foreach($banks as $bank)
                                            <option value="{{$bank->id}}">{{$bank->title}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      <div class="col-sm-6">
                                        <label>Sort Code</label>
                                        <input type="text" name="sort_code" class="form-control">      
                                      </div>   
                                    </div>
                                    <input type="hidden" name="employee" value="{{$employee->id}}">   
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
              </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_6">
            <!-- BEGIN -->
            <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Pension Setup</h2><small>Pension Information.</small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    {!! Form::open(array('url' => '/employeepensioninfo/create', 'id'=>'pension', 'role' => 'form', 'method'=>'POST')) !!}
                                    <div class="row m-b">
                                      <div class="col-sm-6">
                                        <label>Name of PFA</label>
                                        <select class="form-control c-select" name="pension" id="InputPension">
                                            @foreach($pensions as $pension)
                                            <option value="{{$pension->id}}">{{$pension->title}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      <div class="col-sm-6">
                                        <label>Pin Number</label>
                                        <input type="number" name="pin_number" id="InputPinNumber" class="form-control">     
                                      </div>   
                                    </div>
                                    <input type="hidden" name="employee" value="{{$employee->id}}">   
                                    <button type="submit" class="btn black m-b" id="updatePension">SAVE</button>
                                  {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--- END -->
          </div>
          
          <div class="tab-pane p-v-sm" id="tab_7">
            <div class="streamline">
                <!-- Begin -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Allowances</h2><small></small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    <form action="#" class="">
                                    
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
          </div>
          
        </div>
      </div>
      <!--
      <div class="col-sm-4 col-lg-3">
        <div>
          <div class="box info">
            <div class="box-body">
              <a href="#" class="pull-left m-r">
                <img src="/images/a0.jpg" class="img-circle w-40">
              </a>
              <div class="clear">
                <a href="#">@Mike Mcalidek</a>
                <small class="block text-muted">2,415 followers / 225 tweets</small>
                <a href="#" class="btn btn-sm btn-rounded btn-info m-t-xs"><i class="fa fa-twitter m-t-xs"></i> Follow</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      -->
    </div>
  </div>

@stop


@section('jsFooter')

<script type="text/javascript">
    $( document ).ready(function() {
        
    });
</script>

@stop