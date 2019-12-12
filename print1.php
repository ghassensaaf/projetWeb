<html>
<head><link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">




    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

        * {
            margin: 0;
            padding: 0;
            font-family: roboto;
        }



        .cont {
            width: 93%;
            max-width: 350px;
            text-align: center;
            margin: 4% auto;
            padding: 30px 0;
            background: #111;
            color: #EEE;
            border-radius: 5px;
            border: thin solid #444;
            overflow: hidden;
        }

        hr {
            margin: 20px;
            border: none;
            border-bottom: thin solid rgba(255,255,255,.1);
        }

        div.title { font-size: 2em; }

        h1 span {
            font-weight: 300;
            color: #Fd4;
        }

        div.stars {
            width: 270px;
            display: inline-block;
        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>
    <link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
</head></head>
<body onload="window.print()">



<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Mes Avis </strong>
                    </div>

                    <div class="table-stats order-table ov-h">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th class="serial">#</th>


                                <th>Name</th>
                                <th>quantity</th>
                                <th>U Price</th>


                            </tr>
                            </thead>
                            <tbody>

<?php
                            $x=1;



echo'
                                    <tr>
                                    </td>

                                    <td class="serial">' . $x . '.</td>

                                    <td>  <span class="name"> '.$_GET['prodId'].' </span> </td>
                                    <td> <span class="email"> '.$_GET['qty'].' </span> </td>

                                    <td>  <span class="name"> '.$_GET['prix'].' </span> </td>

';


echo'
                                </tr>




                              ';
                                $x++;?>


                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->




</body>
</html>
