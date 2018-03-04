<?php load('template/header'); ?>

<body>
    <main role="main" class="container">
        <div class="starter-template">
            <img src="<?php echo asset('images/stop.png'); ?>" />
            <h1>404 Not found</h1>
            <div class="alert alert-danger">
                This will always be shown whether controller or method passed on the URL doesn't exist.
            </div>
            <a href="<?php echo base_url(); ?>" class="btn btn-md btn-primary">
                <span class="glyphicon glyphicon-home"></span>Home
            </a>
        </div>
    </main>

    <?php load('template/footer'); ?>