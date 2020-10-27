@extends ('layouts.app')

@section ('title', 'Dashboard Contacts')

@section('stylesheets')


@endsection

@section ('content')


    <div class="col-md-8 offset-2 assignments-container">

        <h1>Contact Form Submissions</h1>


        @foreach($contacts as $contact)
            <div class="assignment">

                <div class="left-side">
                    <h1>{{$contact->name}}</h1>
                    <p>{{$contact->created_at}}</p>
                    <p>{{$contact->message}}</p>
                    <div class="bpos button-group">
                        <a id="delete-contact" href="" class="btn btn-outline-danger">
                            Verwijderen
                        </a>

                        {{--<a href="/blog-filter?assignment_id={{$contact->id}}" class="btn btn-secondary">--}}
                            {{--Blogposts--}}
                        {{--</a>--}}
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

@section('scripts')

    <script>
        var buttonsContact = document.querySelectorAll('#delete-contact');

        @if (Auth()->user()->hasRole(App\Role\UserRole::ROLE_ADMIN))


        for (var i = 0; i < buttonsContact.length; i++){
            buttonsContact[i].onclick = function(e){
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Once you delete this contact, the action cannot be undone",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Cancel",
                    showConfirmButton: true,
                    confirmButtonColor: '#e3342f',
                    confirmButtonText: "<a style='color: white !important;' href='/dashboard/contact/{{$contact->id}}/delete'>Yes, I'm sure</a>",
                })

            }
        }

        @endif



    </script>



@endsection

