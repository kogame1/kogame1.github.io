<!DOCTYPE html>
<!-- 연습용 -->
<html lang="ko"> <!-- 230729 스크린 리더를 위해 lang="ko"로 변경 -->

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="태훈이와 유라의 결혼식 모바일청첩장" />
        <meta name="author" content="박태" />
        <meta name="keywords" content="박태훈 청첩장, 김유라 청첩장"/> <!-- 230729 추가 -->
        <title>111태훈이와 유라의 결혼식에 초대합니다</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" /> <!-- 230729 HTML5부터는 type="test/css" 기입 필요하지않음. 그렇지만 이거는 style 태그안의 것이 아니라서 잘 모르겠음.-->
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" /> <!-- 230729 사진창 열릴 때 예쁘게보이는 플러그인 -->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="http://localhost:5000/css/styles.css" rel="stylesheet" /> <!-- 로컬호스트 5000으로 바꿔줌. 8088대신에 -->
        <link href="http://localhost:5000/css/styles_th.css" rel="stylesheet" />


        <!-- 231008_게시판용 내용 추가 -->

        <!-- update the version number as needed -->
        <script defer src="http://localhost:5000/__/firebase/10.3.1/firebase-app-compat.js"></script> <!-- 여기 주소 어떻게해야할지 잘 생각해보자 -->
        <!-- include only the Firebase features as you need -->
        <script defer src="http://localhost:5000/__/firebase/10.3.1/firebase-firestore-compat.js"></script>

        <!-- 
        initialize the SDK after all desired features are loaded, set useEmulator to false
        to avoid connecting the SDK to running emulators.
        -->
        <!-- <script defer src="/__/firebase/init.js?useEmulator=true"></script> -->


        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <link rel="stylesheet" href="http://localhost:5000/main.css">



    </head>

    <body id="page-top">

        <!-- 231008_게시판용 스크립트 추가 -->
        <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
            import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js";
            import { getFirestore } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-firestore.js";
            import { query, orderBy, collection, getDocs, addDoc, Timestamp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-firestore.js";
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries
          
            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
              apiKey: "AIzaSyDRUEsGTMA9IYESxbLzzLDJOLyDtbupE_g",
              authDomain: "wedding-invitation-cc8d1.firebaseapp.com",
              databaseURL: "https://wedding-invitation-cc8d1-default-rtdb.asia-southeast1.firebasedatabase.app",
              projectId: "wedding-invitation-cc8d1",
              storageBucket: "wedding-invitation-cc8d1.appspot.com",
              messagingSenderId: "292211223155",
              appId: "1:292211223155:web:93a7dc90a2b94b135a9806",
              measurementId: "G-R8VCHMYMVZ"
            };
          
            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const db = getFirestore(app);
            const analytics = getAnalytics(app);
          
          
          
          getDocs(query(collection(db,'product'),orderBy("날짜", "desc"))).then((결과)=>{
              결과.forEach((doc)=>{
                console.log(doc.data());
                var 템플릿 = `    
                <div class="product">
                  <div class="thumbnail" style="background-image: url('./img/350x350.png')"></div>
                  <div class="flex-grow-1 p-4">
                    <h5 class="title">${doc.data().제목}</h5>
                    <p class="date">${doc.data().날짜}</p>
                    <p class="price">${doc.data().가격}</p>
                    <p class="float-end">ee</p>
                  </div>
                </div>`;
                
                $('.container-guest-book').append(템플릿);
              })
            })
          
            
//             for($i = $start; $i < ($start + $limit); $i++){
//     if(isset($data[$i])) {
//         echo $data[$i] ."번 게시글 <br>";
//     }
// }
//데이터 출력



          </script>

<div class="container-guest-book mt-3"> <!-- 이 부분이 채워질 부분 -->
            </div>






<?php

include 'lib.php';

$total = 312; 

$limit = 10; 

$page_limit = 5;

$page = isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page']) ? $_GET['page'] : 1;

/* total 게시물 총 개수
 
 * limit 한 화면 출력 개수 
 
 * page_limit 하단에 출력되는 페이지수 << 1 2 3 4 5 >>
 
 * page 현재 몇번째 페이지인지.
// 'page' 값이 null이 아닌지 && 'page'가 빈칸이 아닌지 && 'page가 숫자형 데이터인지 ? 맞으면 $page에 $_GET['page']를 넣고 아니면 1을 넣음
// 1,2,3, '112', '1' 등은 ture가 됨. '1a'등은 false가 됨.  

ffff
*/


echo "<table>";

    foreach($rs as $row) {
        print_r($row);
        exit;

        echo "
            <tr>
                // <td>".$row['idx']."</td>
                // <td>".$row['subject']."</td>
                // <td>".$row['author']."</td>
                // <td>".$row['rdate']."</td>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
            </tr>
        ";
    }

echo "</table>";


$rt_str = my_pagination($total, $limit, $page_limit, $page);

echo $rt_str;
?>

</body>
</html>