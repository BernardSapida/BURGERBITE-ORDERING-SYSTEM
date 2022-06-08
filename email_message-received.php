<?php
    session_start();

    $_SESSION["email_message-received"] = '
    <body>
        <main>
            <section class="section_email-template" style="padding: 15px 30px; position: relative; background-color: black;">
                <div class="container_email_header" style="margin-bottom: 10px;">
                    <p class="email_header-logo"><img src="https://i.ibb.co/dcBt23r/279377135-1117847642111961-6949520978733401421-n.png" alt="BurgerHub Logo" style="display: block; margin: auto; width: 100%;  max-width: 120px;"></p>
                </div>
                <div class="container_email-body" style="margin: auto; background-color: rgb(255, 247, 232); border-radius: 5px; display: grid; place-items: center; padding: 0 50px;">
                    <div class="container_email-body-content" style="padding:20px 0 30px 0;">
                        <h1 style="text-align: center; line-height: 1; margin-bottom: 8px; font-size: 34px; color: hsl(0, 0%, 2%);">Hello, <span style="color: hsl(349, 100%, 54%);">' . empty($_SESSION["firstname"]) ? "there," : $_SESSION["firstname"] . " " . empty($_SESSION["lastname"]) ? "User" : $_SESSION["lastname"] . '</span></h1>
                        <p style="text-align: center; line-height: 1; margin-bottom: 4px;font-weight: 700; color: hsl(0, 0%, 2%);">We received your message from Contact Us.</p>
                        <p style="text-align: center; line-height: 1; color: hsl(0, 0%, 2%);">Thank you for reaching us out and we will try out best to respond soonest!</p>
                    </div>
                </div>
                <div class="container_email-footer" style="margin: 15px 0; position: relative; z-index: 1; color: hsl(0, 0%, 100%);">
                    <ul style="text-align: center;">
                        <li style="display: inline-block; list-style-type: none;"><a href="" style="padding: 0 8px; text-decoration: none; color: hsl(47, 100%, 44%); font-weight: 600; font-size: 14px;">Home</a> |</li>
                        <li style="display: inline-block; list-style-type: none;"><a href="" style="padding: 0 8px; text-decoration: none; color: hsl(47, 100%, 44%); font-weight: 600; font-size: 14px;">About</a> |</li>
                        <li style="display: inline-block; list-style-type: none;"><a href="" style="padding: 0 8px; text-decoration: none; color: hsl(47, 100%, 44%); font-weight: 600; font-size: 14px;">Contact</a> |</li>
                        <li style="display: inline-block; list-style-type: none;"><a href="" style="padding: 0 8px; text-decoration: none; color: hsl(47, 100%, 44%); font-weight: 600; font-size: 14px;">Menu</a> |</li>
                        <li style="display: inline-block; list-style-type: none;"><a href="" style="padding: 0 8px; text-decoration: none; color: hsl(47, 100%, 44%); font-weight: 600; font-size: 14px;">Sign In</a></li>
                    </ul>
                    <p class="email-reminder" style="text-align: center; margin: 10px; font-size: 12px; color: hsl(0, 0%, 100%, .5); font-weight: 300;">This is an automated email. Please do not reply.</p>
                    <p class="email-copyright" style="text-align: center; margin: 10px; font-size: 12px; color: hsl(0, 0%, 100%, .5); font-weight: 300;">Copyright &copy;2022 BurgerHub. All Rights Reserved.</p>
                </div>
            </section>
        </main>
    </body>';
?>