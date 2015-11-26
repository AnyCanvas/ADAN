<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
            <!-- Input and button to next page columns-->
            <div class="row mid-row center-block"
                 style="padding-top: 3em;">
                <div class="col-xs-1"></div>
                <div class="col-xs-10">
                    <p class="text-center text-nowrap"
                       style="color: white; font-size: 1.2em;">
                        Escribe el nombre de la Fanbot
                    </p>
                </div>
                <div class="col-xs-1"></div>
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-12">
                    <div id="indexDiv"
                         class="center-block">
                        <div class="col-xs-5"
                             style="padding: 0px;">
                            <img src="media/images/maquina.png"
                                 class="img-responsive center-block"
                                 alt="maquina"
                                 style="height: 160px; margin-right: 0;">
                        </div>
                        <div class="col-xs-7"
                             style="padding: 0px;">
                            <form class="form"
                                  action="node.php"
                                  method="get"
                                  style="padding-top: 50px; padding-left: 0px;">
                                <div class="input-group square-box">
                                    <input type="text"
                                         class="form-control input-lg text-center lead text-lowercase inline-text square-box"
                                         name="name">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Logo img-->
            <div class="bottom center-block">
                <div class="fb_logo-row row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <img class="img-responsive center-block"
                             src="media/clients/logos/fanbot.png"
                             alt="fanbot"
                             width="200">
                    </div>
                    <div class="col-xs-4"></div>
                </div>
            </div>
        </div>
    </body>
</html>
