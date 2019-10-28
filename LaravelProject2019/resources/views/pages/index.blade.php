@extends ('layouts.app')

@section ('title', 'Homepage')

@section('stylesheets')


@endsection

@section ('content')

    <div class="jumbotron" style="background-color:#2d2d2d; margin-top: 25px;">
        <h1 class="display-4">Portfolio: Erhan Akin</h1>
        <p class="lead">Welcome! Instead of showing a boring resumé, I decided to make this website dedicated to all the projects I have worked on.</p>
        <p class="lead">As a (front end) developer, I am mainly focussing on a diverse set of tasks that range from designing to actually building functional websites and services</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="/assignments" role="button">See Projects</a>
    </div>


    <?php
        foreach ($pages as $page) { ?>
            <h1> <?php echo $page->title ?></h1>
            <p> <?php echo $page->content ?></p>
    <?php } ?>

@endsection

