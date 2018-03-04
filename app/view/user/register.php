<?php load('template/header'); ?>

<body class="text-center">
    <form class="form-signin form-signup" action="<?php echo url('user/store'); ?>" method="post">
        
        <img class="mb-4" src="<?php echo asset('images/elephant.png'); ?>" alt="PHP Elephant" width="96" height="96">

        <?php if (isset($message) && strlen($message) > 0) : ?>
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>

        <?php if (isset($errors) && count($errors) > 0) : ?>
        <div class="alert alert-danger text-left">
            <?php foreach ($errors as $e) : ?>
            <li>
                <?php echo $e; ?>
            </li>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <input type="hidden" name="_token" value="<?php echo session_token(); ?>">

        <input 
            type="text" 
            id="name" 
            name="name" 
            class="form-control" 
            value="<?php echo previous('name') ?? ''; ?>" 
            placeholder="Your name" 
            autofocus />
        <input 
            type="email" 
            id="email" 
            name="email" 
            class="form-control" 
            value="<?php echo previous('email') ?? ''; ?>" 
            placeholder="Email address" />
        <input 
            type="password" 
            id="password" 
            name="password" 
            class="form-control" 
            value="<?php echo previous('password') ?? ''; ?>" 
            placeholder="Password" />

        <input type="submit" name="submit" value="<?= strings()->button->register; ?>" class="btn btn-lg btn-success btn-block" autofocus />
        <a class="btn btn-lg btn-primary btn-block" href="<?php echo route('login'); ?>"><?= strings()->button->login; ?></a>
        <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>

    <?php load('template/footer'); ?>