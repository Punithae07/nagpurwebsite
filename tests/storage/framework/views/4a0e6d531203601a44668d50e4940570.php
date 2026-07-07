<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start page-content -->
    <div class="main-content">

        <!-- Section: inner-header -->
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Contact Us</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: About -->
       <div class="contact-us-page1-area">
            <div class="container">
             <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <h2 class="title-default-left title-bar-high">Information</h2>
                            </div>
                        </div>
                        <div class="contact-us-info1">
                            <ul>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <h3>Phone</h3>
                                    <p>+0484 – 2238722 / 09946122947</p>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h3>Address</h3>
                                    <p>Auxilium School, Binny Road, Palluruthy,<br> Kochi 682006, Kerala.</p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <h3>E-mail</h3>
                                    <p>auxipal94@yahoo.in</p>
                                </li>
                                <li>
                                    <h3>Follow Us</h3>
                                    <ul class="contact-social">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <h2 class="title-default-left title-bar-high">Contact With Us</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="contact-form1">
                                 <!-- Contact Form -->
                        <form id="contact_form" name="contact_form"
                            action="<?php echo e(route('frontend.pages.contact-us-details')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name <small>*</small></label>
                                        <input name="name" class="form-control" type="text" placeholder="Enter Name"
                                            maxlength="100" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <small>*</small></label>
                                        <input name="email" class="form-control required email" type="email"
                                            maxlength="100" placeholder="Enter Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">Subject <small>*</small></label>
                                        <input name="subject" class="form-control required" type="text" maxlength="200"
                                            placeholder="Enter Subject" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input name="phone" class="form-control" type="text" maxlength="10"
                                            placeholder="Enter Phone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" class="form-control required" rows="5" placeholder="Enter Message" required></textarea>
                            </div>
                            <div class="form-group margin-bottom-none">
                                <input name="submit" class="form-control" type="hidden" value="" />
                                <button type="submit"
                                    class="default-big-btn disabled"
                                    data-loading-text="Please wait...">Send your message</button>
                                <button type="reset"
                                    class="default-big-btn disabled">Reset</button>
                            </div>
                        </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="google-map-area">
                        <div id="googleMap" style="width:100%; height:395px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1568.460082733769!2d76.276498!3d9.925169!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b08727ea393a47d%3A0xa16582549ca81380!2sAuxilium%20School%2C%20Palluruthy%2C%20Kochi%2C%20Kerala%20682006%2C%20India!5e1!3m2!1sen!2sus!4v1725943989309!5m2!1sen!2sus" width="100%" height="390" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page-content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $("#contact_form").validate({
            submitHandler: function(form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before(
                    '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
                );
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $(form).ajaxSubmit({
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'true') {
                            $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function() {
                            $(form_result_div).fadeOut('slow')
                        }, 6000);
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/pages/contact-us.blade.php ENDPATH**/ ?>