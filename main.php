<?php session_start();
require_once("css/util.php");

$user = 'root';
$password = 'root';
$dbName = 'web';
$host = 'localhost:3306';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<title></title>
<link href="css/style1.css" rel="stylesheet">
</head>
<body>
<!-- 배너 설정 -->
<div class="row">
  <div class="column header1">
    <h1>적립금 혜택</h1>
  </div>
  <div class="column header2">
    <h1>굿즈 상품</h1>
  </div>
</div>

<!-- topnav -->
<div class="row">
  <div class="topnav">
    <ul>

      <li><a href="main.php">HOME</a></li>
      <li class="dropdown">
        <a href="book.php" class="dropbtn">국내도서</a>
        <div class="dropdown-content">
          <a href="#">소설/시/희곡</a>
          <a href="#">만화</a>
          <a href="#">인문학</a>
          <a href="#">사회과학</a>
          <a href="#">컴퓨터</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="foreign.php" class="dropbtn">외국도서</a>
        <div class="dropdown-content">
          <a href="#">소설/시/희곡</a>
          <a href="#">만화</a>
          <a href="#">인문학</a>
          <a href="#">사회과학</a>
          <a href="#">컴퓨터</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="ebook.php" class="dropbtn">eBook</a>
        <div class="dropdown-content">
          <a href="#">소설/시/희곡</a>
          <a href="#">만화</a>
          <a href="#">인문학</a>
          <a href="#">사회과학</a>
          <a href="#">컴퓨터</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="used.php" class="dropbtn">중고매장</a>
        <div class="dropdown-content">
          <a href="#">소설/시/희곡</a>
          <a href="#">만화</a>
          <a href="#">인문학</a>
          <a href="#">사회과학</a>
          <a href="#">컴퓨터</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="music.php" class="dropbtn">음반</a>
        <div class="dropdown-content">
          <a href="#">가요</a>
          <a href="#">클래식</a>
          <a href="#">팝</a>
          <a href="#">재즈</a>
          <a href="#">OST</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="dvd.php" class="dropbtn">블루레이</a>
        <div class="dropdown-content">
          <a href="#">3D 블루레이</a>
          <a href="#">공포/스릴러</a>
          <a href="#">다큐멘터리</a>
          <a href="#">드라마/코미디</a>
          <a href="#">애니메이션</a>
          <a href="#">액션/SF</a>
        </div>
      </li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

      <?php
      if(!isset($_SESSION['id'])){
        echo "<li><a href=\"#\" onclick=\"document.getElementById('id01').style.display='block'\"
                      style=\"width:auto;\">로그인</a></li>";
        echo "<li><a href='member.php'>회원가입</a></li>";
      }
      else
        echo "<li><a href='logout.php'>로그아웃</a></li>";
      ?>

<!-- 로그인 창-->
<div id="id01" class="modal">
  <form class="modal-content animate" action="./logcheck.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <input type="text" placeholder="Enter id" name="id" required>
      <input type="password" placeholder="Enter Password" name="pw" required>
      <input type="checkbox" name="remember"> Remember me
      <button type="submit">로그인</button>
      <button type="button" onclick="location.href='member.php'">회원가입</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
  modal.style.display = "none";
  }
}
</script>

      <!-- 회원가입, 마이페이지, 고객센터, 장바구니 -->

      <li class="dropdown">
        <a href="my.php" class="dropbtn">마이 페이지</a>
        <div class="dropdown-content">
          <a href="#">나의 계정</a>
          <a href="cart.php">카트</a>
          <a href="#">주문/배송조회</a>
        </div>
      </li>
      <li><a href="client.php">고객센터</a></li>
      <li><a href="cart.php">장바구니</a></li>
    </ul>
  </div>
</div>

<!-- 검색창 -->
<div class="row">
  <div class="column side">
    <?php
    if(!isset($_SESSION['id'])){
    }
    else
      if($_SESSION['id'] == "admin")
      echo '<button type="button" onclick="location.href=\'../AD/AD.php\'">관리자</button>';
    ?>
  </div>
  <div class="column midside1">
    <a href="main.php"><img src="images/LOGO/blue_dia.jpg" width="130" height="97" title="메인 화면으로 이동"></a>
  </div>

  <!-- 검색창 -->
  <div class="column middle"><br />
    <div class="search-container">
      <form method="POST" action="search.php">
        <!--<select name="search">
          <option value="통합검색">통합검색</option>
          <option value="국내도서">국내도서</option>
          <option value="외국도서">외국도서</option>
          <option value="eBook">eBook</option>
          <option value="음반">음반</option>
          <option value="DVD">DVD</option>
        </select>-->
        <input type="text" placeholder="Search.." name="name" size=30>
        <button type="submit">검색</button>
      </form>
    </div>
  </div>

  <div class="column midside2"><br />
    <a href="event.html"><img src="banner/ban.jpg" width="167" height="65"></a>
  </div>
  <div class="column side">
  </div>
</div>

<!-- midnav1 설정 -->
<div class="row">
  <div class="midnav1">
    <ul>
      <li class="dropdown">
        <a href="" class="dropbtn">분야보기</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <div class="dropdown-content">
          <div class="color">
            <a href="book.php">국내도서</a>
          </div>
          <ul>
            <li><a href="">소설/시/희곡</a></li>
            <li><a href="">만화</a></li>
            <li><a href="">인문학</a></li>
            <li><a href=""> 사회과학 </a></li>
            <li><a href=""> 컴퓨터 </a></li>
          </ul>
          <div class="color">
            <a href="foreign.php">외국도서</a>
          </div>
          <ul>
            <li><a href="">소설/시/희곡</a></li>
            <li><a href="">만화</a></li>
            <li><a href="">인문학</a></li>
            <li><a href=""> 사회과학 </a></li>
            <li><a href=""> 컴퓨터 </a></li>
          </ul>
          <div class="color">
            <a href="ebook.php">eBook</a>
          </div>
          <ul>
            <li><a href="">소설/시/희곡</a></li>
            <li><a href="">만화</a></li>
            <li><a href="">인문학</a></li>
            <li><a href=""> 사회과학 </a></li>
            <li><a href=""> 컴퓨터 </a></li>
          </ul>
          <div class="color">
            <a href="used.php">온라인 중고매장</a>
          </div>
          <ul>
            <li><a href="">소설/시/희곡</a></li>
            <li><a href="">만화</a></li>
            <li><a href="">인문학</a></li>
            <li><a href=""> 사회과학 </a></li>
            <li><a href=""> 컴퓨터 </a></li>
          </ul>
          <div class="color">
            <a href="music.php">음반</a>
          </div>
          <ul>
            <li><a href=""> 가요 </a></li>
            <li><a href=""> 클래식 </a></li>
            <li><a href=""> 팝 </a></li>
            <li><a href=""> 재즈 </a></li>
            <li><a href=""> OST </a></li>
          </ul>
          <div class="color">
            <a href="dvd.php">블루레이</a>
          </div>
          <ul>
            <li><a href=""> 3D 블루레이 </a></li>
            <li><a href=""> 공포/스릴러 </a></li>
            <li><a href=""> 다큐멘터리 </a></li>
            <li><a href=""> 드라마/코미디 </a></li>
            <li><a href=""> 애니메이션 </a></li>
            <li><a href=""> 액션/SF </a></li>
          </ul>
        </div>
      </li>
      <li class="dropdown">
        <a href="" class="dropbtn">추천마법사</a>
        <div class="dropdown-content">
          <a href="#">마법사의 선택</a>
          <a href="#">신간알리미</a>
          <a href="#">서재이웃의 선택</a>
          <a href="#">오늘 본 상품</a>
        </div>
      </li>
      <li><a href="">베스트셀러</a></li>
      <li><a href="">새로나온책</a></li>
      <li><a href="">새로나올책</a></li>
      <li><a href="">출판사랭킹</a></li>
      <li class="dropdown">
        <a href="" class="dropbtn">이벤트</a>
        <div class="dropdown-content">
          <a href="#">이벤트</a>
          <a href="#">정가인하도서</a>
          <a href="#">작가와의 만남</a>
        </div>
      <li><a href="">굿즈상품</a></li>
      <li><a href="">만원이하 도서</a></li>
      </li>
    </ul>
  </div>
</div>

<!-- 배너 -->
<div class="row">
  <div class="column side">
    <a href=""><img src="banner/side_ban.jpg" width="105" height="135"></a>
  </div>

<!-- 수동/자동 슬라이드 -->

  <div class="column mid">
    <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="numbertext">1 / 5</div>
      <a href=""><img src="images/best/best_01_20181205.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_02_20181126.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_03_20181030.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_04_20181002.jpg" width="220" height="330"></a>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 5</div>
      <a href=""><img src="images/best/best_05_20181203.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_06_20181203.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_07_20181019.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_08_20181207.jpg" width="220" height="330"></a>
      </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 5</div>
      <a href=""><img src="images/best/best_09_20181128.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_10_20181107.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_11_20180620.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_12_20181123.jpg" width="220" height="330"></a>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">4 / 5</div>
      <a href=""><img src="images/best/best_09_20181128.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_10_20181107.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_11_20180620.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_12_20181123.jpg" width="220" height="330"></a>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">5 / 5</div>
      <a href=""><img src="images/best/best_13_20181112.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_14_20181030.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_15_20181113.jpg" width="220" height="330"></a>
      <a href=""><img src="images/best/best_16_20180625.jpg" width="220" height="330"></a>
      </div>
    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
    </div>

    <script>
    var slideIndex = 1;
      showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }
  </script>
  </div>
  <div class="column side">
  </div>
</div>

