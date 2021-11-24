@extends('layouts.app')

@section('content')
<div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              	@if (isset($student))
              		<h3 class="card-title">Edit Student</h3>
              	@else
                	<h3 class="card-title">Create Student</h3>
                @endif

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <a href="{{ url('student') }}" class="btn btn-block btn-default"><i class="fas fa-chevron-left"></i> Back</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<div id="msg" class="p-2"></div>
              	@if(isset($student))
					{!! Form::model($student, ['method' => 'POST', 'class' => 'form-upload', 'route' => ['student.store']]) !!}
				@else
					{!! Form::open(array('route' => 'student.store', 'class' => 'form-upload', 'method'=>'POST')) !!}
				@endif
				{{ Form::hidden('id') }}
        <input type="hidden" class="callback" value="form_basic_redirect">
          <input type="hidden" class="arg" value="1">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Student Name')) }}
                      <span class="error" id ="name_err"></span>
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Age</label>
                      {{ Form::number('age', null, array('class' => 'form-control', 'placeholder' => 'Enter Student Age')) }}
                      <span class="error" id ="age_err"></span>
                    </div>
                  </div> 
                  <?php $gender = config('constant.Gender');?>
                  <div class="col-md-4">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Gender</label>
                      {{ Form::select('gender', $gender, null, array('class' => 'form-control', 'id' => 'gender', 'placeholder' => 'Select')) }}
                      <span class="error" id ="gender_err"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                  <?php $reporting_teacher = config('constant.Reporting_teachers');?> 
                   <div class="form-group">
                      <label for="exampleInputEmail1">Reporting Teacher</label>
                      {{ Form::select('reporting_teacher', $reporting_teacher, null, array('class' => 'form-control', 'id' => 'reporting_teacher', 'placeholder' => 'Select')) }}
                      <span class="error" id ="reporting_teacher_err"></span>
                    </div>
                  </div>

                   
    
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <!-- /.card-body -->
              {!! Form::close() !!}
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
@endsection