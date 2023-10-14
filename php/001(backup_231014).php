<?php

$total = 312; // 게시물 총 개수

$limit = 10; // 한 화면 출력 개수 

// 하단에 출력되는 페이지수 << 1 2 3 4 5 >>
$page_limit = 5;

$data = range(1, $total); // 게시물 (가상으로 있다고 가정)
// range함수넣으면 배열에 숫자 넣을 수 있음

$page = isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page']) ? $_GET['page'] : 1;
//현재 몇번째 페이지인지.
// 'page' 값이 null이 아닌지 && 'page'가 빈칸이 아닌지 && 'page가 숫자형 데이터인지 ? 맞으면 $page에 $_GET['page']를 넣고 아니면 1을 넣음
// 1,2,3, '112', '1' 등은 ture가 됨. '1a'등은 false가 됨.

$start = ($page - 1) * $limit ;
//몇번째부터 출력할지. 0~9, 10~19

for($i = $start; $i < ($start + $limit); $i++){
    if(isset($data[$i])) {
        echo $data[$i] ."번 게시글 <br>";
    }
}
//데이터 출력

$total_page = ceil($total / $limit); 
// 전체페이지 101 / 10일땐 소수점이 나오는데 그때는 11페이지로하고 마지막페이지는 1개만 나타나게해야함. 올림 ceil함수를 을 써야함.

$start_page = (( floor(($page - 1) / $page_limit ) ) * $page_limit ) + 1 ;
// 1페이지일때 1~5 , 2페이지일때도 1~5, ... 5페이지일때도 1~5, 6페이지일때부터는 6~10, 7페이지 6~10 ... 10페이지 6~10 , 11페이지 11~15 단, 총페이지는 넘지않아야함. 
// floor는 소수점 버림의 역할. ex : 1/5, 2/5 등을 0으로 만듬. 6/5, 7/5 등은 1로 만듬.

$end_page = $start_page + $page_limit - 1;

if($end_page > $total_page){
    $end_page = $total_page;
}

echo "<a href='001.php?page=1'>First</a> ";

$prev_page = $start_page - 1;
if($prev_page > 1){
    echo "<a href='001.php?page=".$prev_page."'>Prev</a> ";
}

for($i=$start_page; $i <= $end_page; $i++){
    
    if($page == $i) {
    echo $i . " ";
    } else {
        echo " <a href='001.php?page=". $i. "'>".$i."</a> ";
    }
}

$next_page = $end_page + 1;

if($next_page <= $total_page) {
    echo "<a href='001.php?page=".$next_page."'>Next</a> ";
}

echo " <a href='001.php?page=".$total_page."'>Last</a>";