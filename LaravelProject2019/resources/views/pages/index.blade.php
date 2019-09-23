@extends ('layouts.app')

@section ('title', 'Homepage')

@section('stylesheets')


@endsection

@section ('content')

    <div class="jumbotron" style="background-color:#2d2d2d; margin-top: 25px;">
        <h1 class="display-4">Welcome to my Homepage!</h1>
        <p class="lead">This is the portfolio page for Erhan Akin. On this website you will find different projects I have contributed on.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

    <?php
        foreach ($pages as $page) { ?>
            <h1> <?php echo $page->title ?></h1>
            <p> <?php echo $page->content ?></p>
    <?php } ?>

@endsection

