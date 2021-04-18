@extends('templates.layouts.master')

@section('contents')

    <div class="row">
        <!-- [ Form Validation ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{$pageTitle}}</h5>
                </div>
                <div class="card-body">

                    {!! Form::open(['route'=>'update-student']) !!}
                        {!! Form::hidden('id', $studentData->id) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    {!! Form::text('name', (isset($studentData->name))?$studentData->name:'', ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Age</label>
                                    {!! Form::text('age', (isset($studentData->age))?$studentData->age:'' , ['class'=>'form-control', 'placeholder'=>'Age']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    {!! Form::select('gender',['F'=>'Female', 'M'=>'Male'], (isset($studentData->gender))?$studentData->gender:'', ['class'=>'form-control', 'placeholder'=>'Gender']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    {!! Form::select('teacher',$teachers, (isset($studentData->teacher_id))?$studentData->teacher_id:'', ['class'=>'form-control', 'placeholder'=>'Teacher']) !!}
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn  btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection


