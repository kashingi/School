<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="">
    <style>
        footer{
            margin-left: 250px
        }

        .container a{
            text-decoration: none;
            color: white;
        }
    </style>

</head>
<body>
    

    <footer class="bg-dark">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <h4 class="footer-title">
                            <h4 class="footer-title">Get In Touch</h4>
                        </h4>
                    </div>
                    <div class="row">
                        <p>Join our mailing list and get up to date with latest on news, scholarships and free bootcamps</p>
    
                    </div>
                    <div class="row">
                        <form method="post" action="">
                            <input type="hidden" name="_token" value="">                    
                            <div class="input-group mb-3 mt-4">
                                <input type="text" name="email" class="form-control" placeholder="Enter email">
                                <button class="btn btn-success border-rad" type="submit" id="button-addon2">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <div class="row container">
                        <div class="row col-sm-12">
                            <div class="col-sm-4">
                                <a href="">
                                    <i class="fa-brands  fa-twitter"></i>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <p class="text-center" style="font-size: 12px">Copyright © {{ date('d-m-y')}}. <b>Villa-Tech Skills.</b> All rights reserved.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h4 class="footer-title">Resources and Info</h4>
                    </div>
                    <div class="row">
                        <p><a href="#" style="text-decoration: none; color: white">About Us</a></p>
                    </div>
                    <div class="row">
                        <p><a href="#" style="text-decoration: none; color: white">News and Updates</a></p>
                    </div>
                    <div class="row">
                        <p><a href="#" style="text-decoration: none; color: white">Scholarships</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h4 class="footer-title">Support</h4>
                    </div>
                    <div class="row">
                        <p><a href="tel:+254790487504" style="text-decoration: none; color: white">
                            <i class="fa fa-phone">
                                </i> 0790487504</a></p>
                    </div>
                    <div class="row">
                        <p>
                            <a href="mailto:moriskashing74@gmail.com?Subject=Inquiry" target="_top" style="text-decoration: none; color: white">
                                <i class="fa fa-envelope"></i> 
                                moriskashing74@gmail.com
                            </a>
                        </p>
                    </div>
                    <div class="row">
                        <p>
                            <i class="fa fa-map-marker"></i> Mariakani, Sports Road, Near Delta, Kilifi.
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15922.963628752397!2d39.4738341!3d-3.8656675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x183f8610becc2a27%3A0xe1dee91dbee6bd85!2sMariakani!5e0!3m2!1sen!2ske!4v1705312295568!5m2!1sen!2ske" height="100px" width="300px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"></div>
    </footer>
</body>
</html>