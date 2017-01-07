@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
  <div class="p-y-lg clearfix" id="tagline">
    <div class="text-center">
      <h2 class="_700 m-b">It's pay day already?</h2>
      <h5 class="m-b-md">Click on "Start Now" to generate the payroll</h5>
      <a href="#" class="btn rounded btn-outline b-info text-info p-x-md m-y" id="startNow">Start Now</a>
    </div>
  </div>
    <div class="row" id="new_payroll_form" style="display: none">
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
                                <button type="submit" class="btn black m-b">Create</button>
                                <a href="#" class="b-primary text-info p-x-md m-y" id="btnCancel">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- ############ PAGE END-->
@stop

@section('jsFooter')
 <script type="text/javascript">
    $( document ).ready(function() {
        $('#startNow').on('click', function(evt){
            evt.preventDefault();
            $('#tagline').css('display', 'none');
            $('#new_payroll_form').css('display', 'inline');
        });
        $('#btnCancel').on('click', function(evt){
            evt.preventDefault();
            $('#tagline').css('display', 'inline');
            $('#new_payroll_form').css('display', 'none');
        });
    });
 </script>
@stop