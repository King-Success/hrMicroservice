@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
  <div class="p-y-lg clearfix">
    <div class="text-center">
      <h2 class="_700 m-b">It's pay day already?</h2>
      <h5 class="m-b-md">Click on "Start Now" to generate the payroll</h5>
      <a href="#" class="btn rounded btn-outline b-info text-info p-x-md m-y">Start Now</a>
    </div>
    <div class="row">
        <div class="col-md-6 offset-sm-3">
            <div class="box">
                <div class="box-header">
                    <h2>Payroll</h2><small>Create a new payroll</small>
                </div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <form>
                                <div class="form-group">
                                    <label for="InputTitle">Title</label>
                                    <input name="title" class="form-control" id="InputTitle" required placeholder="Enter Title" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Description (optional)</label>
                                    <textarea name="description" class="form-control" rows="3" data-minwords="6" placeholder="Description"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 </div>
<!-- ############ PAGE END-->
@stop