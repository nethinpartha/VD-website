<html>
    <head>
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
  
    if(isset($_POST['submit2'])){
        $name=$_POST['name2']; // Get Name value from HTML Form
        $mobile=$_POST['phone2'];  // Get Mobile No
        $email=$_POST['mail2'];  // Get Email Value
        $message=$_POST['companyname2']; // Get Message Value
        
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
        $mail->addAddress("SalesLeadsOnly@NETORGFT837322.onmicrosoft.com");
        $mail->IsHTML(true);
        $mail->Subject = 'Contact form: Feedback form';
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
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$message</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg .= "Message sent!";
            echo "<script type='text/javascript'>
                                $(document).ready(function(){
                                $('#modal10').modal('show');
                                });
                                
                                </script>";
        } 
        // $mail = new PHPMailer();
       
          
        // $mail->IsSMTP();
        // $mail->SMTPSecure = 'tls';
        // $mail->Host = 'smtp.gmail.com';
        
        // $mail->SMTPAuth = true;
        // $mail->Port = 587;
        // $mail->Username = "vuedatacareers@gmail.com"; // Your Email ID
        // $mail->Password = "pjtnrgmiylomxgwu"; // Password of your email id
          
        // $mail->From = "info@vuedata.com";
        // $mail->FromName = "vuedata Team";
        // $mail->AddAddress ("vuedatacareers@gmail.com"); // On which email id you want to get the message
        // $mail->AddCC ($email);
          
        // $mail->IsHTML(true);
          
        // $mail->Subject = "Enquiry from Website submitted by $name"; // This is your subject
          
        // HTML Message Starts here
          
        // $mail->Body = "
        // <html>
        //     <body>
        //         <table style='width:600px;'>
        //             <tbody>
        //                 <tr>
        //                     <td style='width:150px'><strong>Name: </strong></td>
        //                     <td style='width:400px'>$name</td>
        //                 </tr>
        //                 <tr>
        //                     <td style='width:150px'><strong>Email ID: </strong></td>
        //                     <td style='width:400px'>$email</td>
        //                 </tr>
        //                 <tr>
        //                     <td style='width:150px'><strong>Mobile No: </strong></td>
        //                     <td style='width:400px'>$mobile</td>
        //                 </tr>
        //                 <tr>
        //                     <td style='width:150px'><strong>Message: </strong></td>
        //                     <td style='width:400px'>$message</td>
        //                 </tr>
        //             </tbody>
        //         </table>
        //     </body>
        // </html>
        // ";
        // HTML Message Ends here
          
              
        // if(!$mail->Send()) {
        //     // Message if mail has been sent
        //     echo "<script>
        //         alert('Submission failed.');
        //     </script>";
        // }
        // else {
        //     // Message if mail has been not sent
        //     echo "<script>
        //         alert('Email has been sent successfully.');
        //     </script>";
        // }
  
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
<div class="modal modal-auto-clear5" tabindex="-1" id="modal10">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
   
            <div class="modal-body p-0">
            <h2 class="text-center text-white p-3 modal-refresh" >Thank you for the details !<i class="ps-3 fas fa-child"></i></h2>
                <img src="assets/hifive.jpg" class="img-fluid">
             
            </div>
           
          </div>
        </div>
</div>


<script>
        $('.modal-auto-clear5').on('shown.bs.modal', function () {
                                    $(this).delay(5000).fadeOut(200, function () {
                                        $(this).modal('hide');
                                        window.location.href = '/solutions/data-integration-case-study.pdf';
                                    });
                                  })
    </script>
</body>
</html>