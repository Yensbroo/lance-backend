@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container" id="project">
            <h3>Maak een nieuw project</h3>
            <form method="POST" action="/projects">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <span class="errors">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                </div>
                    <div class="form-group">
                        <label for="category">Categorie</label>
                        <br>
                        <select name="category_id" class="select_style form-control">
                            <option value="">Kies een categorie...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="errors">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start van het project</label>
                        <br>
                        <input type="datetime-local" class="form-control" name="project_start" min="{{$todayFormat}}" value="{{ old('project_start') }}">
                        @if ($errors->has('project_start'))
                        <span class="errors">
                            <strong>{{ $errors->first('project_start') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="endDate">Einde project</label>
                        <br>
                        <input type="datetime-local" class="form-control" name="project_end" min="{{$todayFormat}}" value="{{ old('project_end') }}">
                        @if ($errors->has('project_end'))
                        <span class="errors">
                            <strong>{{ $errors->first('project_end') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group ">
                        <label for="budget">Budget</label>
                        <br>
                        <input type="number" class="form-control" name="budget" value="{{ old('budget') }}">
                        @if ($errors->has('budget'))
                        <span class="errors">
                            <strong>{{ $errors->first('budget') }}</strong>
                        </span>
                        @endif
                    </div>
                <div class="form-group">
                    <label for="body">Beschrijving</label>
                    <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <span class="errors">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                        @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-create">Maak project</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection