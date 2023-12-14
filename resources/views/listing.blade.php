@extends('layout')
@section('content')
<section>
    <div>
        <p>
            <h2>
                {{$listing['id']}}
            </h2>
            {{$listing['description']}}
        </p>
    </div>


</section>
@endsection