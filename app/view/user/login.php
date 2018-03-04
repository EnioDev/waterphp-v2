<?php load('template/header'); ?>

<body class="text-center">
    <form class="form-signin" action="<?php echo route('login'); ?>" method="post">
        <img class="mb-4" src="<?php echo asset('images/elephant.png'); ?>" alt="PHP Elephant" width="96" height="96">
        <h1 class="h3 mb-3 font-weight-normal">
            <?php echo strings()->login->title, ' '; ?>
            <a href="<?php echo route('register'); ?>">
                <?php echo strings()->register->title; ?>
            </a>
        </h1>

        <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <label for="email" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address" autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><?= strings()->button->login; ?></button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>

    <?php load('template/footer'); ?>