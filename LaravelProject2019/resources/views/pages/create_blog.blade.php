@extends ('layouts.app')

@section ('Title', 'Contact Us')

@section ('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Contact Me</h1>
            <hr>
            <form method="POST" action="/blog-action">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">

                <label for="email" class="mt-3">Email</label>
                <input type="email" name="email" class="form-control">

                <label for="message" class="mt-3">Message</label>
                <textarea name="message" cols="30" rows="10" class="form-control"></textarea>

                <button type="sumbit" class="btn btn-success btn-block mt-3">Send Email</button>

            </form>
        </div>
    </div>

@endsection