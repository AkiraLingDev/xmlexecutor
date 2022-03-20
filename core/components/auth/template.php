<div class="wrapper">
    <div class="header">
        <h3 class="sign-in">Sign in</h3>
    </div>
    <div class="clear"></div>
    <form name="auth-form" action="#">
        <div>
            <label class="user" for="text">
                <svg viewBox="0 0 32 32">
                    <g filter="">
                        <use xlink:href="#man-people-user"></use>
                    </g>
                </svg>
            </label>
            <input class="user-input" type="text" name="login" placeholder="Login"  />
        </div>
        <div>
            <label class="lock" for="password">
                <svg viewBox="0 0 32 32">
                    <g filter="">
                        <use xlink:href="#lock-locker"></use>
                    </g>
                </svg>
            </label>
            <input type="password" name="password" placeholder="Password" />
        </div>
        <div>
            <input type="submit" value="Sign in" id="auth-button"/>
        </div>
        <div class="clear"></div>
    </form>
</div>