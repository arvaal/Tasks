
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?php echo DIR . '/views/css/style.css'; ?>"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="<?php echo $menu['logo']['href']; ?>"><?php echo $menu['logo']['text']; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <?php foreach ($menu['menu'] as $item) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $item['href']; ?>"><?php echo $item['text']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php echo $content; ?>
        </div>
        <footer class="container">
            <p>© Company 2017-2018</p>
        </footer>
    </body>
</html>