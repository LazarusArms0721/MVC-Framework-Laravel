@extends ('layouts.app')

@section ('title', 'Dashboard Contacts')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 assignments-container">

        <h1>Form Submissions</h1>


        @foreach($contacts as $contact)
            <div class="assignment">

                <div class="left-side">
                    <h1>{{$contact->name}}</h1>
                    <p>{{$contact->created_at}}</p>
                    <p>{{$contact->message}}</p>
                    <div class="bpos button-group">
                        <a href="/assignments/{{$contact->id}}" class="btn btn-primary">
                            Read More
                        </a>

                        <a href="/blog-filter?assignment_id={{$contact->id}}" class="btn btn-secondary">
                            Blogposts
                        </a>
                    </div>
                </div>





            </div>
        @endforeach

        <div class="row">
            <div class="col-12 text-center">
                {{ $contacts->links() }}
            </div>
        </div>




    </div>

@endsection

