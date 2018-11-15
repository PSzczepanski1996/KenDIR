<html>
    <head>
        <title>ＫｅｎＤＩＲ　ンニニ</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href='style.css' type='text/css' rel='stylesheet'>
        <meta charset="UTF-8">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="#">ＫｅｎＤＩＲ　ンニニ</a>
        </nav>
        <div class="container-fluid">
        <ul class="list-group">
                <?php
                    $dir_listing = scandir('builds');
                    $dir_amount = count($dir_listing);
                    if($dir_amount > 2){
                        for($i = 2; $i < $dir_amount; $i++){
                            print('<li class="list-group-item">');
                            print('<a href="builds/'.$dir_listing[$i].'">'.$dir_listing[$i].'</a>');
                            $shorten_fname = explode('.', $dir_listing[$i])[0];
                            $created_path = 'build_info/'.$shorten_fname.'.info';
                            if(file_exists($created_path)){
                                $build_info = parse_ini_file($created_path, true);
                                if(isset($build_info['build_details']['version']))
                                    $version = $build_info['build_details']['version'];
                                if(isset($build_info['build_details']['compiler']))
                                    $compiler = $build_info['build_details']['compiler'];
                                if(isset($version) || isset($compiler)){
                                    print('<div class="info-bar">');
                                    if(isset($version)){
                                        print('<div class="ver-info">Ver: '.$version.'</div>');
                                    }
                                    if(isset($compiler)){
                                        print('<div class="compiler">compiled by '.$compiler.'</div>');
                                    }
                                    print('</div>');
                                }
                            }
                            print('</li>');
                        }
                    } else {
                        print('<div class="alert alert-danger">No builds in dir catalogue!</div>');
                    }
                ?>
            </ul>
        </div>
    </body>
</html>