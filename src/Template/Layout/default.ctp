<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>eVocab</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php
        echo $this->Html->css(['bootstrap.min', 'styles', 'font-awesome.min']);
        ?>
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php echo $this->element('navbar'); ?>

        <!-- Main -->
        <div class="container-fluid contents">
            <div class="row">
                <?php echo $this->Cell('Navigation', ['active' => 1])->render('sidebar'); ?>
                <div class="col-sm-9">
                    <strong>Dashboard</strong>
                    <hr>
                    <div class="container-fluid">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main -->

        <?php echo $this->element('footer'); ?>
    </body>
</html>