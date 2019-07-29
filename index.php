<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>PhilPACS :: Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

      <style type="text/css">
        * {
          box-sizing: border-box;
        }

        :-webkit-input-placeholder {
            color:#888;
            font-style:italic;
        }

        :-moz-placeholder {
            color:#888;
            font-style:italic;
        }

        html {
            height:100%;
            font-size: 100%;
            overflow-y: scroll;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        body {
            -webkit-font-smoothing:antialiased;
            font-size: 16px;
            font-smoothing:antialiased;
            height:100%;
            line-height: 1.5em;
            margin: 0;
            text-align: center;
        }

        .brickwall {
            background-image: url('./assets/logo/login_bg.jpg');
            -webkit-background-size: cover;
               -moz-background-size: cover;
                 -o-background-size: cover;
                    background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            background-image: url('../../img/third.jpg');
            -webkit-background-size: cover;
               -moz-background-size: cover;
                 -o-background-size: cover;
                    background-size: cover;
            background-attachment: fixed;
            mix-blend-mode: normal;
            filter:"progid:DXImageTransform.Microsoft.Blur(PixelRadius='6')";
            -ms-filter:"progid:DXImageTransform.Microsoft.Blur(PixelRadius='6')";
        }

        .blur {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            -webkit-filter: blur(7px);
            filter: url("data:image/svg+xml;utf9,<svg%20version='1.1'%20xmlns='http://www.w3.org/2000/svg'><filter%20id='blur'><feGaussianBlur%20stdDeviation='5'%20/></filter></svg>#blur");
            filter: blur(7px);
            overflow: hidden;
            z-index: -1;
        }

        body, input {
            font-family: helvetica, arial, sans-serif;
            color: #000;
        }

        .loginBox {
            box-shadow:0 0 50px 5px rgba(0,0,0,0.3), 0 0 5px -1px white;
            mix-blend-mode: normal;
            isolation: isolate;
            width:400px;
            padding:1em;
            padding-bottom: 1em;
            text-align:center;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: fixed;
            left: 50%;
            top: 15%;
            margin-left: -200px;
            border-radius: 5px;
        }

        .loginBox:after {
            content: " ";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255,255,255,0.6);
            border-radius: 5px;
            z-index: -1;
            mix-blend-mode: normal;
            border: 1px solid rgba(0,0,0,0.3);
        }

        h1 {
            margin:0;
        }

        .logo a {
            display:block;
            text-decoration:none;
            height: 100px;
        }

        .logo a img {
            max-height:66px;
            max-width: 300px;
            height: auto;
            width: auto;
            vertical-align: middle;
            outline: none;
            border: none;
        }
        .valign-helper {
            height: 100%;
            display: inline-block;
            vertical-align: middle;
        }

        h3 {
            margin:1em 0;
            text-align:center;
            font-size:0.8em;
            font-weight:normal;
            color:#d00;
        }

        div.banner {
            color: #666;
            line-height: 1.2em;
        }
        div.banner:not(:empty) {
            margin-bottom: 1em;
        }

        form {
            width:220px;
            margin:0 auto;
        }

        fieldset {
            border:none;
            margin:0.25em;
            padding:0;
        }

        fieldset input {
            display:block;
            margin-bottom:1em;
            border:1px solid #ccc;
            border:1px solid rgba(0,0,0,0.3);
            background: white;
            background: rgba(255, 255, 255, 0.5);
            padding:2px 4px;
            width: 100%;
        }

        .company {
            position:absolute;
            left: 50%;
            width: 400px;
            margin-left: -200px;
            bottom: -40px;
            font-size: 0.8em;
            color: #ccc;
            text-align: center;
        }

        .company .content {
            border-radius: 10px;
            background-color: rgba(0,0,0,0.3);
            box-shadow: 0 0 6px rgba(0,0,0,0.4);
            text-shadow: 0 0 2px black;
            display: inline-block;
            padding: 0 15px;
            color: white;
        }
      </style>

    </head>
    <body>
    	<div class="brickwall"></div>
    	<div class="loginBox">
    		<div class="blur">
    			<div class="background"></div>
    		</div>

    		<h1 class="logo">
    			<a href="index.php">
    				<span class="valign-helper"></span>
    				<img src="./assets/logo/Logo.png" alt="PhilPACS :: Staff Control Panel">
    			</a>
    		</h1>

    		<h3 class="login-message">Authentication Required</h3>
    		<div class="banner">
    			<small></small>
    		</div>

    		<form method="post" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" id="loginForm">
    			<input type="hidden" name="CSRFToken" id="CSRFToken" />
    			<fieldset>
	    			<div class="form-group">
	    				<input type="text" id="username" name="username" value="" placeholder="Username or Email" class="form-control" autocomplete="off" autofocus/>
	    			</div>
	    			<div class="form-group">
	    				<input type="password" id="password" placeholder="Password" class="form-control" autocomplete="off"/>
	    			</div>
	    			<div class="form-group">
	    				<button type="submit" class="btn btn-success" id="loginBtn">Log in</button>
	    			</div>
    			</fieldset>
    		</form>

    		<div class="company">
		        <div class="content">Copyright &copy; PhilPACS</div>
		    </div>
    	</div>
		<!-- <script type="text/javascript" src="./ajax/ajax.login.js"></script> -->
    </body>
</html>