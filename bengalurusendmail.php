<html>
    <head>
     <!-- Google Tag Manager -->
    <script>
    (function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K2SDRR3');</script>
    <!-- End Google Tag Manager -->
    <link href="styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/styles.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="scripts/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/6cd127839a.js" crossorigin="anonymous"></script>

<?php
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'vendor/autoload.php';
  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';
  
    if(isset($_POST['careersubmit'])){
        $name=$_POST['careername']; // Get Name value from HTML Form
        $mobile=$_POST['careermobile'];  // Get Mobile No
        $email=$_POST['careermail'];  // Get Email Value
        $message=$_POST['careertitle']; // Get Message Value

        if (array_key_exists('attachment', $_FILES)) {
            $img_name = $_FILES['attachment']['name'];
            $extension = pathinfo($img_name, PATHINFO_EXTENSION);
            $upload = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['attachment']['name']));
            
            //to sure image upload goes to root directory add a link in my own case my project folder is Mail
            
            $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/'.'resumes/' . $img_name;
            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile)) {
                   
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    // SMTPDebug turns on error display mssg 
                    // $mail->SMTPDebug = 3;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = 'smtp.gmail.com';
                    // set a port
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    // set login detail for gmail account
                    $mail->Username = 'vuedatacareers@gmail.com';
                    $mail->Password = 'pjtnrgmiylomxgwu';
                    $mail->CharSet = 'utf-8';
                    // set subject
                    $mail->setFrom("vuedatacareers@gmail.com", "vuedata team");
                    $mail->addAddress("talenthub@vuedata.in");
                    $mail->IsHTML(true);
                    //$mail->AddAttachment($filename);
                    $mail->addAttachment($uploadfile, 'Bengaluru jobs Resumes' . '.' . $extension);
                    $mail->Subject = 'Career';
                  //  $mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
                    $mail->Body = "
                    <html>
                        <body>
                            <table style='width:600px;'>
                                <tbody>
                                    <tr>
                                        <td style='width:150px'><strong>Name: </strong></td>
                                        <td style='width:400px'>$name</td>
                                    </tr>
                                    <tr>
                                        <td style='width:150px'><strong>Email ID: </strong></td>
                                        <td style='width:400px'>$email</td>
                                    </tr>
                                    <tr>
                                        <td style='width:150px'><strong>Mobile No: </strong></td>
                                        <td style='width:400px'>$mobile</td>
                                    </tr>
                                    <tr>
                                        <td style='width:150px'><strong>Job title: </strong></td>
                                        <td style='width:400px'>$message</td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                    </html>
                    ";
                    if (!$mail->send()) {
                        $msg .= "Mailer Error: " . $mail->ErrorInfo;
                        echo "error";
                    } else {
                        $msg .= "Message sent!";
                        echo "<script type='text/javascript'>
                                            $(document).ready(function(){
                                            $('#modalchennai').modal('show');
                                            });
                                            
                                            </script>";
                    } 
            } else {
                        $msg .= 'Failed to move file to ' . $uploadfile;
                        echo "<script type='text/javascript'>
                        alert('Check again')
                         
                         </script>";
            }
        }

       
    }
?>
</head>
<body>
 <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2SDRR3"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
<div class="modal modal-auto-clear-chennai" tabindex="-1" id="modalchennai">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-body p-0">
            <h2 class="text-center p-3 text-white modal-refresh">Thank you for the details !<i class="ps-3 fas fa-child"></i></h2>
                <img src="assets/hifive.jpg" class="img-fluid">
             
            </div>
          </div>
        </div>
</div>


<script>
        $('.modal-auto-clear-chennai').on('shown.bs.modal', function () {
                                    $(this).delay(5000).fadeOut(200, function () {
                                        $(this).modal('hide');
                                        window.location.href = 'bengaluru-jobs.php';
                                    });
                                  })
    </script>
</body>
</html>