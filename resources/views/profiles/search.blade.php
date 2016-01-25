<div class="search-form  col-xs-12 col-md-4 pull-right">
    {!! Form::open(array('route' => 'profiles.search', 'class'=>'form  searchform')) !!}
    <div class="col-xs-9">
        {!! Form::text('search', null, array('required','class'=>'form-control ','placeholder'=>'Search by name...')) !!}
    </div>
    <div class="col-xs-3">
        {!! Form::submit('Search',  array('class'=>'btn btn-default ')) !!}
    </div>
    {!! Form::close() !!}
</div>
