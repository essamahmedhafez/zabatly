<div id="frame">
<div class="container">
    <div id="carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active" id="item1">
                <?php require 'homeCarousel.php'; ?>
            </div>
            <div class="item" id="item2">
                <?php require 'homeCarousel2.php'; ?>  
            </div>
            <div class="item" id="item3">
                <?php require 'homeCarousel3.php'; ?>  
            </div>
        </div>
        <ul class="nav nav-pills nav-justified">
            <li data-target="#carousel1" data-slide-to="0" class="active">
                <a href="#">mikaniky</a>
            </li>
            <li data-target="#carousel1" data-slide-to="1">
                <a href="#">sabak</a>
            </li>
            <li data-target="#carousel1" data-slide-to="2">
                <a href="#">gazmagy</a>
            </li>
        </ul>
    </div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />

<style>
#item1{
    background-color: #E6E6E6;
}
#item2{
    background-color: #E6E6E6;
}
#item3{
    background-color: #E6E6E6;
}
#frame{
    width:100%;
}
#carousel1 .nav a small {
    display: block;
}
#carousel1 .nav {
    background: #eee;
}
.nav-justified > li > a {
    border-radius: 0px;
}
.nav-pills > li[data-slide-to="0"].active a {
    background-color: #E6E6E6;
}
.nav-pills > li[data-slide-to="1"].active a {
    background-color: #E6E6E6;
}
.nav-pills > li[data-slide-to="2"].active a {
    background-color: #E6E6E6;
}
</style>

<script type="text/javascript">
    jQuery(function ($) {
        $('#carousel1').carousel({
            interval: 2000
        });

        var clickEvent = false;

        $('#carousel1').on('click', '.nav a', function () {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');
        }).on('slid.bs.carousel', function (e) {
            if (!clickEvent) {
                var count = $('.nav').children().length - 1;
                var current = $('.nav li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if (count == id) {
                    $('.nav li').first().addClass('active');
                }
            }
            clickEvent = false;
        });
    });
</script>