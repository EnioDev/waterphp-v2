<?php load('template/header'); ?>

<body>
    <main role="main" class="container">
        <div class="starter-template">
            <div class="text-center">
                <img src="<?php echo asset('images/attention.png'); ?>" />
            </div>
            <br>
            <div class="alert alert-danger">
                <div class="text-left text-truncate">
                    <?php
                        echo '<b>Code</b>: '.$code.'<br>';
                        echo '<b>Type</b>: '.$title.'<br>';
                        echo '<b>Message</b>: '.$message.'<br>';
                        echo '<b>File</b>: '.$file.'<br>';
                        echo '<b>Line</b>: '.$line;
                    ?>
                </div>
                <div class="text-center">
                    <a href="<?php echo base_url(); ?>">
                        <span class="glyphicon glyphicon-home"></span>Home
                    </a>
                </div>
            </div>
        </div>
    </main>

    <?php load('template/footer'); ?>