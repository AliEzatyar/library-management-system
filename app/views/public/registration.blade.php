@extends('account.index')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module module-login span8 offset2">
                <form class="form-vertical" action="{{ URL::route('student-registration-post') }}" method="POST">
                    <div class="module-head">
                        <h3>Student Registration Form</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span6" type="text" placeholder="First Name" name="first" value="{{ Input::old('first') }}" />
                                <input class="span6" type="text" placeholder="Last Name" name="last" value="{{ Input::old('last') }}" />

                                @if($errors->has('first'))
                                    <span class="text-error">{{ $errors->first('first') }}</span>
                                @endif
                                @if($errors->has('last'))
                                    <span class="text-error">{{ $errors->first('last') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span4" type="number" placeholder="Roll number" name="rollnumber" value="{{ Input::old('rollnumber') }}" />

                                <select class="span4" style="margin-bottom: 0;" name="branch">
                                    <option value="">-- Select Branch --</option>
                                    @foreach($branch_list as $branch)
                                        <option value="{{ $branch->id }}" {{ Input::old('branch') == $branch->id ? 'selected' : '' }}>{{ $branch->branch }}</option>
                                    @endforeach
                                </select>

                                <input class="span4" type="number" placeholder="Year" name="year" value="{{ Input::old('year') }}" />

                                @if($errors->has('rollnumber'))
                                    <span class="text-error">{{ $errors->first('rollnumber') }}</span>
                                @endif
                                @if($errors->has('branch'))
                                    <span class="text-error">{{ $errors->first('branch') }}</span>
                                @endif
                                @if($errors->has('year'))
                                    <span class="text-error">{{ $errors->first('year') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span8" type="email" placeholder="Email ID" name="email" value="{{ Input::old('email') }}" />

                                <select class="span4" style="margin-bottom: 0;" name="category">
                                    <option value="">-- Select Category --</option>
                                    @foreach($student_categories_list as $student_category)
                                        <option value="{{ $student_category->cat_id }}" {{ Input::old('category') == $student_category->cat_id ? 'selected' : '' }}>{{ $student_category->category }}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('email'))
                                    <span class="text-error">{{ $errors->first('email') }}</span>
                                @endif
                                @if($errors->has('category'))
                                    <span class="text-error">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-info pull-right">Register for Library</button>
                                {{ Form::token() }}
                            </div>
                        </div>
                        <a href="{{ URL::route('account-sign-in') }}">Go Back!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

