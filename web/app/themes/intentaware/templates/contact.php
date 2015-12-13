<!--Template Name: contact -->
<?php $page = (get_page_by_title("Contact Us"));
        $packet = get_the_post_thumbnail($page->ID);
        $src = preg_match_all('@[(a-zA-z//:0-9/.)]+@i', $packet, $matches);
        
    if(has_post_thumbnail($page->ID))
    {
        $image = ($matches[0][6]);
    }
    else
    {
        ?>
            <div id="tf-contact" class="text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Feel free to <strong>contact us</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em><?php echo $page->post_content; ?></em></small>            
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <label class="mdl-textfield__label" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="mdl-textfield__input" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <label class="mdl-textfield__label" for="exampleInputPassword1">Password...</label>
                                    <input type="password" class="mdl-textfield__input" id="exampleInputPassword1">
                                </div>
                            </div>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <label class="mdl-textfield__label" for="exampleInputEmail1">Message</label>
                            <textarea class="mdl-textfield__input" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
        <?php
    }
    ?>

