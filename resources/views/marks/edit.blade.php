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
                    {!! Form::open(['route'=>'update-marks']) !!}
                        {!! Form::hidden('id', $marksData->id) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Student Name</label>
                                    {!! Form::select('student',$students,(isset($marksData->student_id))?$marksData->student_id:'', ['class'=>'form-control', 'placeholder'=>'Select a student', 'readonly'=>'readonly']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Term</label>
                                    {!! Form::select('term',['one'=>'One', 'two'=>'Two'],(isset($marksData->term))?$marksData->term:'', ['class'=>'form-control', 'placeholder'=>'Select a term']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Maths</label>
                                    {!! Form::text('maths', (isset($marksData->maths))?$marksData->maths:'', ['class'=>'form-control maths', 'placeholder'=>'Maths']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Science</label>
                                    {!! Form::text('science', (isset($marksData->science))?$marksData->science:'', ['class'=>'form-control science', 'placeholder'=>'Science']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">History</label>
                                    {!! Form::text('history', (isset($marksData->history))?$marksData->history:'', ['class'=>'form-control history', 'placeholder'=>'History']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Total</label>
                                    {!! Form::text('total',(isset($marksData->total))?$marksData->total:'0', ['class'=>'form-control total', 'placeholder'=>'Total', 'readonly'=>'readonly']) !!}
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

@section('custom_scripts')
    <script>
        let total   = 0;
        $('.maths, .science, .history').keypress(function(){
            total = total + parseInt($(this).val());
            $('.total').val(total);
        })
    </script>
@endsection






