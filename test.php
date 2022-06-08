<?php
                $email = 'jayaprasad356@gmail.com';
                $otp = rand(100000, 999999); //generates random otp
                
                $message = "Your one time email verification code is" . $otp;
                $sub = "Email verification from Dj Techblog";
                $headers = "From : " . "dj@djtechblog.com";
                try{
                    $retval = mail($email,$sub,$message);
                    if($retval)
                    {
                        require_once('otp-verification.php');
                    }
                }
                
                catch(Exception $e)
                {
                    die('Error: '.$e->getMessage());
                }
 

?>