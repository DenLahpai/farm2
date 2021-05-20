<!-- wrap-header -->
<div class="wrap-header">
    <!-- header-left -->
    <div class="header-left">
        <!--header-left-contents -->
        <div class="header-left-contents">
            <div class="small-logo">
                <a href="./../index.html"><img src="./../img/logo.png"></a>
            </div>
            <div class="small-logo-text">
                Farmers
            </div>
        </div>
        <!--header-left-contents ends -->
    </div>
    <!-- header-left ends -->
    <!-- header-mid -->
    <div class="header-mid">
        <!-- header-mid-contents -->
        <div class="header-mid-contents">
        </div>    
        <!-- header-mid-contents ends-->
    </div>
    <!-- header-mid  ends-->
    <!-- header-right -->
    <div class="header-right">
        <!-- header-right-contents -->
        <div class="header-right-contents">
            <div class="login-button pointer" onclick="Toggle('#login-form');">
                Login
            </div>
        </div>
        <!-- header-right-contents ends-->
    </div>
    <!-- header-right ends -->
</div>
<!-- wrap-header ends -->
<!-- login-form -->
<div class="login form">
    <form id="login-form" method="post" action="#">
        <div class="form-contents">
            <div>
                <h2>Vendor Login</h2>
            </div>
            <div>
                <input type="text" name="Mobile" id="Mobile" placeholder="Mobile No">
            </div>
            <div>    
                <input type="password" name="Password" id="Password" placeholer="Password">
            </div>
            <div>    
                <button type="button" onclick="login();">Login</button>
            </div>
            <div>
                You can <a href="signup.html">sign up</a> for a vendor account in order 
                to sell your products on our online market.
            </div>
            <div class="login-response">
            </div>
            <div>
                <a href="forgot-password.html">Forgot Password?</a>
            </div>    
        </div>
    </form>
</div>
<!-- login-form ends -->