<!-- midnav2 설정 -->
<div class="row">
  <div class="column side"></div>
  <div class="midnav2">
    <ul>
      <li><a href="">편집장의 선택</a></li> &nbsp; &nbsp;
      <li><a href="">추천마법사의 선택</a></li> &nbsp; &nbsp;
      <li><a href="">이 달의 주목도서</a></li> &nbsp; &nbsp;
      <li><a href="">출판사 랭킹</a></li> &nbsp; &nbsp;
      <li><a href="">eBook</a></li>
    </ul>
  </div>
  <div class="column side"></div>
</div>

<!-- 편집장의 선택, 추천마법사의 선택, 이 달의 주목도서, 출판사 랭킹, eBook -->
<div class="row">
  <div class="column side"></div>
  <div class="column side1">
    <!-- 편집장의 선택 -->
        <?php
        try {
          $pdo = new PDO( $dsn, $user, $password );
          $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
          $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

          // 편집장의 선택
          echo "<hr>";
          echo "<a href=\"\">편집장의 선택</a><p>";

          $sql = "SELECT * FROM Book";
          $stm = $pdo->prepare( $sql );
          $stm->execute();
          $result = $stm->fetchAll( PDO::FETCH_ASSOC );

          foreach( $result as $row ) {
            echo '<a href="detail.php?isbn='.$row['isbn'].'">
            <img src=images/'.$row['image'].' width=170 height=230>';
          }

          // 추천마법사의 선택
          echo "<hr>";
          echo "<a href=\"\">추천마법사의 선택</a><p>";

          $sql1 = "SELECT * FROM eBook";
          $stm1 = $pdo->prepare( $sql1 );
          $stm1->execute();
          $result1 = $stm1->fetchAll( PDO::FETCH_ASSOC );

          foreach( $result1 as $row ) {
            echo '<img src=images/'.$row['image'].' width=170 height=230>';
          }

          // 이 달의 주목도서
          echo "<hr>";
          echo "<a href=\"\">이 달의 주목도서</a><p>";

          $sql2 = "SELECT * FROM Music";
          $stm2 = $pdo->prepare( $sql2 );
          $stm2->execute();
          $result2 = $stm2->fetchAll( PDO::FETCH_ASSOC );

          foreach( $result2 as $row ) {
            echo '<img src=images/'.$row['image'].' width=170 height=230>';
          }

          // 출판사 랭킹
          echo "<hr>";
          echo "<a href=\"\">출판사 랭킹</a><p>";

          $sql3 = "SELECT * FROM DVD";
          $stm3 = $pdo->prepare( $sql3 );
          $stm3->execute();
          $result3 = $stm3->fetchAll( PDO::FETCH_ASSOC );

          foreach( $result3 as $row ) {
            echo '<img src=images/'.$row['image'].' width=170 height=230>';
          }

          // eBook 랭킹
          echo "<hr>";
          echo "<a href=\"\">eBook 랭킹</a><p>";

          $sql4 = "SELECT * FROM eBook";
          $stm4 = $pdo->prepare( $sql4 );
          $stm4->execute();
          $result4 = $stm4->fetchAll( PDO::FETCH_ASSOC );

          foreach( $result4 as $row ) {
            echo '<img src=images/'.$row['image'].' width=170 height=230>';
          }

          } catch( Exception $e ) {
          echo '<span class="error">오류가 있습니다. </span><br>';
          echo $e->getMessage();
        }
        ?>
  </div>
  <div class="column side"></div>
</div>

<!-- botnav 설정 -->
<div class="row">
  <div class="botnav">
    <ul>
      <li><a href="">회사소개</a></li>
      <li><a href="">이용약관</a></li>
      <li><a href="">개인정보취급방침</a></li>
      <li><a href="">고객센터</a></li>
      <li><a href="">중고매장</a></li>
      <li><a href="">제휴/마케팅 안내</a></li>
      <li><a href="">출판사/공급사 안내</a></li>
      <li><a href="">광고 안내</a></li>
      <li><a href="">TOP</a></li>
      <a href="#top"><img src="" width="15" height="15"></a>
      <a href="#top"><img src="" width="15" height="15"></a>
    </ul>
  </div>
</div>
<hr>

<!-- 마지막 -->
<div class="row">
  <div class="column side">
  </div>
  <div class="column midside1">
    <a href="main.php"><img src="images/LOGO/blue_dia.jpg" width="130" height="97" title="메인 화면으로 이동"></a>
  </div>
  <div class="column middle">
    ㈜ Blue Diamond<br />
    주소 : 서울시 OO OOOO, OO(OO 아파트)<br />
    대표 : 홍길동 &nbsp; &nbsp; 개인정보책임자 : 청정수<br />
    e-mail : cjs@blue.co.kr<br />
    사업자등록번호 : OOO-OO-OOOO &nbsp; &nbsp; 통신판매업신고 : 제 OO호<br />
  </div>
  <div class="column midside2">
    고객만족센터 T. 111-2222<br />
    중고매장 문의 : 333-4444<br />
    일반 문의 : 555-6666<br />
    저작권 2002-2018 ㈜ Blue Diamond
  </div>
</div>
</body>
</html>
