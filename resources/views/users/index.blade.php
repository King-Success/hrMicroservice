@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <!--<div class="box-header">-->
                <!--    <h2>Employees</h2><small>Employee information</small></div>-->
                <!--<div class="box-divider m-a-0"></div>-->
                <div class="col-sm-6 push-sm-6">
                    <div class="p-y text-center text-sm-right">
                        <a href="/user/create" class="btn rounded b-dark">Add</a>
                    </div>
              </div>
              <div class="col-sm-6 pull-sm-6 box-header">
                  <h2>User</h2><small>User information</small>
              </div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <div class="table-responsive" id="datatable">
                            <table id="users" class="table b-t b-b"  data-ui-jp="dataTable" data-ui-options="{
                                  lengthChange: false,
                                  buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
                                  'initComplete': function () {
                                    this.api().buttons().container()
                                      .appendTo( '#datatable .col-md-6:eq(0)' );
                                  }
                                }" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$counter }}</td>
                                        <td><a href="/user/{{$user->id}}/edit">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                    @endforeach
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

@stop


@section('jsFooter')

<script type="text/javascript">
    $( document ).ready(function() {
        
    });
</script>

@stop