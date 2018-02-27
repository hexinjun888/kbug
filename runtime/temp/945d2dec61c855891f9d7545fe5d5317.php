<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:45:"D:\phpStudy\WWW\kbug/templates/ace/login.html";i:1519727478;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="templates/ace/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="templates/ace/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="templates/ace/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="templates/ace/assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="templates/ace/assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="templates/ace/assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="templates/ace/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="templates/ace/assets/js/html5shiv.min.js"></script>
		<script src="templates/ace/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="space-6"></div>
							<div class="position-relative" style="margin-top: 150px">

								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												<?php echo lang('loginPage.title'); ?>
											</h4>

											<div class="space-6"></div>
											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input id='user' type="text" class="form-control" placeholder="<?php echo lang('loginPage.userName'); ?>" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input type="password" id="password" class="form-control" placeholder="<?php echo lang('loginPage.passWord'); ?>" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline pull-right">
															<input type="checkbox" class="ace" />
															<span class="lbl"> <?php echo lang('loginPage.remember'); ?></span>
														</label>

														<button type="button" id='loginButton' class="width-35 pull-left btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110"><?php echo lang('loginPage.loginButton'); ?></span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													<?php echo lang('loginPage.forgetPassword'); ?>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-indexogin-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="templates/ace/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="templates/ace/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='templates/ace/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
            jQuery(function($) {
                $(document).on('click', '.toolbar a[data-target]', function(e) {
                    e.preventDefault();
                    var target = $(this).data('target');
                    $('.widget-box.visible').removeClass('visible');//hide others
                    $(target).addClass('visible');//show target
                });
                $('#findPassWordSureButton').click(function(){
                    $.ajax({
                        type : 'POST',
                        url : "<?php echo url('/forgetPassword'); ?>",
                        data : {email:$('#emailAddress').val()},
                        dataType : 'json',
                        success : function(res) {
                            if(res.code == 1)
                            {
                                $('#myModal').modal('hide');
                                jSuccess(res.msg+"!", {
                                    VerticalPosition: 'center',
                                    HorizontalPosition: 'center'
                                });

                            }else{
                                jError(res.msg+"!", {
                                    VerticalPosition: 'center',
                                    HorizontalPosition: 'center'
                                });
                            }
                        }

                    });
                });

                $('#loginButton').click(function(){
                    $.ajax({
                        type : 'POST',
                        url : "<?php echo url('/login'); ?>",
                        data : {user:$('#user').val(),password:$('#password').val()},
                        dataType : 'json',
                        success : function(res) {
                            if(res.code == 1)
                            {
                                jSuccess(res.msg+"!", {
                                    VerticalPosition: 'center',
                                    HorizontalPosition: 'center'
                                });
                                window.location.href = res.url;
                            }else{
                                jError(res.msg+"!", {
                                    VerticalPosition: 'center',
                                    HorizontalPosition: 'center'
                                });
                            }
                        }

                    });
                });
            });
		</script>

	</body>
</html>
