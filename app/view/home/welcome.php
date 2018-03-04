<?php load('template/header'); ?>

<body>
    <main role="main" class="container">
        <div class="starter-template">
            <img class="mb-4" src="<?php echo asset('images/elephant.png'); ?>" alt="PHP Elephant">
            <h1>
                <span class="text-primary">WaterPHP</span> Framework
            </h1>
            <p class="lead">
                <pre class="text-truncate">You are in the <strong>/view/home/welcome.php</strong> file.</pre>
            </p>
            <a href="<?php echo (auth()) ? route('user') : route('login'); ?>" class="btn btn-primary btn-lg">
                CRUD Example
            </a>
        </div>
    </main>

    <?php load('template/footer'); ?>