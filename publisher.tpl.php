<?php 
    /**
    * Template Name: Publisher Page
    */
?>
<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/angular-material.min.css">

<?php 
    $insert = 0;
    if(isset($_POST['hdnSubmit']) && $_POST['hdnSubmit'])
    {
        $insertArray = array(
        'company_name' => $_POST['companyName'], 
        'first_name' => $_POST['firstName'], 
        'last_name' => $_POST['lastName'], 
        'email' => $_POST['email'], 
        'password' => $_POST['password'], 
        'contact_no' => $_POST['contactno'], 
        'form_type' => 'publisher', 
        'created_date' => strtotime('now')
        );
        
        $insert = $wpdb->insert("{$wpdb->prefix}signup_form_data", $insertArray);
    }
?>

<?php if(have_posts()){ ?>

    <?php while(have_posts()){ the_post(); ?>
        <?php $postMetas = get_post_meta(get_the_ID()); ?>
        <?php /*echo "<pre>"; print_r($postMetas); die; */?>
        <div class="row top2">
            <div class="overlay">
                <div class="overlay-gradient"></div>
            </div>
            <div class="video">
                <?php if(get_post_meta(get_the_ID(), 'wpcf-select-image', true) == 1){ ?>
                    <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-image', true); ?>" alt="">
                    <?php }else{ ?>
                    <?php } ?>
            </div>

            <div class="container">

                <div class="col-lg-12 head" align="center">
                    <h3><a href="<?php bloginfo('siteurl'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo2.png" style="width:100%; max-width:400px;"></a></h3>
                    <?php the_title('<h4>', '</h4>'); ?>
                    <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'wpcf-short-description', true)); ?>
                </div>
            </div>

        </div>

        <div class="row top3">
            <div class="container">
                <div class="col-lg-12 head2" align="center">
                    <h4>KEY BENEFITS</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col-lg-4 key" align="center">
                    <h2><a href="#" class="btn btn-big btn-black2"  style="color:#333;">
                            <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                        </a></h2>

                     <h2><?php echo get_post_meta(get_the_ID(), 'wpcf-key-benefit-title-1', true); ?></h2>
                    <p><?php echo get_post_meta(get_the_ID(), 'wpcf-key-benefit-description-1', true); ?></p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4 key" align="center">
                    <h2><a href="#" class="btn btn-big btn-black2"  style="color:#333;"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span></a></h2>
                     <h2><?php echo get_post_meta(get_the_ID(), 'wpcf-key-benefit-title-2', true); ?></h2>
                    <p><?php echo get_post_meta(get_the_ID(), 'wpcf-key-benefit-description-2', true); ?></p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4 key" align="center">
                    <h2><a href="#" class="btn btn-big btn-black2"  style="color:#333;"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></a></h2>
                     <h2><?php echo get_post_meta(get_the_ID(), 'wpcf-key-benefit-title-3', true); ?></h2>
                    <p><?php echo get_post_meta(get_the_ID(), 'wpcf-key-benefit-description-3', true); ?></p>

                </div><!-- /.col-lg-4 -->
            </div>
        </div>


        <div class="row midd">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="row top4">
            <div class="container">
                <div class="col-lg-12 head2" align="center">

                    <h4>SIGN UP</h4>
                    <!--<p class="midd">
                    of the printing and  typesetting industry. Lorem Ipsum has been the industry's</p>-->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">

                <div layout="column" flex id="content">
                    <md-content layout="column" flex class="md-padding">

                        <div class="alert alert-success alert-dismissible" role="alert" ng-show="submitted">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Data submitted succesfully.
                        </div>

                        <div ng-repeat="(k, v) in errors" ng-show="errors">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>{{ k }}: </strong> {{ v }}
                            </div>
                        </div>
                    
                        <md-content class="md-padding" ng-hide="submitted">
                            <form name="userForm" ng-submit="submitForm()" novalidate>
                                <input type="hidden" name="hdnSubmit" value="1">

                                <div layout="row" layout-align="center center">
                                    <md-input-container flex="55">
                                        <label>Company Name</label>
                                        <input ng-model="user.name" required name="name">
                                    </md-input-container>
                                </div>

                                <div layout layout-sm="column">
                                    <md-input-container flex>
                                        <label>First Name</label>
                                        <input ng-model="user.first_name" required name="first_name">
                                    </md-input-container>
                                    <md-input-container flex>
                                        <label>Last Name</label>
                                        <input ng-model="user.last_name" name="last_name">
                                    </md-input-container>
                                </div>
                                <div layout layout-sm="column">
                                    <md-input-container flex>
                                        <label>Email</label>
                                        <input ng-model="user.email" name="email" type="email" required>
                                        <div ng-show="errors.email">{{ errors.email }}</div>
                                    </md-input-container>
                                    <md-input-container flex>
                                        <label>Contact no</label>
                                        <input ng-model="user.phone" name="phone" required>
                                    </md-input-container>
                                </div>

                                <div layout layout-sm="column">
                                    <md-input-container flex>
                                        <label>Password</label>
                                        <!--<input type="Password" name="password" id="password" ng-model="user.password" ng-required="true">-->
                                        <input data-ng-model='user.password1' type="password" name='password1' required>
                                    </md-input-container>
                                    <md-input-container flex>
                                        <label>Confirm Password</label>
                                        <!--<input type="Password" name="confirmPassword" ng-model="user.confirmPassword" ng-compare="password" ng-required="true">-->
                                        <input ng-model='user.password2' type="password" name='password2' required data-password-verify="user.password1">
                                    </md-input-container>
                                </div>


                                <section layout="row" layout-sm="column" layout-align="center center">
                                    <button type="submit" class="sign btn btn-big btn-black" ng-disabled="userForm.$invalid">Sign Up</button>
                                </section>

                            </form>
                        </md-content>

                    </md-content>
                </div>

            </div>
        </div>
        <?php } ?>

    <?php } ?>


<!-- Angular Material Dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular-aria.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.7.1/angular-material.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/registration.js" type="text/javascript"></script>

<?php get_footer(); ?>