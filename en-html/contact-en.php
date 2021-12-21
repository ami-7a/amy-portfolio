<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';

} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';

    // 空チェック
    if ($name == '' || $email == '' || $subject == '' || $message == '') {
        $err_msg = '全ての項目を入力してください。';
    }
    
    // エラーなし（全ての項目が入力されている）
    if ($err_msg == '') {
        $to = "ami7a121@gmail.com"; // 管理者のメールアドレスなど送信先
        // Yudaiより下記を追加
        $from = "Amy <" . $email . ">";

        // Yudaiより下記の1行変更
        // $headers = "From: " . $email . "\r\n"
        // Yudaiより下記を追加
        // 下記コメントアウトはコードの説明
            // Content-Type – メール形式
            // Return-Path – 送信先メールアドレスが受け取り不可の場合に、エラー通知のいくメールアドレス
            // From – 送信者の名前（または組織名）とメールアドレス
            // Sender – 送信者の名前（または組織名）とメールアドレス
            // Reply-To – 受け取った人に表示される返信の宛先
            // Organization – 送信者名（または組織名）
            // X-Sender – 送信者のメールアドレス
            // X-Priority – メールの重要度を表す
        $headers = '';
        $header .= "Content-Type: text/plain \r\n";
        $header .= "Return-Path: " . $to . " \r\n";
        $header .= "From: " . $from ." \r\n";
        $header .= "Sender: " . $from ." \r\n";
        $header .= "Reply-To: " . $email . " \r\n";
        $header .= "Organization: " . $name . " \r\n";
        $header .= "X-Sender: " . $email . " \r\n";
        $header .= "X-Priority: 3 \r\n";


        // 本文の最後に名前を追加
        $message .= "\r\n\r\n" . $name;

        // メール送信
        mb_send_mail($to, $subject, $message, $headers);

        // 完了メッセージ
        $complete_msg = "It's done!<br>Thank you for contacting me. <br>We will contact you by email within 3 days. <br>Please wait a moment.";

        // 全てクリア
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-210320061-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-210320061-1');
</script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-209131030-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-209131030-1');
  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amy | Contact </title>
  <link rel="stylesheet" href="../css/ress.css">
  <link rel="stylesheet" href="../css/contact.css">
  <link rel="stylesheet" href="../css/common-en.css">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

  <meta name="description" content="">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lateef&family=Sawarabi+Mincho&family=WindSong&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Scheherazade+New&display=swap" rel="stylesheet">

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/931c5e739a.js" crossorigin="anonymous"></script>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- hamburger menu -->
  <script>
    $(function() {
      $('.open_line').on("click", function(){
  
      $(this).toggleClass('open');
      $('#nav').toggleClass('open');
    });
  });
  
  // on Click, remove clsss open
  $(function() {
    $('.nav-menu li a').on("click", function(){
      $('#nav').removeClass('open');
    });
  });
  </script>

  

</head>
<body>
  <header class="header">

    <!-- on the hamburger menu -->
    <div id="hamburger">
      <section>
        <div class="open_line">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </section>

      <!--nav in the hamburger menu-->
      <nav id="nav">
        <div class="nav-menu">

          <div class="nav-img"><img src="../img/amy-logo.png" alt=""></div>
          
          <ul>
            <li><a href="index-en.html" target="_blank" rel="noopener noreferrer">
              <span>TOP PAGE</span></a>
            </li>
  
            <li><a href="about-en.html" target="_blank" rel="noopener noreferrer" >
              <span>PROFILE</span></a>
            </li>
              
  
            <li><a href="works-en.html" target="_blank" rel="noopener noreferrer" >
              <span>WORKS</span></a>
            </li>
  
          </ul>

          <!-- hamburger contact btn -->
          <section class="contact-1">
            <a href="contact-en.php" target="_blank" rel="noopener noreferrer">
              <span>CONTACT</span>
            </a>
          </section>
        </div>

        <!--hamburger SNS section-->
        <div class="sns-btn">
          <a href="https://www.instagram.com/_.ami_____/" target="_blank" rel="noopener noreferrer" class="insta"><i class="fab fa-instagram"></i>
          </a>
        </div>
      </nav>
  
    </div>
   
  </header>

  <main class="main effect-fade">
    
    <h1 class="section-title02 effect-fade">Contact form</h1>

    <?php if ($err_msg != ''): ?>
        <div class="alert alert-danger">
    <?php echo $err_msg; ?>
        </div>
    <?php endif; ?>

    <?php if ($complete_msg != ''): ?>
        <div class="alert alert-success">
            <?php echo $complete_msg; ?>
        </div>
    <?php endif; ?>
          
    <form class="form" method="post">

      <li class="form-left">
        <img src="../img/layer-coffee.png" alt="">
      </li>

      <li class="form-right">
        
          <!-- Name -->
        <div class="txt-area">
          <p>NAME</p>
          <input type="text"  name="name"  value="<?php echo $name; ?>">
        </div>
        

        <!-- Email -->
        <div class="txt-area">
          <p>EMAIL</p>
          <input type="text"  name="email"  value="<?php echo $email; ?>">
        </div>
        

        <!-- Subject -->
        <div class="txt-area">
          <p>Subject</p>
          <input type="text"  name="subject" value="<?php echo $subject; ?>">
        </div>
        

        <!-- Content -->
        <div class="txt-area">
          <p>Details of your inquiry</p>
        <textarea  name="message" rows="4" ><?php echo $subject; ?></textarea>
        </div>
        

        <div class="sent-btn">
          <button type="submit">Submit</button>
        </div>

      </li>

    </form>


  </main>

  <footer class="footer">

    <!-- common footer -->
    
    <section class="main-footer effect-fade">
      
        <img class="footer-logo" src="../img/amy-logo.png" alt="Amy-logo">
  
        <ul>
          <li><a href="about-en.html" target="_blank" rel="noopener noreferrer" >
            <span>about</span></a>
          </li>

          <li><a href="works-en.html" target="_blank" rel="noopener noreferrer" >
            <span>WORKS</span></a>
          </li>

          <li><a href="contact-en.php" target="_blank" rel="noopener noreferrer">
            <span>CONTACT</span></a>
          </li>
        </ul>

    </section>

    <section class="copy-right">
      <p>©︎ 2021, Ami Kubo, All Rights Reserved.</p>
    </section>

  </footer>
  
</body>
</html>