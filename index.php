<?php
session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    include "inc/headerCon.php";
}
else
{
    include "inc/header.php";
}

?>

    <main id="main">
        <!-- intro section -->
        <section id="intro">
            <div class="intro-container">
                <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                    <ol class="carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                            <div class="carousel-background"><img src="img/intro-carousel/11.jpg" alt=""></div>
                            <div class="carousel-container">

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-background"><img src="img/intro-carousel/2.jpg" alt=""></div>
                            <div class="carousel-container">

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-background"><img src="img/intro-carousel/3.jpg" alt=""></div>
                            <div class="carousel-container">

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-background"><img src="img/intro-carousel/44.jpg" alt=""></div>
                            <div class="carousel-container">

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-background"><img src="img/intro-carousel/5.jpg" alt=""></div>
                            <div class="carousel-container">

                            </div>
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon fa fa-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon fa fa-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </section>
        <!-- News section -->
        <section id="news">
            <h2>New Products</h2>
            <div class="cat-container container">
                <div class="row">
                    <div class="col-sm">
                        <button class="btn "><a href="#">Categorie 1</a></button>
                    </div>
                    <div class="col-sm">
                        <button class="btn "><a href="#">Categorie 2</a></button>
                    </div>
                    <div class="col-sm">
                        <button class="btn "><a href="#">Categorie 3</a></button>
                    </div>
                </div>
            </div>
            <div class="news-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/prods/1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/prods/1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/prods/1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/prods/1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/prods/1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/prods/1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container view-all">
                    <a style="float: right; margin-right: 100px;margin-top: 1%" href="products.php"> >> view all</a>
                </div>
            </div>
        </section>
    </main>

<?php
include "inc/footer.php";
?>