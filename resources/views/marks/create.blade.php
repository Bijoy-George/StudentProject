@extends('layouts.app')

@section('content')
<div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              	@if (isset($marks))
              		<h3 class="card-title">Edit Marks</h3>
              	@else
                	<h3 class="card-title">Create Marks</h3>
                @endif

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <a href="{{ url('marks') }}" class="btn btn-block btn-default"><i class="fas fa-chevron-left"></i> Back</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<div id="msg" class="p-2"></div>
              	@if(isset($marks))
					{!! Form::model($marks, ['method' => 'POST', 'class' => 'form-upload', 'route' => ['marks.store']]) !!}
				@else
					{!! Form::open(array('route' => 'marks.store', 'class' => 'form-upload', 'method'=>'POST')) !!}
				@endif
				{{ Form::hidden('id') }}
        <input type="hidden" class="callback" value="form_basic_redirect">
          <input type="hidden" class="arg" value="1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Student</label>
                      {{ Form::select('student_id', $students,null, array('class' => 'form-control', 'placeholder' => 'Select Student')) }}
                      <span class="error" id ="student_id_err"></span>
                    </div>
                  </div> 
                  <?php $terms = config('constant.terms');?> 

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Term</label>
                      {{ Form::select('term', $terms, null, array('class' => 'form-control', 'id' => 'term', 'placeholder' => 'Select')) }}
                      <span class="error" id ="term_err"></span>
                    </div>
                  </div> 
                   <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Maths</label>
                      {{ Form::number("maths_mark", null, array('class' => 'form-control', 'placeholder' => 'Enter Mark','required' => true)) }}
                      <span class="error" id ="maths_mark_err"></span>
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Science</label>
                      {{ Form::number("scince_mark", null, array('class' => 'form-control', 'placeholder' => 'Enter Mark','required' => true)) }}
                      <span class="error" id ="scince_mark_err"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">History</label>
                      {{ Form::number("history_mark", null, array('class' => 'form-control', 'placeholder' => 'Enter Mark','required' => true)) }}
                      <span class="error" id ="history_mark_err"></span>
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